<? 
require "../conexao/conexao.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_admin/mensagens_".$idioma_sistema.".txt";
require "../bibliotecas/servidor.bib";

if ($cod=="Editar" and $VcnTipo!="") {
$cnTipo=$VcnTipo;
}

//Definir qual arquivo será redirecionado conforme o cnTipo
if ($prCod!="") {
$prCod_split=split(",",$prCod);
$prCodL=$prCod_split[0];
}
if ($bdCod!="") {
$bdCod_split=split(",",$bdCod);
$bdCodL=$bdCod_split[0];
}

if ($cnTipo=="Administrador") {
$link="conta_admin.php";
$link2="visualizar_contas_admin.php";
$link3="conta_admin.php?cnNome=$cnNome&cnLogin=$cnLogin&cnSenha=$AcnSenha&cnEmail=$cnEmail&cnBloqueado=$cnBloqueado&cnAtualizacao=$cnAtualizacao";
$link4="editar_conta_admin.php?cnCod=$cnCod&cnNome=$cnNome&cnLogin=$cnLogin&cnSenha=$cnSenha&cnEmail=$cnEmail&cnBloqueado=$cnBloqueado&cnAtualizacao=$cnAtualizacao";
}
if ($cnTipo=="Pos") {
$link="conta_pos.php";
$link2="visualizar_contas_pos.php";
$link3="conta_pos.php?cnNome=$cnNome&cnLogin=$cnLogin&cnSenha=$cnSenha&cnEmail=$cnEmail&cnBloqueado=$cnBloqueado&cnAtualizacao=$cnAtualizacao&prCodL=$prCodL";
$link4="editar_conta_pos.php?cnCod=$cnCod&cnNome=$cnNome&cnLogin=$cnLogin&cnSenha=$cnSenha&cnEmail=$cnEmail&cnBloqueado=$cnBloqueado&cnAtualizacao=$cnAtualizacao&CprCod=$CprCod";
}
if ($cnTipo=="Catalogador" or $cnTipo=="MasterCataloga") {

$link="conta_catalogador.php";
$link2="visualizar_contas_cat.php";
$link3="conta_catalogador.php?cnNome=$cnNome&cnLogin=$cnLogin&cnSenha=$cnSenha&cnEmail=$cnEmail&cnBloqueado=$cnBloqueado&cnAtualizacao=$cnAtualizacao&bdCodL=$bdCodL";
$link4="editar_conta_cat.php?cnCod=$cnCod&cnNome=$cnNome&cnLogin=$cnLogin&cnSenha=$cnSenha&cnEmail=$cnEmail&cnBloqueado=$cnBloqueado&cnAtualizacao=$cnAtualizacao&bdNome=$bdNome";
}

if ($cnSenha!=$cnSenha2 and $cod!="Excluir") {
$erro=$eg012;
if ($cod=="Inserir") {
header("Location:$link3&erro=$erro");
exit;
}
if ($cod=="Editar") {
header("Location:$link4&erro=$erro");
exit;
}
}

if ($cod=="Inserir") {

$cnAtualizacao=date("Y-m-d");

$cnDataInicio=$cnAnoInicio."-".$cnMesInicio."-".$cnDiaInicio;
$cnDataTermino=$cnAnoTermino."-".$cnMesTermino."-".$cnDiaTermino;

//Selecionar conta para evitar duplicação
$SEL_cnCod="SELECT cnCod FROM Contas WHERE (cnNome='$cnNome' and cnLogin='$cnLogin' and cnTipo='$cnTipo')";
$SEL_cnCod_query=mysql_db_query($base,$SEL_cnCod,$conexao);
$SEL_cnCod_RES=mysql_fetch_array($SEL_cnCod_query);

if ($SEL_cnCod_RES!="") {
$erro=$e011;
header("Location:$link?erro=$erro");

} else {

if ($prCod!="") {
$prCod_split=split(",",$prCod);
$prCod=$prCod_split[0];
$bdCod=$prCod_split[1];
}
if ($bdCod!="") {
$bdCod_split=split(",",$bdCod);
$bdCod=$bdCod_split[0];
} 

// inclusão de conta na tabela Contas
$campos_cn="cnNome,cnLogin,cnSenha,cnEmail,cnTipo,cnBloqueado,cnAtualizacao,bdCod,prCod";
$inclusao_cn="'$cnNome','$cnLogin','$cnSenha','$cnEmail','$cnTipo','$cnBloqueado','$cnAtualizacao','$bdCod','$prCod'";

$total_cn="insert into Contas ($campos_cn) values ($inclusao_cn)";
$inconteudo_cn=mysql_db_query($base, $total_cn, $conexao);

$SEL_cnCod="SELECT cnCod FROM Contas WHERE (cnNome='$cnNome' and cnLogin='$cnLogin' and cnTipo='$cnTipo')";
$SEL_cnCod_query=mysql_db_query($base,$SEL_cnCod,$conexao);
$SEL_cnCod_RES=mysql_fetch_array($SEL_cnCod_query);
$EVcnCod=$SEL_cnCod_RES[cnCod];

//Enviar e-mail do modulo Contato
$de=$servidor_email;
$to=$cnEmail;

$Data=date("d/m/Y, H:i:s");
require "../tde_i18n/email_".$idioma_sistema.".txt";
$titulo=$emTituloConta;
$mensagem=$emMensagemConta;
mail($to,"$titulo",$mensagem,"From: $de");

$sucesso=$s001;
header("Location: $link2?v=Editar&EVcnCod=$EVcnCod&sucesso=$sucesso");
exit;
}
}

