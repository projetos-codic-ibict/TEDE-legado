<? 
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/tde_admin/mensagens_".$idioma_sistema.".txt";
require "../conexao/conexao.inc";

$SEL_ct="SELECT ctEmail FROM Contatos WHERE ctCod='$ctEmail'";
$SEL_ct_query=mysql_db_query($base,$SEL_ct,$conexao);
$SEL_ct_RES=mysql_fetch_array($SEL_ct_query);
$ctEmail=$SEL_ct_RES['ctEmail'];
//Enviar e-mail do modulo Contato
$de=$ctEmailUsuario;
$to=$ctEmail;

$Data=date("d/m/Y, H:i:s");
require "../tde_i18n/email_".$idioma_sistema.".txt";
$titulo=$emTituloContato;
$mensagem=$emMensagemContato;
mail($to,"$titulo",$mensagem,"From: $de");
$sucesso=$s003;
?>
