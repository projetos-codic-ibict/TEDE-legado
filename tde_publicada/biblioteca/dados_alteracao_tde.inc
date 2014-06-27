<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{
			 require "../conexao/conexao_fim.inc"; 
			 require "../conexao/conexao.inc"; 
			 
			 session_register('VtsIdentificador','VpfCod','VprCod');

			$SEL_ts="SELECT * FROM Teses WHERE tsIdentificador=$VtsIdentificador";
			$SEL_ts_query=mysql_db_query($base_fim,$SEL_ts,$conexao_fim);
            $SEL_ts_RES=mysql_fetch_array($SEL_ts_query);

			$tsIdioma=$SEL_ts_RES["tsIdioma"];
			$tsGrau=$SEL_ts_RES["tsGrau"];
			$tsNumeroChamada=$SEL_ts_RES["tsNumeroChamada"];
			$tsTitulacao=$SEL_ts_RES["tsTitulacao"];
			$tsDataAtualizacao=$SEL_ts_RES["tsDataAtualizacao"];
			$tsCidadeLocalDefesa=$SEL_ts_RES["tsCidadeLocalDefesa"];
			$tsUFLocalDefesa=$SEL_ts_RES["tsUFLocalDefesa"];
			$tsPaisLocalDefesa=$SEL_ts_RES["tsPaisLocalDefesa"];
            $tsDataDefesa=$SEL_ts_RES["tsDataDefesa"];
			$tsDataFinalizacao=$SEL_ts_RES["tsDataFinalizacao"];
			$tsOBS=$SEL_ts_RES["tsOBS"];
			$tsCampo1=$SEL_ts_RES["tsCampo1"];
			$tsCampo2=$SEL_ts_RES["tsCampo2"];

			 //Pega o nome do Idioma
			$SEL_id="SELECT * FROM Idiomas WHERE idSigla='$tsIdioma'";
	        $SEL_id_query=mysql_db_query($base,$SEL_id,$conexao);
            $SEL_id_RES=mysql_fetch_array($SEL_id_query);

			$tsNomeIdioma=$SEL_id_RES['idIdioma'];

		    //pega o nome do Pais
			$SEL_ps="SELECT * FROM Pais WHERE psSigla='$tsPaisLocalDefesa'";
	        $SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
            $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
			
			$tsPaisLocalDefesa=$SEL_ps_RES['psNome'];

            $SEL_pf="SELECT * FROM PessoaFisica WHERE pfCod=$VpfCod";
	        $SEL_pf_query=mysql_db_query($base_fim,$SEL_pf,$conexao_fim);
            $SEL_pf_RES=mysql_fetch_array($SEL_pf_query);
				

			$pfCod=$SEL_pf_RES["pfCod"];
			$pfNome=$SEL_pf_RES["pfNome"];
			$pfEmail=$SEL_pf_RES["pfEmail"];
			$pfCitacao=$SEL_pf_RES["pfCitacao"];
			$pfCitacaoABNT=$SEL_pf_RES["pfCitacaoABNT"];
			$pfLattes=$SEL_pf_RES["pfLattes"];
			$pfCPF=$SEL_pf_RES["pfCPF"];
			

			$SEL_pfpj="SELECT * FROM PFPJ WHERE pfCod=$VpfCod and pfpjTipo<>'AgenciaFomento'";
            $SEL_pfpj_query=mysql_db_query($base_fim,$SEL_pfpj,$conexao_fim);
            $SEL_pfpj_RES=mysql_fetch_array($SEL_pfpj_query);

			$pjCod=$SEL_pfpj_RES["pjCod"];
			

			if ($pjCod!="") {
		

			$SEL_pj="SELECT * FROM PessoaJuridica WHERE pjCod=$pjCod";
            $SEL_pj_query=mysql_db_query($base_fim,$SEL_pj,$conexao_fim);
            $SEL_pj_RES=mysql_fetch_array($SEL_pj_query);
			
			$pjNome=$SEL_pj_RES["pjNome"];
			$pjSigla=$SEL_pj_RES["pjSigla"];
			$pjPais=$SEL_pj_RES["pjPais"];
			$pjUF=$SEL_pj_RES["pjUF"];
			$pjCNPJ=$SEL_pj_RES["pjCNPJ"];
			$pjURL=$SEL_pj_RES["pjURL"];
			
			//pega o nome do Pais
			$SEL_ps="SELECT * FROM Pais WHERE psSigla='$pjPais'";
	        $SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
            $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
			
			$pjNomePais=$SEL_ps_RES['psNome'];

			}
			$SEL_dispEmail="SELECT tspfDispEmail, prCod FROM TSPF WHERE tsIdentificador=$VtsIdentificador and tspfTipo='Autor'";
            $SEL_dispEmail_query=mysql_db_query($base_fim,$SEL_dispEmail,$conexao_fim);
            $SEL_dispEmail_RES=mysql_fetch_array($SEL_dispEmail_query);

		    $tspfDispEmail=$SEL_dispEmail_RES["tspfDispEmail"];
			$prCod=$SEL_dispEmail_RES["prCod"];

			$SEL_pr="SELECT * FROM Programa WHERE prCod=$prCod";
            $SEL_pr_query=mysql_db_query($base_fim,$SEL_pr,$conexao_fim);
            $SEL_pr_RES=mysql_fetch_array($SEL_pr_query);	

			$prNome=$SEL_pr_RES["prNome"];
			$prArea=$SEL_pr_RES["prArea"];
		

			if ($tsDataFinalizacao=="") {	
					

			$SEL_tt="SELECT * FROM Titulo WHERE tsIdentificador=$VtsIdentificador";
            $SEL_tt_query=mysql_db_query($base_fim,$SEL_tt,$conexao_fim);
            $SEL_tt_RES=mysql_fetch_array($SEL_tt_query);

			$ttTitulo=$SEL_tt_RES["ttTitulo"];
			$ttIdioma=$SEL_tt_RES["ttIdioma"];

			} else {

			session_register(tsDataFinalizacao);

			$SEL_tt="SELECT * FROM Titulo WHERE tsIdentificador=$VtsIdentificador ORDER BY ttCod";
            $SEL_tt_query=mysql_db_query($base_fim,$SEL_tt,$conexao_fim);
            $SEL_tt_RES=mysql_fetch_array($SEL_tt_query);

			$i_tt=0;

			while ($SEL_tt_RES!="") {

			$AttTitulo[$i_tt]=$SEL_tt_RES["ttTitulo"];

			if ($i_tt=="1") {

			$tsIdiomaALT=$SEL_tt_RES["ttIdioma"];

			}

			$i_tt=$i_tt+1;

			$SEL_tt_RES=mysql_fetch_array($SEL_tt_query);

			}

			//Seleciona Area/Sub-area do CNPQ

			$SEL_as1="SELECT * FROM Assunto WHERE tsIdentificador=$VtsIdentificador and asEsquema='Tabela CNPQ' ORDER BY asCod";
            $SEL_as1_query=mysql_db_query($base_fim,$SEL_as1,$conexao_fim);
            $SEL_as1_RES=mysql_fetch_array($SEL_as1_query);

			$asAssunto=$SEL_as1_RES["asAssunto"];

			//Seleciona Palavras-chave

			$SEL_as2="SELECT * FROM Assunto WHERE tsIdentificador=$VtsIdentificador and asEsquema='Palavra-chave' and asIdioma='$tsIdioma' ORDER BY asCod";
			
            $SEL_as2_query=mysql_db_query($base_fim,$SEL_as2,$conexao_fim);
            $SEL_as2_RES=mysql_fetch_array($SEL_as2_query);

			$i_as=0;

			while ($SEL_as2_RES!="") {

			$AasAssunto2[$i_as]=$SEL_as2_RES["asAssunto"];

			$i_as=$i_as+1;

        	$SEL_as2_RES=mysql_fetch_array($SEL_as2_query);

			}

			//Seleciona Palavras-chave

			$SEL_as3="SELECT * FROM Assunto WHERE tsIdentificador=$VtsIdentificador and asEsquema='Palavra-chave' and asIdioma!='$tsIdioma' ORDER BY asCod";
            $SEL_as3_query=mysql_db_query($base_fim,$SEL_as3,$conexao_fim);
            $SEL_as3_RES=mysql_fetch_array($SEL_as3_query);

			$i_as=0;

			while ($SEL_as3_RES!="") {

			$AasAssunto3[$i_as]=$SEL_as3_RES["asAssunto"];
            $AasIdiomaAssunto3[$i_as]=$SEL_as3_RES["asIdioma"];
			
			
			if ($tsIdiomaALT=="") {
			$tsIdiomaALT=$SEL_as3_RES["asIdioma"];
			}
			
			$i_as=$i_as+1;

			$SEL_as3_RES=mysql_fetch_array($SEL_as3_query);

			}

			$SEL_rs="SELECT * FROM Resumo WHERE tsIdentificador=$VtsIdentificador ORDER BY rsCod";
            $SEL_rs_query=mysql_db_query($base_fim,$SEL_rs,$conexao_fim);
            $SEL_rs_RES=mysql_fetch_array($SEL_rs_query);

			$i_rs=0;

			while ($SEL_rs_RES!="") {

			$ArsResumo[$i_rs]=$SEL_rs_RES["rsResumo"];

			if ($tsIdiomaALT=="") {
			$tsIdiomaALT=$SEL_rs_RES["rsIdioma"];
			}

			$i_rs=$i_rs+1;

			$SEL_rs_RES=mysql_fetch_array($SEL_rs_query);

			}

			$SEL_dr="SELECT * FROM Direitos WHERE tsIdentificador=$VtsIdentificador";
            $SEL_dr_query=mysql_db_query($base_fim,$SEL_dr,$conexao_fim);
            $SEL_dr_RES=mysql_fetch_array($SEL_dr_query);

			$drDireito=$SEL_dr_RES["drDireito"];

			}
   
}
?>

