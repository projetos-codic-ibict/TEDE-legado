<? session_start();
if(!session_is_registered("SprCod")) {
header("Location: ../index.php");
}else{
			 require "../conexao/conexao.inc"; 
            
			$SEL_ts="SELECT * FROM Teses WHERE tsIdentificador=$tsIdentificador";
			$SEL_ts_query=mysql_db_query($base,$SEL_ts,$conexao);
            $SEL_ts_RES=mysql_fetch_array($SEL_ts_query);
				
			$tsIdioma=$SEL_ts_RES["tsIdioma"];
			$tsGrau=$SEL_ts_RES["tsGrau"];
			$tsTitulacao=$SEL_ts_RES["tsTitulacao"];
			$tsDataAtualizacao=$SEL_ts_RES["tsDataAtualizacao"];
			$tsCidadeLocalDefesa=$SEL_ts_RES["tsCidadeLocalDefesa"];
			$tsUFLocalDefesa=$SEL_ts_RES["tsUFLocalDefesa"];
			$AtsPaisLocalDefesa=$SEL_ts_RES["tsPaisLocalDefesa"];
            $tsDataDefesa=$SEL_ts_RES["tsDataDefesa"];

			$tsDataDefesa_split=split("-",$tsDataDefesa);
			$tsDia=$tsDataDefesa_split[2];
			$tsMes=$tsDataDefesa_split[1];
			$tsAno=$tsDataDefesa_split[0];
			
			$tsCampo1=$SEL_ts_RES["tsCampo1"];
			$tsCampo2=$SEL_ts_RES["tsCampo2"];
			
            $SEL_pf="SELECT * FROM PessoaFisica WHERE pfCod=$pfCod";
	        $SEL_pf_query=mysql_db_query($base,$SEL_pf,$conexao);
            $SEL_pf_RES=mysql_fetch_array($SEL_pf_query);
						
			$pfCod=$SEL_pf_RES["pfCod"];
			$pfNome=$SEL_pf_RES["pfNome"];
			$pfEmail=$SEL_pf_RES["pfEmail"];
			$pfCitacao=$SEL_pf_RES["pfCitacao"];
			$pfLattes=$SEL_pf_RES["pfLattes"];
			$pfCPF=$SEL_pf_RES["pfCPF"];
			
			$SEL_pfpj="SELECT * FROM PFPJ WHERE pfCod=$pfCod and pfpjTipo<>'AgenciaFomento'";
            $SEL_pfpj_query=mysql_db_query($base,$SEL_pfpj,$conexao);
            $SEL_pfpj_RES=mysql_fetch_array($SEL_pfpj_query);
			
			$pjCod=$SEL_pfpj_RES["pjCod"];
			
			if ($pjCod!="") {
			
			$SEL_pj="SELECT * FROM PessoaJuridica WHERE pjCod=$pjCod";
            $SEL_pj_query=mysql_db_query($base,$SEL_pj,$conexao);
            $SEL_pj_RES=mysql_fetch_array($SEL_pj_query);
			
			$pjNome=$SEL_pj_RES["pjNome"];
			$pjSigla=$SEL_pj_RES["pjSigla"];
			$pjPais=$SEL_pj_RES["pjPais"];
			$pjUF=$SEL_pj_RES["pjUF"];
			$pjCNPJ=$SEL_pj_RES["pjCNPJ"];
			$pjURL=$SEL_pj_RES["pjURL"];
			
			$SEL_nome_pais="SELECT psNome FROM Pais WHERE psSigla='$pjPais'";
            $SEL_nome_pais_query=mysql_db_query($base,$SEL_nome_pais,$conexao);
            $SEL_nome_pais_RES=mysql_fetch_array($SEL_nome_pais_query);
			
			$pjPais=$SEL_nome_pais_RES["psNome"];
			
			$SEL_nome_uf="SELECT ufNome FROM UnidadeFederativa WHERE ufSigla='$pjUF'";
            $SEL_nome_uf_query=mysql_db_query($base,$SEL_nome_uf,$conexao);
            $SEL_nome_uf_RES=mysql_fetch_array($SEL_nome_uf_query);
			
			$pjUF=$SEL_nome_uf_RES["ufNome"];
			}
			$SEL_pr="SELECT * FROM Programa WHERE prCod=$SprCod";
            $SEL_pr_query=mysql_db_query($base,$SEL_pr,$conexao);
            $SEL_pr_RES=mysql_fetch_array($SEL_pr_query);	

			$prNome=$SEL_pr_RES["prNome"];
			$prArea=$SEL_pr_RES["prArea"];
				
			$SEL_tt="SELECT * FROM Titulo WHERE tsIdentificador=$tsIdentificador";
            $SEL_tt_query=mysql_db_query($base,$SEL_tt,$conexao);
            $SEL_tt_RES=mysql_fetch_array($SEL_tt_query);

			$ttTitulo=$SEL_tt_RES["ttTitulo"];
			$ttIdioma=$SEL_tt_RES["ttIdioma"];

		      
}
?>
