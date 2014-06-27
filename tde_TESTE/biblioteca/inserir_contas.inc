<? session_start(SprCod ,ScnCod);
if(!session_is_registered("SprCod")) {
header("Location: login.php");
}else{

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";

if ($cod=="Inserir") {

$cnAtualizacao=date("Y-m-d");

$cnDataInicio=$cnAnoInicio."-".$cnMesInicio."-".$cnDiaInicio;
$cnDataTermino=$cnAnoTermino."-".$cnMesTermino."-".$cnDiaTermino;

//Definir qual arquivo será redirecionado conforme o cnTipo

//Selecionar conta para evitar duplicação
$SEL_cnCod="SELECT cnCod FROM Contas WHERE (cnNome='$cnEmail' and cnTipo='Autor')";
$SEL_cnCod_query=mysql_db_query($base,$SEL_cnCod,$conexao);
$SEL_cnCod_RES=mysql_fetch_array($SEL_cnCod_query);

if ($SEL_cnCod_RES!="") {
$erro=$e011;
mysql_close($conexao);
header("Location=$arquivo?erro=$erro");

} else {

if ($prCod!="") {
$prCod_split=split(",",$prCod);
$prCod=$prCod_split[0];
}

// inclusão de conta na tabela Contas
$campos_cn="cnNome,cnSenha,cnEmail,cnTipo,cnDataInicio,cnDataTermino,cnBloqueado,cnAtualizacao,pfCod,prCod,tsIdentificador";
$inclusao_cn="'$cnNome','$cnSenha','$cnEmail','Autor','$cnDataInicio','$cnDataTermino','$cnBloqueado','$cnAtualizacao','$pfCod','$prCod','$tsIdentificador'";

$total_cn="insert into Contas ($campos_cn) values ($inclusao_cn)";
$inconteudo_cn=mysql_db_query($base, $total_cn, $conexao);

require "../bibliotecas/servidor.bib";

//Enviar e-mail com a senha e nome da conta para submissão da tese
$de="tde@ibict.br";
$to="$cnEmail";
$cnDataAtualizacao_split=split("-", $cnAtualizacao);
$dia=$cnDataAtualizacao_split[2];
$mes=$cnDataAtualizacao_split[1];
$ano=$cnDataAtualizacao_split[0];
$DataAtualizacao=$dia."/".$mes."/".$ano;
$LinkSubmissao="http://".$servidor_diretorio."tde_aluno/confirma_conta.php?cnEmail=$cnEmail&d=$cnAtualizacao";

$titulo="Sua conta para submissao de Tese ou Dissertação(TDE) -".$DataAtualizacao."";
$mensagem="No dia ".$DataAtualizacao." sua conta foi criada para submissão de sua Tese ou Dissertação(TDE). \n\nPara receber a senha de acesso ao sistema, que permitirá o inicio da submissão, basta confirmar o recebimento deste e-mail acessando o Link abaixo: \n\n".$LinkSubmissao."\n\nQualquer dúvida procure o responsável pelo serviço de pós graduação de seu programa.\n\n";
mail($to,"$titulo",$mensagem,"From: $de");

$cnDataTermino_split=split("-",$cnDataTermino);
$cnDia_i=$cnDataTermino_split[2];
$cnMes_i=$cnDataTermino_split[1];
$cnAno_i=$cnDataTermino_split[0];
$cnDataTermino=$cnDia_i."/".$cnMes_i."/".$cnAno_i;

$cnDataInicio_split=split("-",$cnDataInicio);
$cnDia_t=$cnDataInicio_split[2];
$cnMes_t=$cnDataInicio_split[1];
$cnAno_t=$cnDataInicio_split[0];
$cnDataInicio=$cnDia_t."/".$cnMes_t."/".$cnAno_t;


$sucesso=$sg001;
$imprimir="n=".$cnNome."&e=".$cnEmail."&s=".$cnSenha;
$comunicacao=" <b>Nome:</b> ".$cnNome."<br><b>E-mail:</b> ".$cnEmail."<br><b>Data início:</b> ".$cnDataInicio."<br><b>Data de expiração:</b> ".$cnDataTermino."<br>";
header("Location: conta_aluno.php?sucesso=$sucesso&com=$comunicacao&c=$imprimir");
exit;
}
}
}
?>