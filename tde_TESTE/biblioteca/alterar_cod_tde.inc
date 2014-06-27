      <?

//Abre a conexao com o Banco TEDE utilizando o arquivo encontrado no caminho especificado

require "../conexao/conexao.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";

//Pegar a Data de Atualização(DateStamp)
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$tsDataRevisao = date("Y-m-d");
session_register(tsDataFinalizacao);

// inclusão dos Dados Iniciais da tese na tabela Teses
$tsDataDefesa=$ano."-".$mes."-".$dia;
$inclusao_ts="tsGrau='$tsGrau', tsTitulacao='$tsTitulacao',tsIdioma='$tsIdioma',tsCidadeLocalDefesa='$tsCidadeLocalDefesa', tsUFLocalDefesa='$tsUFLocalDefesa', tsPaisLocalDefesa='$tsPaisLocalDefesa', tsDataDefesa='$tsDataDefesa' , tsDataRevisao='$tsDataRevisao', cnCodRevisor='$ScnCod', tsOBS='$tsOBS2',tsCampo1='$tsCampo1', tsCampo2='$tsCampo2'";
$total_ts="UPDATE Teses SET $inclusao_ts WHERE tsIdentificador=$VtsIdentificador";

$inconteudo_ts=mysql_db_query($base, $total_ts, $conexao);

$SEL_tt="SELECT ttCod FROM Titulo WHERE tsIdentificador=$VtsIdentificador ORDER by ttCod";
$SEL_tt_query=mysql_db_query($base,$SEL_tt,$conexao);
$SEL_tt_RES=mysql_fetch_array($SEL_tt_query);
$ttCod=$SEL_tt_RES["ttCod"];

// Atualizar o Titulo no idioma Original da  tese
$inclusao_tt="ttTitulo='$AttTitulo',ttIdioma='$tsIdioma'";
$total_tt="UPDATE Titulo SET $inclusao_tt WHERE ttCod='$ttCod'";
$inconteudo_tt=mysql_db_query($base, $total_tt, $conexao);

$sucesso=$sg001;

header("Location:visualizar_tde.php?sucesso=$sucesso&VtsIdentificador=$VtsIdentificador&VpfCod=$VpfCod&VprCod=$SprCod");
exit;
?>

