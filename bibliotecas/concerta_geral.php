<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>

<body>
<?
//verifica se todas as TDEs criadas possuem seu diretório
require "../conexao/conexao.php";
require "../conexao/conexao_fim.php";
require "../conexao/funcao_erro.inc";
//Arruma tsDataFinalizacao

$SEL_tde_d="SELECT * FROM Teses WHERE tsDataFinalizacao like '0000%'";
$SEL_tde_d_query=mysql_db_query($base_fim,$SEL_tde_d,$conexao_fim);
$SEL_tde_d_RES=mysql_fetch_array($SEL_tde_d_query);

while ($SEL_tde_d_RES!="") {

$tsIdentificador_d=$SEL_tde_d_RES["tsIdentificador"];
$tsDataAtualizacao_d=$SEL_tde_d_RES["tsDataAtualizacao"];
$tsDataAtual_d=split(" ",$tsDataAtualizacao_d);
$inclusao_d="tsDataFinalizacao='$tsDataAtual_d[0]'";
$total_d="UPDATE Teses SET $inclusao_d WHERE tsIdentificador=$tsIdentificador_d";
$inconteudo_d=mysql_db_query($base, $total_d, $conexao);
$inconteudo_df=mysql_db_query($base_fim, $total_d, $conexao_fim);

$SEL_tde_d_RES=mysql_fetch_array($SEL_tde_d_query);
}

//Arruma Autor
$SEL_au="SELECT * FROM PessoaFisica";
$SEL_au_query=mysql_db_query($base,$SEL_au,$conexao);
$SEL_au_RES=mysql_fetch_array($SEL_au_query);

while ($SEL_au_RES!="") {
$pfCod=$SEL_au_RES["pfCod"];
$pfNome=$SEL_au_RES["pfNome"];
$pfCitacao=$SEL_au_RES["pfCitacao"];
$pfCitacaoABNT=$SEL_au_RES["pfCitacaoABNT"];
$pfLattes=$SEL_au_RES["pfLattes"];
$pfCPF=$SEL_au_RES["pfCPF"];
$pfEmail=$SEL_au_RES["pfEmail"];
$pfAutor=$SEL_au_RES["pfAutor"];
$pfContribuidor=$SEL_au_RES["pfContribuidor"];

$SEL_au1="SELECT * FROM PessoaFisica WHERE pfCod='$pfCod'";
$SEL_au1_query=mysql_db_query($base_fim,$SEL_au1,$conexao_fim);
$SEL_au1_RES=mysql_fetch_array($SEL_au1_query);

if ($SEL_au1_RES=="") {
// Inserir Aluno
		$campos_pf="pfCod,pfNome,pfCitacao,pfCitacaoABNT,pfLattes,pfCPF,pfEmail";
		$inclusao_pf="'$pfCod','$pfNome','$pfCitacao','$pfCitacaoABNT','$pfLattes','$pfCPF','$pfEmail'";
		$total_pf="insert into PessoaFisica ($campos_pf) values ($inclusao_pf)";
		$inconteudo_pf=mysql_db_query($base_fim, $total_pf, $conexao_fim);
echo $pfNome."<br>";
}

$SEL_au_RES=mysql_fetch_array($SEL_au_query);
}
//Arruma Teses TDE_SUBMISSAO
$SEL_tde_f="SELECT * FROM Teses, TSPF WHERE Teses.tsIdentificador=TSPF.tsIdentificador and TSPF.tspfTipo='Autor'";
$SEL_tde_f_query=mysql_db_query($base_fim,$SEL_tde_f,$conexao_fim);
$SEL_tde_f_RES=mysql_fetch_array($SEL_tde_f_query);

