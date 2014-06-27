<?
require "../conexao/conexao.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
//require "../tde_i18n/tde_admin/mensagens_".$idioma_sistema.".txt";
require "../bibliotecas/servidor.bib";

$SEL_cn="SELECT * FROM Contas WHERE cnLogin='$cnLogin' and cnTipo='Administrador'";
$SEL_cn_query=mysql_db_query($base,$SEL_cn,$conexao);
$SEL_cn_RES=mysql_fetch_array($SEL_cn_query);
$cnNome=$SEL_cn_RES["cnNome"];
$cnLogin=$SEL_cn_RES["cnLogin"];
$cnSenha=$SEL_cn_RES["cnSenha"];
$cnEmail=$SEL_cn_RES["cnEmail"];
$cnBloqueado=$SEL_cn_RES["cnBloqueado"];
if ($cnBloqueado==1) {
$cnBloqueado=$txBloqueado;
}else{
$cnBloqueado=$txDesbloqueado;
}
	
//Enviar e-mail com a senha e nome da conta para Pos
$data=date("d/m/Y");
$de=$servidor_email; //E-Mail geral do sistema
$to=$cnEmail;
$LinkLogin="http://".$servidor_diretorio."tde_admin/login.php";
require "../tde_i18n/email_".$idioma_sistema.".txt";
$titulo=$emTituloEnviaContaAdmin;
$mensagem=$emMensagemEnviaContaAdmin;
mail($to,"$titulo",$mensagem,"From: $de");

$sucesso=$sg001;
header("Location: login.php?sucesso=$sucesso");
exit;

?>