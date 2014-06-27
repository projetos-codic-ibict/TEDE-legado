<?php
//{{{ Class TEDE_MARC
//
// Gera um registro MARC21 a partir dos registros do TEDE.

require_once('iso2709.php');
require_once("../bibliotecas/servidor.bib");

class TEDE_MARC
{
	var $_begin;
	var $_marc;
	
	function TEDE_MARC()
	{
		$this->_begin =null;
		$this->_end=null;
		$this->_tamanho_resumo=$_REQUEST['tam_resumo'];
	
	}
	
 	function fixDate($data)
	{
		return $data;
	}
	
	function retiraEnter($string)
	{
		$texto_sem_enter = null;
		$texto_sem_enter = strtr($string, "\n", " ");
		$texto_sem_enter = strtr($texto_sem_enter,"\r", "");
		$texto_sem_enter = strtr($texto_sem_enter,chr(13), " ");
		
		return $texto_sem_enter;
	}
		
	
	function setBegin($data = null)
	{
		$this->_begin = $this->fixDate($data);
	}
			
	function setEnd($data)
	{
		$this->_end = $this->fixDate($data);			
	}
	
	function dump()
	{
		global $servidor_diretorio;
		
		$sql = "SELECT * FROM Teses WHERE ";
		if ($this->_begin!=null){
			$sql.= " tsDataAtualizacao > '".$this->_begin." 00:00:00' AND ";
		}
		if($this->_end!=null){
			$sql.=" tsDataAtualizacao <= '".$this->_end." 23:59:59' AND ";
		}
		$sql.=" tsIdentificador IS NOT NULL ";
		//$sql.=" ORDER BY tsIdentificador LIMIT 10";
		
		
		$query = mysql_query($sql);
		while($row = mysql_fetch_array($query)){
			$this->_marc = new iso2709_record('',AUTO_UPDATE);
			$this->_marc->set_rs('n'); 
			$this->_marc->set_dt('a'); 
			
			// Utilizado para definir a conversão de acordo com cada idioma
			//$this->_marc->set_char_set('ISO5426');
		
			/*
			* CAMPOS DE CONTROLE, são campos relacionados a Sigla, Data da atualização, Identificação do documento
			* e tipo de documento.
			*/
			// <Controle>
			
			// <Sigla> Sigla de controle 
			
			
			// <IdentificacaoDocumento> Identificação do documento
			$this->_marc->add_field('001','  ',$row['tsIdentificador']);
			// <DataAtualizacao> Data da ultima atualização
			$this->_marc->add_field('005','  ',str_replace('-','/',substr($row['tsDataAtualizacao'],0,10)));
			
			
			// <Tipo> tipo do documento - Efetuado na consulta dos arquivos da TESE, caso haja documentos são inseridos
			// como tese digital, caso contrário,  como tese impressa.
			
			
			/*CAMPOS REFERENTES A BIBLIOTECA DIGITAL, são campos Nome, Sigla, URL da Biblioteca Digital,
			* URL do documento e Provedor de serviço(nome, sigla, País, UF, CNPJ e URL).
			*/
			
			// <BibliotecaDigital> Biblioteca Digital
			$sql_Bdigital="SELECT bbSigla FROM BibliotecaDigital";

			$query_BD = mysql_query($sql_Bdigital);
			$linha_BD = mysql_fetch_array($query_BD);
			
			// <Nome> Nome Biblioteca Digital
			//$this->_marc->add_field('???','  ',$linha_BD['bbNome']);
			
			// <Sigla> Sigla da Biblioteca Digital			
			// Rerirado apás reunião com Sueli Maffia dia 01/12/2006
			//$this->_marc->add_field('003','  ',$this->retiraEnter($linha_BD['bbSigla'])); 
			
			//  <URL> URL da Biblioteca Digital
			//$this->_marc->add_field('???','  ',$linha_BD['bbURL']); 
			
			
			// <ProvedorServico> Provedor de serviço (e seus campos)
				//Não implementados no TEDE.
				
			/* <BibliotecaDepositaria> CAMPOS REFERENTES A BIBLIOTECA DEPOSITÁRIA, são campos 
			* Nome, Sigla, URL da Biblioteca Depositária e Número da chamada (identificação interna da biblioteca).
			*/
			
			$sql_Bdepositaria="SELECT bdSigla FROM BibliotecaDepositaria";
			$query_BDep = mysql_query($sql_Bdepositaria);
			$linha_BDep = mysql_fetch_array($query_BDep);

			/* <Nome> Nome da Biblioteca Depositária
			if($linha_BDep['bdNome']!=null){
				$this->_marc->add_field('???','  ','?',$linha_BDep['bdNome']);
			}*/
			
			// <Sigla> Sigla da Biblioteca Depositária
			// Retirado após reunião com Sueli Maffia dia 28/11/2006
			/*if($linha_BDep['bdSigla']!=null){
				$this->_marc->add_field('090','  ','a',$this->retiraEnter($linha_BDep['bdSigla'])); 
			}*/
			
			/* <URL> URL da Biblioteca Depositária
			if ($linha_BDep['bdURL']!=null){
				$this->_marc->add_field('???','  ','?',$linha_BDep['bdURL']);
			}*/
			
			// <NumeroChamada> Numero Chamada que identifica a tese ou dissertação no acervo da Biblioteca Depositária 
			// Auterado de 852 c para 091
			//  após reunião com Sueli Maffia dia 28/11/2006
			if ($row['tsNumeroChamada']!=null){
				$this->_marc->add_field('091','  ', $this->retiraEnter($row['tsNumeroChamada']));
			}
			
			/* CAMPO TÍTULO
			*/
			
			// <Titulo> Buscando os Titulos da TESE
			
			$sql_titulos = "SELECT ttTitulo,ttIdioma ";
			$sql_titulos.=" FROM Titulo ";
			$sql_titulos.=" WHERE tsIdentificador=\"".$row['tsIdentificador']."\"  ";
			
			$query_titulos = mysql_query($sql_titulos);
			$subfield_245 = null;
			$c_245 =0;
			
			while($titulo=mysql_fetch_array($query_titulos))
			{
				$subfield_245[$c_245++]= array('a'=>$this->retiraEnter($titulo['ttTitulo']));
			}
			
			
			/* <Arquivo> Arquivos da TESE, com os campos URL, legenda e Nível de acesso
			*/
			
			$sql_arquivos =" SELECT arURL, arDireitos, arCod  ";
			$sql_arquivos.=" FROM Arquivos ";
			$sql_arquivos.=" WHERE tsIdentificador=\"".$row['tsIdentificador']."\"  ";
			
			$query_arquivos = mysql_query($sql_arquivos);
			$tem_arquivo = false;
			$subfield_856 = null;
			$c_856 =0;
			while($arquivo=mysql_fetch_array($query_arquivos))
			{
				// buscando as Legenda dos arquivos e seus idiomas
				$sql_legenda_arq =" SELECT laLegenda, laIdioma ";
				$sql_legenda_arq.=" FROM LegendaArquivo ";
				$sql_legenda_arq.=" WHERE arCod =\"".$arquivo['arCod']."\" ";
				
				$query_legenda = mysql_query($sql_legenda_arq);
				/* Retirado após reunião com Sueli Maffia dia 28/11/2006
				while($legenda=mysql_fetch_array($query_legenda))
				{
					if($legenda['laLegenda'] !=null)
					{
						// <Legenda> Legenda do arquivo
						$subfield_856[$c_856++]= array('3'=>$this->retiraEnter($legenda['lsLegenda']));
						// <Idioma> Idioma da Legenda
						$subfield_856[$c_856++]= array('z'=>$this->retiraEnter($legenda['lsIdioma'])); // Sugestão
					}
				}
				*/
				// <URL> URL do arquivo da TESE
				
				// Preg_match retorna o endereço sem o http:// inicial, para a normalização do enderço.
				preg_match("/^(http:\/\/)?(.+)/i", $servidor_diretorio, $matches);
				$texto_temp=str_replace("../","",$this->retiraEnter($arquivo['arURL']));
				$subfield_856[$c_856++]= array('u'=>"http://".$matches[2].$texto_temp);
				
				
				//$this->_marc->add_field('856','42','u',$servidor_diretorio.$texto_temp);
				// <NivelAcesso> Nivel de acesso do arquivo
				//$this->_marc->add_field('856','7 ','2',$arquivo['arDireitos']);// sugestão
				// Retirado após reunião com Sueli Maffia dia 28/11/2006
				//$subfield_856[$c_856++]= array('2'=>$this->retiraEnter($arquivo['arDireitos']));// Sugestão
								
				
				
				$tem_arquivo = true;
				
				if(subfield_856!=null){
					$this->_marc->add_field('856','42',$subfield_856);
					$subfield_856 = null;
					$c_856 =0;
				}
			}

			
			
			/* Definição dos tipos de da fonte de informação, caso haja arquivos é considerado uma Tese Digital,
			 * caso contrário é uma tese impressa regular. OBs.: Não retiras os espaços entre as informações, 
			 * eles significam a possição utilizada pelo MARC21, espaços 24 e 25 até 27, marcam o tipo do arquivo.
			 */
			 
			if($tem_arquivo)
			{
				$campo_008 = "                      smmmm";
			}else{
				$campo_008 = "                      rmmmm";
			}
		
			
			/*  <Idioma> CAMPO IDIOMA DA TESE
			*/
			
			//$this->$idioma = null;
			
			// <Idioma> Idioma da TESE, gravando também o campo 008 posições 35 a 37
			switch($row['tsIdioma']){
				case ('pt'): $idioma = 'por';$campo_008.= "      por     "; break;
				case ('en'): $idioma = 'eng';$campo_008.= "      eng     "; break;
				case ('es'): $idioma = 'spa';$campo_008.= "      spa     "; break;
				case ('fr'): $idioma = 'fre';$campo_008.= "      fre     "; break;
				default:
				break;
			}
			
			// Incluir ou informar as linguagens adicionais 
			/* Retirado após reunião com Sueli Maffia dia 28/11/2006
			if ($idioma!=null){
				$this->_marc->add_field('041','0 ','a',$this->retiraEnter($idioma)); //Verificar o código a ser usado
			}*/

			// <Grau> Grau do TDE 
			// Retirado após reunião com Sueli Maffia dia 28/11/2006 <Titulacao> Titulação da TESE
			// Sugestão
			if ($row['tsGrau']!=null){
				$this->_marc->add_field('502','  ','a',trim($this->retiraEnter($row['tsGrau']))); //??????
			}
			
			/* <Titulacao> Titulação da TESE
			if ($row['tsTitulacao']){
				$this->_marc->add_field('502',' ','a',$row['tsTitulacao']);
			}*/
					
			/*<Resumo> RESUMO contendo Resumo da TESE e o Idioma do resumo
			*/
			
			
			$sql_resumo = "SELECT rsResumo, rsIdioma ";
			$sql_resumo.=" FROM Resumo ";
			$sql_resumo.=" WHERE tsIdentificador=\"".$row['tsIdentificador']."\"  ";
			$subfield_520 = null;
			$c_520 = 0;
			
			$query_resumo = mysql_query($sql_resumo);
			while($resumo=mysql_fetch_array($query_resumo))
			{
				// <Resumo> Resumo e seu idioma
				//$this->_marc->add_field('520','  ','a',$resumo['rsResumo']);
				
				$max = strlen($resumo['rsResumo']);
				if ($this->_tamanho_resumo > 0 )
				{
					$max = $this->_tamanho_resumo;					
				}
				
				if (strlen($this->retiraEnter($resumo['rsResumo']))>$max)
				{
					$resumo_Final = null;
					$resumo_Final = substr(trim($this->retiraEnter($resumo['rsResumo'])),0,$max)."...";
					$subfield_520[$c_520++]= array('a'=>$resumo_Final);
					
				}else{				
					$subfield_520[$c_520++]= array('a'=>$this->retiraEnter($resumo['rsResumo']));
				}
				//$this->_marc->add_field('520','  ','b',$resumo['rsIdioma']);
				$subfield_520[$c_520++]= array('b'=>$this->retiraEnter($resumo['rsIdioma']));
				
				if($subfield_520 != null)
				{
					$this->_marc->add_field('520','  ',$subfield_520);
					$subfield_520 = null;
					$c_520 = 0;
				}
			}

			/*Cobertura da TESE e seu IDIOMA
			// Retirado após reunião com Sueli Maffia dia 28/11/2006
			$sql_cobertura = "SELECT * ";
			$sql_cobertura.="FROM Cobertura ";
			$sql_cobertura.="WHERE tsIdentificador=\"".$row['tsIdentificador']."\"  ";
			
			$subfield_650=null;
			$c_650=0;
				
			$query_cobertura = mysql_query($sql_cobertura);
			while($cobertura=mysql_fetch_array($query_cobertura))
			{
				// <Cobertura>
				$subfield_650[$c_650++]= array('y'=>$this->retiraEnter($cobertura['cbCobertura']));
				$subfield_650[$c_650++]= array('z'=>$this->retiraEnter($cobertura['cbIdioma'])); // Sugestão 

			}
							
			if($subfield_650 != null)
			{
				$this->_marc->add_field('650','24',$subfield_650);
			}
			*/
			/* Campo Assunto, seu idioma e seu Esquema relacionado
			*/
			$sql_assunto = "SELECT  asIdioma , asAssunto , asEsquema ";
			$sql_assunto.=" FROM Assunto ";
			$sql_assunto.=" WHERE tsIdentificador=\"".$row['tsIdentificador']."\"  ";
			
			$subfield_650=null;
			$c_650=0;
			
				
			$query_assunto = mysql_query($sql_assunto);
			while($assunto=mysql_fetch_array($query_assunto))
			{
				// <Assunto> Assuntos relacionados da TESE
				$subfield_650[$c_650++]= array('a'=>$this->retiraEnter($assunto['asAssunto']));
				// Retirado após reunião com Sueli Maffia dia 28/11/2006
				//$subfield_650[$c_650++]= array('z'=>$this->retiraEnter($assunto['asIdioma'])); //SUGESTÃO
				$subfield_650[$c_650++]= array('2'=>$this->retiraEnter($assunto['asEsquema'])); //SUGESTÃO
				
				if($subfield_650 != null)
				{
					$this->_marc->add_field('650','14',$subfield_650);
					$subfield_650=null;
					$c_650=0;
				}
			}
			
			
			//$this->_marc->add_field('650','14',$subfield_650);
			/* Local de Defesa da TESE, contendo Cidade, UF e País
			*/
			$subfield_260 = null;
			$c_260 =0;
			$strdata = null;
			$UFLocal = null;
			$PaisLocal = null;
			
			// <Cidade> Cidade de defesa da TESE, <UF> tsUFLocalDefesa e <País> tsPaisLocalDefesas
			if($row['tsCidadeLocalDefesa'] !=null)
			{
				if ($row['tsUFLocalDefesa'] != null){
					$UFLocal = ', '.$row['tsUFLocalDefesa'];
				}
				
				if ($row['tsPaisLocalDefesas'] != null){
					$PaisLocal = ', '.$row['tsPaisLocalDefesas'];
				}
				
				$subfield_260[$c_260++]= array('a'=>$this->retiraEnter($row['tsCidadeLocalDefesa'].$UFLocal.$PaisLocal)); //Cidade de Defesa
			}		
			
			/* Data da defesa seguida de Cidade da defesa
			*/

			if($row['tsDataDefesa']!= null)
			{
				
				$strdata = substr($row['tsDataDefesa'],0,4);
				$strdata.="/";
				
				if (substr($row['tsDataDefesa'],5,2) == '00')
				{
					$strdata.= '?';
				}else{
					$strdata.= substr($row['tsDataDefesa'],5,2);
				}
				
				$strdata.="/";
				
				if (substr($row['tsDataDefesa'],8,2) == '00')
				{
					$strdata.= '?';
				}else{
					$strdata.= substr($row['tsDataDefesa'],8,2);
				}
				

				$subfield_260[$c_260++]= array('c'=>$strdata);
			}
			// <DataDefesa>
			if ($c_260>0){
				$this->_marc->add_field('260','  ',$subfield_260);
			}
		
			
			/*Campo Autor com Nome, Citação, Lattes, CPF e Afiliação (Nome, Sigla, País, UF, CNPJ e URL)
				assim como o campo Contribuidor com Nome, Citacao, Lattes, CPF e Afiliação (Nome, Sigla, País, UF, CNPJ e URL).
			*/
			$subfield_100 = null;
			$c_100 = 0;
			
			$subfield_700 = null;
			$c_700 = 0;
						
			$sql_tspf =" SELECT TSPF.tsidentificador, PessoaFisica.pfCod,  pfNome, tspfTipo, ";
			$sql_tspf.=" pfCitacaoABNT, pfCitacao, pfLattes, pfCpf ";
			$sql_tspf.=" FROM TSPF ";
			$sql_tspf.=" INNER  JOIN PessoaFisica ON TSPF.pfCod = PessoaFisica.pfCod ";
			$sql_tspf.=" WHERE TSPF.tsIdentificador=\"".$row['tsIdentificador']."\"  ";
				
			$query_tspf = mysql_query($sql_tspf);
			while($TesePF=mysql_fetch_array($query_tspf)) // Todas incluem sugestões
			{
				if($TesePF['tspfTipo'] == "Autor")
				{
					// <Autor>
					
					// <Nome> 
					//$this->_marc->add_field('100','1 ','q',$TesePF['pfNome']); // Sugestão
					// Retirado após reunião com Sueli Maffia dia 28/11/2006
					// $this->_marc->add_field('245','  ','c',$TesePF['pfNome']);
					$subfield_245[$c_245++]= array('c'=>$this->retiraEnter($TesePF['pfNome']));
					// <Citacao>
					//$this->_marc->add_field('100','1 ','a',$TesePF['pfCitacao']); // Sugestão
					$subfield_100[$c_100++]= array('a'=>$this->retiraEnter($TesePF['pfCitacao']));
					// <Lattes> SEM CÓDIGO REFERENTE
					//$this->_marc->add_field('100','1 ','?',$TesePF['pfLattes']); // ????
					// <CPF>
					// $this->_marc->add_field('100','1 ','b',$TesePF['pfCpf']); // Sugestão
					// Retirado após reunião com Sueli Maffia dia 28/11/2006
					// $subfield_100[$c_100++]= array('b'=>$this->retiraEnter($TesePF['pfCpf']));
					// Tipo de relacionamento da pessoa
					//$this->_marc->add_field('100','1 ','e',$TesePF['tspfTipo']); // Sugestão
					// Retirado após reunião com Sueli Maffia dia 28/11/2006
					//$subfield_100[$c_100++]= array('e'=>$this->retiraEnter($TesePF['tspfTipo']));
					
					
					// <afiliacao> Afiliação
					/*Retirado após reunião com Sueli Maffia dia 28/11/2006
					$subfield_110 = null;
					$c_110 = 0;
					
					$sql_afiliacao = " SELECT * FROM PFPJ ";
					$sql_afiliacao.= " INNER JOIN PessoaJuridica ON ";
					$sql_afiliacao.= " PFPJ.pjCod = PessoaJuridica.pjCod ";
					$sql_afiliacao.= " WHERE pfpjTipo = 'Afiliacao' ";
					$sql_afiliacao.= " AND PFPJ.pfCod='".$TesePF['pfCod']."' ";
					$sql_afiliacao.= " GROUP BY PFPJ.pfcod ";
					
					$query_afiliacao = mysql_query($sql_afiliacao);
					while($AfiliaAtor=mysql_fetch_array($query_afiliacao))
					{
						// <Sigla> e <Nome>
						if($AfiliaAtor['pjNome']!=null){
							//$this->_marc->add_field('100','1 ','u',$AfiliaAtor['pjNome']);
							$subfield_100[$c_100++]= array('u'=>$this->retiraEnter($AfiliaAtor['pjNome']));
							$subfield_110[$c_110++]= array('a'=>$this->retiraEnter($AfiliaAtor['pjSigla'].' - '.$AfiliaAtor['pjNome'])); */
							
							if ($subfield_100 != null)
							{
								$this->_marc->add_field('100','1 ',$subfield_100);
								$subfield_100 = null;
								$c_100 = 0;
							}
						//}
						/* <Sigla>
						if($AfiliaAtor['pjSigla']!=null){
							$subfield_110[$c_110++]= array('?'=>$AfiliaAtor['pjSigla']);
						} */
						/*
						// <UF> & <Pais>
						if($AfiliaAtor['pjPais']!=null){

							$subfield_110[$c_110++]= array('c'=>$this->retiraEnter($AfiliaAtor['pjUF'].', '.$AfiliaAtor['pjPais']));
						}
						/* <UF>
						if($AfiliaAtor['pjUF']!=null){
							$subfield_110[$c_110++]= array('?'=>);
						}
						// <CNPJ>
						if($AfiliaAtor['pjCNPJ']!=null){
							//$subfield_110[$c_110++]= array('?'=>$AfiliaAtor['pjCNPJ']);
						}
						// <URL>
						if($AfiliaAtor['pjURL']!=null){
						 $subfield_110[$c_110++]= array('6'=>$this->retiraEnter($AfiliaAtor['pjURL']));
						}
						
					}
					
					if($subfield_110!=null)
					{
						$this->_marc->add_field('110','2 ',$subfield_110);
						
					}

					*/
				}elseif($TesePF['tspfTipo'] == "Orientador"){
					// <Contribuidor> Contribuidores
					
					// <Citacao>
					$subfield_700[$c_700++]= array('a'=>$this->retiraEnter($TesePF['pfCitacao']));
					// <Lattes>
					//$subfield_700[$c_700++]= array('?'=>$TesePF['pfLattes']); // ???
					// <CPF>
					// Retirado após reunião com Sueli Maffia dia 28/11/2006
					//$subfield_700[$c_700++]= array('b'=>$this->retiraEnter($TesePF['pfCpf']));
					// Tipo de relacionamento da pessoa
					$subfield_700[$c_700++]= array('e'=>$this->retiraEnter($TesePF['tspfTipo']));
					// <Nome>
					$subfield_700[$c_700++]= array('q'=>$this->retiraEnter($TesePF['pfNome']));
					
					if($subfield_700!=null)
					{
						$this->_marc->add_field('700','1 ',$subfield_700);
						$subfield_700 = null;
						$c_700 = 0;
					}

					$subfield_710 = null;
					$c_710 = 0;
					
					// <afiliacao> Afiliação
					/* Retirado após reunião com Sueli Maffia dia 28/11/2006
					
					$sql_afiliacao_cont = " SELECT * FROM PFPJ ";
					$sql_afiliacao_cont.= " INNER JOIN PessoaJuridica ON ";
					$sql_afiliacao_cont.= " PFPJ.pjCod = PessoaJuridica.pjCod ";
					$sql_afiliacao_cont.= " WHERE pfpjTipo = 'Afiliacao' ";
					$sql_afiliacao_cont.= " AND PFPJ.pfCod='".$TesePF['pfCod']."' ";
					$sql_afiliacao_cont.= " GROUP BY PFPJ.pfcod ";
					
					$query_afiliacao = mysql_query($sql_afiliacao_cont);
					while($AfiliaContribu=mysql_fetch_array($query_afiliacao))
					{
						// <Sigla> e <Nome>
						if($AfiliaContribu['pjNome']!=null){
							$subfield_710[$c_710++]= array('a'=>$this->retiraEnter($AfiliaContribu['pjSigla'].' - '.$AfiliaContribu['pjNome']));
						}
						/* <Sigla>
						if($AfiliaContribu['pjSigla']!=null){
							$subfield_710[$c_710++]= array(''=>$AfiliaContribu['pjSigla']);
						}*/
						
						// <UF> e <Pais>
						/*if($AfiliaContribu['pjPais']!=null){
							$subfield_710[$c_710++]= array('c'=>$this->retiraEnter($AfiliaContribu['pjUF'].', '.$AfiliaContribu['pjPais']));
						}
						
						
						if($AfiliaContribu['pjUF']!=null){
							$subfield_710[$c_710++]= array('?'=>);
						} */
						
						// <CNPJ>
						//if($AfiliaContribu['pjCNPJ']!=null){
							//$subfield_710[$c_710++]= array('?'=>$AfiliaContribu['pjCNPJ']);
						//}
						// <URL>
						/*
						if($AfiliaContribu['pjURL']!=null){
						 $subfield_710[$c_710++]= array('6'=>$this->retiraEnter($AfiliaContribu['pjURL']));
						}
						
						$subfield_710[$c_710++]= array('e'=>'Afiliação');
						
						// Campo 710
						if($subfield_710!=null){
							$this->_marc->add_field('710','2 ',$subfield_710);
							$subfield_710 = null;
							$c_710 = 0;
						}
						
					}
					*/

				}
				

			}
			
			/* Campo Instituicao de Defesa contendo os campos Nomes, Sigla, País, UF, CNPJ,
			* URL e PROGRAMA (NOME e ÁREA)
			*/
			// Retirado após reunião com Sueli Maffia dia 28/11/2006
			//$subfield_650=null;
			//$c_650=0;
			
			$sql_Instituicao_Programa ="SELECT inNome, inSigla, inPais, ";
			$sql_Instituicao_Programa.="inUF, inCNPJ, inURL, prNome, prArea ";
			$sql_Instituicao_Programa.="FROM TSPF ";
			$sql_Instituicao_Programa.="INNER JOIN Programa ON ";
			$sql_Instituicao_Programa.="TSPF.prCod = Programa.prCod ";
			$sql_Instituicao_Programa.="INNER JOIN Teses ON ";
			$sql_Instituicao_Programa.="Teses.tsIdentificador=TSPF.tsIdentificador ";
			$sql_Instituicao_Programa.="INNER JOIN Instituicao ON ";
			$sql_Instituicao_Programa.="Instituicao.inCod = Teses.inCod ";
			$sql_Instituicao_Programa.="WHERE Teses.tsIdentificador=\"".$row['tsIdentificador']."\"  ";
			
			$query_InsPrograma = mysql_query($sql_Instituicao_Programa);
			while($Institu_Programa=mysql_fetch_array($query_InsPrograma)){
				
				// <InstituicaoDefesa>
				if($Institu_Programa['inNome']!= null || $Institu_Programa['inSigla']!= null){
					// <Sigla> e <Nome> Nome da Instituição de Defesa
					$subfield_710[$c_710++]= array('a'=>$this->retiraEnter($Institu_Programa['inNome']));
				}
				/* Retirado após reunião com Sueli Maffia dia 28/11/2006
				if($Institu_Programa['inPais']!= null || $Institu_Programa['inUF']!= null ){
					// <UF> e <Pais>
					$subfield_710[$c_710++]= array('c'=>$this->retiraEnter($Institu_Programa['inUF'].', '.$Institu_Programa['inPais']));
				}

				if($Institu_Programa['inCNPJ']!= null){
					// <CNPJ>
					//$subfield_710[$c_710++]= array('?'=>$Institu_Programa['inCNPJ']);
				}
				if($Institu_Programa['inURL']!= null){
					// <URL>
					$subfield_710[$c_710++]= array('6'=>$this->retiraEnter($Institu_Programa['inURL']));
				}
					// <Programa>
				if($Institu_Programa['prNome']!= null){
					// <Nome> Nome do Programa de pós-graduação - VERIFICAR INSTITUIÇÃO DE PROGRAMA E ÁREA
					//$this->_marc->add_field('650',' 4','e',$Institu_Programa['prNome']);
					$subfield_650[$c_650++]= array('e'=>$this->retiraEnter($Institu_Programa['prNome']));
					
				}
				if($Institu_Programa['prArea']!= null){
					// <Area>
					//$this->_marc->add_field('650',' 4','a',$Institu_Programa['prArea']);
					$subfield_650[$c_650++]= array('e'=>$this->retiraEnter($Institu_Programa['prArea']));
				}
				
				if($subfield_650 != null)
				{
					$this->_marc->add_field('650',' 4',$subfield_650);
				}
				*/
				$subfield_710[$c_710++]= array('e'=>'Instituição de Defesa');
				
				// Campo 710
				if($subfield_710!=null){
					$this->_marc->add_field('710','2 ',$subfield_710);
					$subfield_710 = null;
					$c_710 = 0;					
				}
			}
			
			
			/* Retirado após reunião com Sueli Maffia dia 28/11/2006
			*Agencia de fomento contendo os campos Nome, Sigla, País, UF, CNPJ e URL
			
			$sql_Agencia ="SELECT tsIdentificador, pjNome, pjSigla, ";
			$sql_Agencia.="pjPais, pjUF, pjCNPJ, pjURL ";
			$sql_Agencia.= "FROM PessoaJuridica ";
			$sql_Agencia.= "INNER JOIN PFPJ ON ";
			$sql_Agencia.= "PFPJ.pjCod = PessoaJuridica.pjCod ";
			$sql_Agencia.= "INNER JOIN TSPF ON ";
			$sql_Agencia.= "PFPJ.pfCod = TSPF.pfCod ";
			$sql_Agencia.= "WHERE PFPJ.pfpjTipo = \"AgenciaFomento\"";
			$sql_Agencia.= "AND tsIdentificador=\"".$row['tsIdentificador']."\"  ";
			
			$query_Fomento = mysql_query($sql_Agencia);
			while($Agencia_Fomento=mysql_fetch_array($query_Fomento)){
				// <AgenciaFomento>
				if($Agencia_Fomento['pjNome']!=null || $Agencia_Fomento['pjSigla']!=null){
					// <Sigla> e <Nome> Nome da Agência de Fomento
					$subfield_710[$c_710++]= array('a'=>$this->retiraEnter($Agencia_Fomento['pjSigla'].' - '.$Agencia_Fomento['pjNome']));
				}
				if($Agencia_Fomento['pjPais']!=null || $Agencia_Fomento['pjUF']!=null){
					// <UF> e <Pais>
					$subfield_710[$c_710++]= array('c'=>$this->retiraEnter($Agencia_Fomento['pjUF'].', '.$Agencia_Fomento['pjPais']));
				}

				if($Agencia_Fomento['pjCNPJ']!=null){
					// <CNPJ>
					//$subfield_710[$c_710++]= array('?'=>$Agencia_Fomento['pjCNPJ']);
				}
				if($Agencia_Fomento['pjURL']!=null){
					// <URL>
					$subfield_710[$c_710++]= array('6'=>$this->retiraEnter($Agencia_Fomento['pjURL']));
				}
				
				$subfield_710[$c_710++]= array('e'=>'Agência de Fomento');
				
				
				if($subfield_710!=null){
					$this->_marc->add_field('710','2 ',$subfield_710);
					$subfield_710 = null;
					$c_710 = 0;					
				}
			
			}
			*/
			//Direitos de Acesso
			/* Retirado após reunião com Sueli Maffia dia 28/11/2006
			$sql_Direitos="SELECT * FROM Direitos ";
			$sql_Direitos.="WHERE tsIdentificador=\"".$row['tsIdentificador']."\"  ";
			
			$query_Direitos = mysql_query($sql_Direitos);
			while($direitos=mysql_fetch_array($query_Direitos))
				{
					if($direitos['drDireito']!=null || $direitos['drDireito']!='')
					{
						//<Direitos>
						$this->_marc->add_field('540','  ','a',$this->retiraEnter($direitos['drDireito']));
					}
				}
			*/
			
			
			//Campo 008
			if($campo_008!=null) {
				$this->_marc->add_field('008','  ',$campo_008);
			}
			
			// Campo 245
			if($subfield_245!=null){
				$this->_marc->add_field('245','  ',$subfield_245);
			}
			
			$temp.=$this->_marc->get_fullrecord();

		}
		return $temp;
	}
		
}
//}}}

?>