while ($SEL_tde_f_RES!="") {
//TESES
$tsIdentificador_f=$SEL_tde_f_RES['tsIdentificador'];
$tsNumeroChamada=addslashes($SEL_tde_f_RES["tsNumeroChamada"]);
		$tsIdioma_f=$SEL_tde_f_RES["tsIdioma"];
		$tsGrau_f=$SEL_tde_f_RES["tsGrau"];
		$tsTitulacao_f=mysql_escape_string($SEL_tde_f_RES["tsTitulacao"]);
		$tsDataAtualizacao_f=$SEL_tde_f_RES["tsDataAtualizacao"];
		$tsCidadeLocalDefesa_f=mysql_escape_string($SEL_tde_f_RES["tsCidadeLocalDefesa"]);
		$tsUFLocalDefesa_f=$SEL_tde_f_RES["tsUFLocalDefesa"];
		$tsPaisLocalDefesa_f=mysql_escape_string($SEL_tde_f_RES["tsPaisLocalDefesa"]);
        $tsDataDefesa_f=$SEL_tde_f_RES["tsDataDefesa"];
		$tsDataFinalizacao_f=$SEL_tde_f_RES["tsDataFinalizacao"];
		$tsDataLiberacaoPos_f=$SEL_tde_f_RES["tsDataLiberacaoPos"];
		$cnCodPos_f=$SEL_tde_f_RES["cnCodPos"];
		$tsDataRevisao_f=$SEL_tde_f_RES["tsDataRevisao"];
		$cnCodRevisor_f=$SEL_tde_f_RES["cnCodRevisor"];
		$tsDataCatalogacao_f=$SEL_tde_f_RES["tsDataCatalogacao"];
		$cnCodCatalogador_f=$SEL_tde_f_RES["cnCodCatalogador"];
		$inCod_f=$SEL_tde_f_RES["inCod"];
		$tsDataDiretorio_f=$SEL_tde_f_RES["tsDataDiretorio"];

$SEL_tde_f2="SELECT * FROM Teses WHERE tsIdentificador=$tsIdentificador_f";
$SEL_tde_f2_query=mysql_db_query($base,$SEL_tde_f2,$conexao);
$SEL_tde_f2_RES=mysql_fetch_array($SEL_tde_f2_query);

if ($SEL_tde_f2_RES=="") {
// inclusão dos Dados Iniciais da tese na tabela Teses
		$campos_ts="tsIdentificador,tsNumeroChamada,tsIdioma,tsGrau,tsTitulacao,tsDataAtualizacao,tsCidadeLocalDefesa,tsUFLocalDefesa,tsPaisLocalDefesa,tsDataDefesa,tsDataFinalizacao,tsDataLiberacaoPos,cnCodPos,tsDataRevisao,cnCodRevisor,tsDataCatalogacao,cnCodCatalogador,inCod,tsDataDiretorio";
		$inclusao_ts="'$tsIdentificador_f','$tsNumeroChamada_f','$tsIdioma_f','$tsGrau_f','$tsTitulacao_f','$tsDataAtualizacao_f','$tsCidadeLocalDefesa_f','$tsUFLocalDefesa_f','$tsPaisLocalDefesa_f','$tsDataDefesa_f','$tsDataFinalizacao_f','$tsDataLiberacaoPos_f','$cnCodPos_f','$tsDataRevisao_f','$cnCodRevisor_f','$tsDataCatalogacao_f','$cnCodCatalogador_f','$inCod_f','$tsDataDiretorio_f'";
		$total_f_ts="insert into Teses ($campos_ts) values ($inclusao_ts)";
		$inconteudo_f_ts=check_mysql_db_query($base, $total_ts_f, $conexao);
		echo "Problema na TDE ".$tsIdentificador." : Tabela Teses TDE_SUBMISSAO: OK<br>";
}


//TSPF Autor
$prCod_f=$SEL_tde_f_RES['prCod'];
$pfCod_f=$SEL_tde_f_RES['pfCod'];
$tspfDispEmail_f=$SEL_tde_f_RES['tspfDispEmail'];

$SEL_tde_f1="SELECT * FROM TSPF WHERE tsIdentificador=$tsIdentificador_f and tspfTipo='Autor'";
$SEL_tde_f1_query=mysql_db_query($base,$SEL_tde_f1,$conexao);
$SEL_tde_f1_RES=mysql_fetch_array($SEL_tde_f1_query);

if ($SEL_tde_f1_RES=="") {
$campos_tspf_f1="tsIdentificador,pfCod,prCod,tspfTipo,tspfDispEmail,tspfDisponivel";
$inclusao_tspf_f1="'$tsIdentificador_f','$pfCod_f','$prCod_f','Autor','$tspfDispEmail_f','9'";
$total_tspf_f1="INSERT INTO TSPF ($campos_tspf_f1) values ($inclusao_tspf_f1)";
$inconteudo_tspf_f1=mysql_db_query($base, $total_tspf_f1, $conexao);
echo "TDE: ".$tsIdentificador_f." Faltava Autor na tabela TSPF TDE_SUBMISSAO<br>";
}

//TSPF Orientador

$SEL_tde_f11="SELECT * FROM TSPF WHERE tsIdentificador=$tsIdentificador_f and tspfTipo='Orientador'";
$SEL_tde_f11_query=mysql_db_query($base_fim,$SEL_tde_f11,$conexao_fim);
$SEL_tde_f11_RES=mysql_fetch_array($SEL_tde_f11_query);

if ($SEL_tde_f11_RES=="") {
$SEL_tde_f111="SELECT * FROM TSPF WHERE tsIdentificador=$tsIdentificador_f and tspfTipo='Orientador'";
$SEL_tde_f111_query=mysql_db_query($base,$SEL_tde_f111,$conexao);
$SEL_tde_f111_RES=mysql_fetch_array($SEL_tde_f111_query);

$prCod_f111=$SEL_tde_f111_RES['prCod'];
$pfCod_f111=$SEL_tde_f111_RES['pfCod'];
$tspfDispEmail_f111=$SEL_tde_f111_RES['tspfDispEmail'];

$campos_tspf_f11="tsIdentificador,pfCod,prCod,tspfTipo,tspfDispEmail,tspfDisponivel";
$inclusao_tspf_f11="'$tsIdentificador_f','$pfCod_f111','$prCod_f111','Orientador','$tspfDispEmail_f111'";
$total_tspf_f11="INSERT INTO TSPF ($campos_tspf_f11) values ($inclusao_tspf_f11)";
$inconteudo_tspf_f11=mysql_db_query($base_fim, $total_tspf_f11, $conexao_fim);
echo "TDE: ".$tsIdentificador_f." Faltava Orientador na tabela TSPF Banco TDE<br>";
}

$SEL_tde_f_RES=mysql_fetch_array($SEL_tde_f_query);
}

