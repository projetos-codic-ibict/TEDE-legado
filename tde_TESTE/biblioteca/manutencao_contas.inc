<? session_start(SprCod ,ScnCod);
if(!session_is_registered("SprCod")) {
header("Location: login.php");
}else{

require "../conexao/conexao.inc";
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";

if ($cod=="Excluir") {

$total="DELETE FROM Contas WHERE cnCod='$cnCod'";

$exclusao=mysql_db_query($base, $total, $conexao);

$sucesso=$sg001;

header("Location: visualizar_contas.php?v=Editar&sucesso=$sucesso");
exit;
}

if ($cod=="Editar") {

$cnAtualizacao=date("Y-m-d");

$cnDataInicio=$cnAnoInicio."-".$cnMesInicio."-".$cnDiaInicio;
$cnDataTermino=$cnAnoTermino."-".$cnMesTermino."-".$cnDiaTermino;

// Edição de conta na tabela Contas
$inclusao_cn="cnNome='$cnNome',cnSenha='$cnSenha',cnEmail='$cnEmail',cnDataInicio='$cnDataInicio',cnDataTermino='$cnDataTermino',cnBloqueado='$cnBloqueado',cnAtualizacao='$cnAtualizacao'";
$total_cn="UPDATE Contas SET $inclusao_cn WHERE cnCod=$cnCod";
$inconteudo_cn=mysql_db_query($base, $total_cn, $conexao);

//Enviar e-mail com a senha e nome da conta para submissão da tese
$de="tde@ibict.br";
$to="$cnEmail";
$cnDataAtualizacao_split=split("-", $cnAtualizacao);
$dia=$cnDataAtualizacao_split[2];
$mes=$cnDataAtualizacao_split[1];
$ano=$cnDataAtualizacao_split[0];
$DataAtualizacao=$dia."/".$mes."/".$ano;
$LinkSubmissao="http://copaiba1.ibict.br/tede/tde_aluno/login.php";

$titulo="Alteração na sua conta para submissão de Tese ou Dissertação -".$DataAtualizacao."";
$mensagem= "No dia ".$DataAtualizacao." sua conta para submissão de sua Tese ou Dissertação foi alterada. \n\n E-mail: ".$cnEmail."\n Senha:".$cnSenha."\n\n Acesse o Link : ".$LinkSubmissao."\n\n Qualquer dúvida procure o responsável pelo serviço de pós graduação de seu programa.\n\n";
mail($to,"$titulo",$mensagem,"From: $de");

$sucesso=$sg001;
$comunicacao=" Nome: ".$cnNome."<br>E-mail: ".$cnEmail."<br>Senha: ".$cnSenha."<br>Data início: ".$cnDataInicio."<br>Data de expiração: ".$cnDataTermino."<br>";
header("Location: visualizar_contas.php?EVcnCod=$cnCod&v=Editar&sucesso=$sucesso");
exit;
}
}

?>