if ($cod=="Editar") {

$cnAtualizacao=date("Y-m-d");

$cnDataInicio=$cnAnoInicio."-".$cnMesInicio."-".$cnDiaInicio;
$cnDataTermino=$cnAnoTermino."-".$cnMesTermino."-".$cnDiaTermino;

if ($cnNome!=$cnNomeAtual) {
//Selecionar conta para evitar duplicação
$SEL_cnCod="SELECT cnCod FROM Contas WHERE (cnNome='$cnNome' and cnLogin='$cnLogin' and cnTipo='$cnTipo')";
$SEL_cnCod_query=mysql_db_query($base,$SEL_cnCod,$conexao);
$SEL_cnCod_RES=mysql_fetch_array($SEL_cnCod_query);
}
if ($SEL_cnCod_RES!="") {
$erro=$e011;
mysql_close($conexao);
header("Location=$link?erro=$erro");
} else {

// Editar a conta na tabela Contas

$inclusao_cn="cnNome='$cnNome',cnLogin='$cnLogin',cnSenha='$cnSenha',cnEmail='$cnEmail',cnBloqueado='$cnBloqueado',cnAtualizacao='$cnAtualizacao',cnTipo='$cnTipo'";
$total_cn="UPDATE Contas SET $inclusao_cn WHERE cnCod=$cnCod";
$inconteudo_cn=mysql_db_query($base, $total_cn, $conexao);

//Enviar e-mail do modulo Contato
$de=$servidor_email;
$to=$cnEmail;

$Data=date("d/m/Y, H:i:s");
require "../tde_i18n/email_".$idioma_sistema.".txt";
$titulo=$emTituloConta1;
$mensagem=$emMensagemConta1;

mail($to,"$titulo",$mensagem,"From: $de");

$sucesso=$s001;
header("Location: $link2?v=Editar&EVcnCod=$cnCod&sucesso=$sucesso");
exit;
}
}

if ($cod=="Excluir") { 

$SEL_cnCod="SELECT cnNome, cnEmail FROM Contas WHERE cnCod='$cnCod'";
$SEL_cnCod_query=mysql_db_query($base,$SEL_cnCod,$conexao);
$SEL_cnCod_RES=mysql_fetch_array($SEL_cnCod_query);

$cnEmail=$SEL_cnCod_RES['cnEmail'];
$cnNome=$SEL_cnCod_RES['cnNome'];

$total="DELETE FROM Contas WHERE cnCod='$cnCod'";
$exclusao=mysql_db_query($base, $total, $conexao);

$total1="DELETE FROM Sessao WHERE cnCod='$cnCod'";
$exclusao1=mysql_db_query($base, $total1, $conexao);

//Enviar e-mail do modulo Contato
$de=$servidor_email;
$to=$cnEmail;

$Data=date("d/m/Y, H:i:s");
require "../tde_i18n/email_".$idioma_sistema.".txt";
$titulo=$emTituloConta2;
$mensagem=$emMensagemConta2;
$titulo="Exclusão da conta de ".$cnTipo." do sistema de Teses e Dissertações - ".$Data;
$mensagem= "Sr(a) ".$cnNome.",\nno dia ".$Data." seu cadastrado de acesso ao módulo de ".$cnTipo." do sistema TEDE foi excluído.\n\nQualquer dúvida entre em contado com o administrador do sistema";
mail($to,"$titulo",$mensagem,"From: $de");

$sucesso=$s001;
header("Location: $link2?v=Editar&sucesso=$sucesso");
exit;
} 
?>