//Selecionar a TDE do banco TDE
$SEL_tde="SELECT * FROM Teses, TSPF WHERE Teses.tsIdentificador=TSPF.tsIdentificador and TSPF.tspfTipo='Autor' and (TSPF.tspfDisponivel='9')";
$SEL_tde_query=mysql_db_query($base,$SEL_tde,$conexao);
$SEL_tde_RES=mysql_fetch_array($SEL_tde_query);

while ($SEL_tde_RES!="") {

$tsIdentificador=$SEL_tde_RES["tsIdentificador"];
$prCod=$SEL_tde_RES['prCod'];
$pfCod=$SEL_tde_RES['pfCod'];
$tspfDispEmail=$SEL_tde_RES['tspfDispEmail'];
$passa="";
$tspfDisp=$SEL_tde_RES['tspfDisponivel'];

$SEL_tde3="SELECT tsIdentificador FROM Teses WHERE tsIdentificador=$tsIdentificador";
$SEL_tde3_query=mysql_db_query($base_fim,$SEL_tde3,$conexao_fim);
$SEL_tde3_RES=mysql_fetch_array($SEL_tde3_query);

if ($SEL_tde3_RES=="") {

		$tsNumeroChamada=addslashes($SEL_tde_RES["tsNumeroChamada"]);
		$tsIdioma=$SEL_tde_RES["tsIdioma"];
		$tsGrau=$SEL_tde_RES["tsGrau"];
		$tsTitulacao=mysql_escape_string($SEL_tde_RES["tsTitulacao"]);
		$tsDataAtualizacao=$SEL_tde_RES["tsDataAtualizacao"];
		$tsCidadeLocalDefesa=mysql_escape_string($SEL_tde_RES["tsCidadeLocalDefesa"]);
		$tsUFLocalDefesa=$SEL_tde_RES["tsUFLocalDefesa"];
		$tsPaisLocalDefesa=mysql_escape_string($SEL_tde_RES["tsPaisLocalDefesa"]);
        $tsDataDefesa=$SEL_tde_RES["tsDataDefesa"];
		$tsDataFinalizacao=$SEL_tde_RES["tsDataFinalizacao"];
		$tsDataLiberacaoPos=$SEL_tde_RES["tsDataLiberacaoPos"];
		$cnCodPos=$SEL_tde_RES["cnCodPos"];
		$tsDataRevisao=$SEL_tde_RES["tsDataRevisao"];
		$cnCodRevisor=$SEL_tde_RES["cnCodRevisor"];
		$tsDataCatalogacao=$SEL_tde_RES["tsDataCatalogacao"];
		$cnCodCatalogador=$SEL_tde_RES["cnCodCatalogador"];
		$inCod=$SEL_tde_RES["inCod"];
		$tsDataDiretorio=$SEL_tde_RES["tsDataDiretorio"];
		
		// inclusão dos Dados Iniciais da tese na tabela Teses
		$campos_ts="tsIdentificador,tsNumeroChamada,tsIdioma,tsGrau,tsTitulacao,tsDataAtualizacao,tsCidadeLocalDefesa,tsUFLocalDefesa,tsPaisLocalDefesa,tsDataDefesa,tsDataFinalizacao,tsDataLiberacaoPos,cnCodPos,tsDataRevisao,cnCodRevisor,tsDataCatalogacao,cnCodCatalogador,inCod,tsDataDiretorio";
		$inclusao_ts="'$tsIdentificador','$tsNumeroChamada','$tsIdioma','$tsGrau','$tsTitulacao','$tsDataAtualizacao','$tsCidadeLocalDefesa','$tsUFLocalDefesa','$tsPaisLocalDefesa','$tsDataDefesa','$tsDataFinalizacao','$tsDataLiberacaoPos','$cnCodPos','$tsDataRevisao','$cnCodRevisor','$tsDataCatalogacao','$cnCodCatalogador','$inCod','$tsDataDiretorio'";
		$total_ts="insert into Teses ($campos_ts) values ($inclusao_ts)";
		$inconteudo_ts=check_mysql_db_query($base_fim, $total_ts, $conexao_fim);
		echo "Problema na TDE ".$tsIdentificador." : Tabela Teses : OK<br>";
		
}
	
$SEL_tde4="SELECT * FROM TSPF WHERE tsIdentificador='$tsIdentificador' and tspfTipo='Autor'";
$SEL_tde4_query=mysql_db_query($base_fim,$SEL_tde4,$conexao_fim);
$SEL_tde4_RES=mysql_fetch_array($SEL_tde4_query);

if ($SEL_tde4_RES=="") {

// Inserir os registros da tabela TSPF do banco TEDE-SUBMISSAO para o banco TEDE
			$campos_tspf="tsIdentificador,pfCod,prCod,tspfTipo,tspfDispEmail";
			$inclusao_tspf="'$tsIdentificador','$pfCod','$prCod','Autor','$tspfDispEmail'";
			$total_tspf="INSERT INTO TSPF ($campos_tspf) values ($inclusao_tspf)";
			$inconteudo_tspf=check_mysql_db_query($base_fim, $total_tspf, $conexao_fim);
			echo "Tabela TSPF ".$tsIdentificador.": Verificar contribuidores<br>";
}

$SEL_as1="SELECT asCod FROM Assunto WHERE tsIdentificador='$tsIdentificador'";
$SEL_as1_query=mysql_db_query($base_fim,$SEL_as1,$conexao_fim);
$SEL_as1_RES=mysql_fetch_array($SEL_as1_query);

if ($SEL_as1_RES=="") {

//Selecionar os Assuntos dessa Tese
		$SEL_as="SELECT * FROM Assunto WHERE tsIdentificador=$tsIdentificador ORDER BY asCod";
        $SEL_as_query=check_mysql_db_query($base,$SEL_as,$conexao);
        $SEL_as_RES=mysql_fetch_array($SEL_as_query);
			
		while ($SEL_as_RES!="") {
			$asCod=$SEL_as_RES["asCod"];
			$asAssunto=mysql_escape_string($SEL_as_RES["asAssunto"]);
			$asEsquema=mysql_escape_string($SEL_as_RES["asEsquema"]);
			$asIdioma=$SEL_as_RES["asIdioma"];

			// inclusão dos Assuntos da tese na tabela Assunto no banco TEDE
			$campos_as="asCod,tsIdentificador,asAssunto,asIdioma,asEsquema";
			$inclusao_as="'$asCod','$tsIdentificador','$asAssunto','$asIdioma','$asEsquema'";
			$total_as="insert into Assunto ($campos_as) values ($inclusao_as)";
			$inconteudo_as=check_mysql_db_query($base_fim, $total_as, $conexao_fim);
			
			$SEL_as_RES=mysql_fetch_array($SEL_as_query);
			echo "Tabela Assuntos ".$tsIdentificador.": OK<br>";
		}
		
}
/*
$SEL_cb1="SELECT cbCod FROM Cobertura WHERE tsIdentificador='$tsIdentificador'";
$SEL_cb1_query=mysql_db_query($base_fim,$SEL_cb1,$conexao_fim);
$SEL_cb1_RES=mysql_fetch_array($SEL_cb1_query);

if ($SEL_cb1_RES=="") {
//Selecionar as Coberturas dessa Tese
		$SEL_cb="SELECT * FROM Cobertura WHERE tsIdentificador='$tsIdentificador' ORDER BY cbCod";
        $SEL_cb_query=check_mysql_db_query($base,$SEL_cb,$conexao);
        $SEL_cb_RES=mysql_fetch_array($SEL_cb_query);
			
		while ($SEL_cb_RES!="") {
			$cbCod=$SEL_cb_RES["cbCod"];
			$cbCobertura=mysql_escape_string($SEL_cb_RES["cbCobertura"]);
			$cbIdioma=$SEL_cb_RES["cbIdioma"];

			// inclusão da Cobertura da tese na tabela Cobertura no banco TEDE
			$campos_cb="cbCod,tsIdentificador,cbCobertura,cbIdioma";
			$inclusao_cb="'$cbCod','$tsIdentificador','$cbCobertura','$cbIdioma'";
			$total_cb="insert into Cobertura ($campos_cb) values ($inclusao_cb)";
			$inconteudo_cb=check_mysql_db_query($base_fim, $total_cb, $conexao_fim);
		
			$SEL_cb_RES=mysql_fetch_array($SEL_cb_query);
			echo "Tabela Cobertura ".$tsIdentificador.": OK<br>";
		}
}
*/
$SEL_tp1="SELECT tpCod FROM Tipo WHERE tsIdentificador='$tsIdentificador'";
$SEL_tp1_query=mysql_db_query($base_fim,$SEL_tp1,$conexao_fim);
$SEL_tp1_RES=mysql_fetch_array($SEL_tp1_query);

if ($SEL_tp1_RES=="") {
//Selecionar os Tipos dessa Tese
		$SEL_tp="SELECT * FROM Tipo WHERE tsIdentificador='$tsIdentificador' ORDER BY tpCod";
        $SEL_tp_query=check_mysql_db_query($base,$SEL_tp,$conexao);
        $SEL_tp_RES=mysql_fetch_array($SEL_tp_query);
			
		while ($SEL_tp_RES!="") {
			$tpTipo=$SEL_tp_RES["tpTipo"];
			if ($tpTipo=="Printed Theses and Dissertation") {
				$tipoPrinted="Sim";
		    }
			// inclusão dos Tipos da tese no Banco TEDE
			$campos_tp="tsIdentificador,tpTipo";
			$inclusao_tp="'$VtsIdentificador','$tpTipo'";
			$total_tp="insert into Tipo ($campos_tp) values ($inclusao_tp)";
			$inconteudo_tp=check_mysql_db_query($base_fim, $total_tp, $conexao_fim);
			
			$SEL_tp_RES=mysql_fetch_array($SEL_tp_query);
			echo "Tabela Tipo ".$tsIdentificador.": OK<br>";
		}
}

$SEL_dr1="SELECT drCod FROM Direitos WHERE tsIdentificador='$tsIdentificador'";
$SEL_dr1_query=mysql_db_query($base_fim,$SEL_dr1,$conexao_fim);
$SEL_dr1_RES=mysql_fetch_array($SEL_dr1_query);

if ($SEL_dr1_RES=="") {
// inclusão dos Direitos dos arquivos da tese na tabela de Direitos
		if ($tipoPrinted!="Sim") {
			$campos_dr="tsIdentificador,drDireito,drIdioma";
			$inclusao_dr="'$VtsIdentificador','$drDireito','$drIdioma'";
			$total_dr="insert into Direitos ($campos_dr) values ($inclusao_dr)";
			$inconteudo_dr=check_mysql_db_query($base_fim, $total_dr, $conexao_fim);
			echo "Tabela Assuntos ".$tsIdentificador.": OK<br>";
}
}
$SEL_ar1="SELECT arCod FROM Arquivos WHERE tsIdentificador='$tsIdentificador'";
$SEL_ar1_query=mysql_db_query($base_fim,$SEL_ar1,$conexao_fim);
$SEL_ar1_RES=mysql_fetch_array($SEL_ar1_query);
if ($SEL_ar1_RES=="") {
//Selecionar os Arquivos dessa Tese
			$SEL_ar="SELECT * FROM Arquivos WHERE tsIdentificador=$tsIdentificador ORDER BY arCod";
            $SEL_ar_query=check_mysql_db_query($base,$SEL_ar,$conexao);
            $SEL_ar_RES=mysql_fetch_array($SEL_ar_query);
			
			while ($SEL_ar_RES!="") {
				$arCod=$SEL_ar_RES["arCod"];
				$arURL=$SEL_ar_RES["arURL"];
				$arFormato=$SEL_ar_RES["arFormato"];
				$arDireitos=$SEL_ar_RES["arDireitos"];
			
				$SEL_la="SELECT * FROM LegendaArquivo WHERE arCod=$arCod";
      		    $SEL_la_query=check_mysql_db_query($base,$SEL_la,$conexao);
       		    $SEL_la_RES=mysql_fetch_array($SEL_la_query);
			
				$arCod=$SEL_la_RES[arCod];
				$laLegenda=$SEL_la_RES["laLegenda"];
				$laIdioma=$SEL_la_RES["laIdioma"];
			
				// inclusão dos Arquivos da tese no Banco TEDE
				$campos_ar="arCod,tsIdentificador,arURL,arFormato,arDireitos";
				$inclusao_ar="'$arCod','$VtsIdentificador','$arURL','$arFormato','$arDireitos'";
				$total_ar="insert into Arquivos ($campos_ar) values ($inclusao_ar)";
				$inconteudo_ar=check_mysql_db_query($base_fim, $total_ar, $conexao_fim);

				// inclusão da Legenda do Arquivo da tese no Banco TEDE
				$campos_la="arCod,laLegenda,laIdioma";
				$inclusao_la="'$arCod','$laLegenda','$laIdioma'";
				$total_la="insert into LegendaArquivo ($campos_la) values ($inclusao_la)";
				$inconteudo_la=check_mysql_db_query($base_fim, $total_la, $conexao_fim);
			
				$SEL_ar_RES=mysql_fetch_array($SEL_ar_query);
				echo "Tabela Arquivos ".$tsIdentificador.": OK<br>";
			}
		}		


$SEL_tt="SELECT ttCod FROM Titulo WHERE tsIdentificador='$tsIdentificador'";
$SEL_tt_query=mysql_db_query($base_fim,$SEL_tt,$conexao_fim);
$SEL_tt_RES=mysql_fetch_array($SEL_tt_query);

if ($SEL_tt_RES=="") {
$SEL_tt2="SELECT * FROM Titulo WHERE tsIdentificador='$tsIdentificador'";
$SEL_tt2_query=mysql_db_query($base,$SEL_tt2,$conexao);
$SEL_tt2_RES=mysql_fetch_array($SEL_tt2_query);

while ($SEL_tt2_RES!="") {
$ttTitulo=mysql_escape_string($SEL_tt2_RES["ttTitulo"]);
$ttIdioma=$SEL_tt2_RES["ttIdioma"];

//Inserir a titulo que estava faltando

$campos_tt="tsIdentificador,ttTitulo,ttIdioma";
$inclusao_tt="'$tsIdentificador','$ttTitulo','$ttIdioma'";
$total_tt="insert into Titulo ($campos_tt) values ($inclusao_tt)";
$inconteudo_tt=check_mysql_db_query($base_fim, $total_tt, $conexao_fim);

$SEL_tt2_RES=mysql_fetch_array($SEL_tt2_query);
echo "Tabela Titulo ".$tsIdentificador.": OK<br>";
}
}

$SEL_rs="SELECT rsCod FROM Resumo WHERE tsIdentificador='$tsIdentificador'";
$SEL_rs_query=mysql_db_query($base_fim,$SEL_rs,$conexao_fim);
$SEL_rs_RES=mysql_fetch_array($SEL_rs_query);

if ($SEL_rs_RES=="") {
$SEL_rs2="SELECT * FROM Resumo WHERE tsIdentificador='$tsIdentificador'";
$SEL_rs2_query=mysql_db_query($base,$SEL_rs2,$conexao);
$SEL_rs2_RES=mysql_fetch_array($SEL_rs2_query);

while ($SEL_rs2_RES!="") {
$rsResumo=mysql_escape_string($SEL_rs2_RES["rsResumo"]);
$rsIdioma=$SEL_rs2_RES["rsIdioma"];

//Inserir a resumo que estava faltando
$campos_rs="tsIdentificador,rsResumo,rsIdioma";
$inclusao_rs="'$tsIdentificador','$rsResumo','$rsIdioma'";
$total_rs="insert into Resumo ($campos_rs) values ($inclusao_rs)";
$inconteudo_rs=check_mysql_db_query($base_fim, $total_rs, $conexao_fim);

$SEL_rs2_RES=mysql_fetch_array($SEL_rs2_query);
echo "Tabela Resumo ".$tsIdentificador.": OK<br><br>";
}
}

$SEL_tde_RES=mysql_fetch_array($SEL_tde_query);
}
$SEL_tdear="SELECT * FROM Arquivos";
$SEL_tdear_query=mysql_db_query($base,$SEL_tdear,$conexao);
$SEL_tdear_RES=mysql_fetch_array($SEL_tdear_query);

while ($SEL_tdear_RES!="") {
$tsIdentificador_ar=$SEL_tdear_RES["tsIdentificador"];
$arURL=$SEL_tdear_RES["arURL"];
$arURL_split=split("tde_arquivos/",$arURL);
$arquivo="tde_arquivos/".$arURL_split[1];
$ver=is_link($arquivo);

if (is_file($arquivo)!="True") {
$SEL_tde7="SELECT PessoaFisica.pfNome, Programa.prNome, Titulo.ttTitulo FROM TSPF, PessoaFisica, Titulo, Programa WHERE (TSPF.tsIdentificador='$tsIdentificador_ar' and tspfTipo='Autor') and (TSPF.pfCod=PessoaFisica.pfCod) and (TSPF.prCod=Programa.prCod) and (Titulo.tsIdentificador='$tsIdentificador_ar')";
$SEL_tde7_query=mysql_db_query($base_fim,$SEL_tde7,$conexao_fim);
$SEL_tde7_RES=mysql_fetch_array($SEL_tde7_query);
$pfNome_a=$SEL_tde7_RES["pfNome"];
$prNome_a=$SEL_tde7_RES["prNome"];
$ttTitulo_a=$SEL_tde7_RES["ttTitulo"];
echo "Programa: ".$prNome_a."<br>TDE: ".$tsIdentificador_ar." Autor: ".$pfNome_a." Titulo: ".$ttTitulo_a."<br> Faltando o arquivo: ".$arquivo."<br><br>";
}
clearstatcache();

$SEL_tdear_RES=mysql_fetch_array($SEL_tdear_query);
}

echo "Fim do script.<br><br> Teste o sistema e veja se resolveu o problema.";
?>
</body>
</html>
