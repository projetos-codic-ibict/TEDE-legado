<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><!-- InstanceBegin template="/Templates/tde_admin_menu.dwt" codeOutsideHTMLIsLocked="false" --> 
<?
require "../bibliotecas/diretorio_layout.inc";
require "../bibliotecas/urlibictbdtd.bib";
require "../bibliotecas/idioma_sistema.bib";
require "../bibliotecas/logos.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
?>
<head> 
<!-- InstanceBeginEditable name="doctitle" --> 
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | ADMINISTRA&Ccedil;&Atilde;O | Vsiualiza&ccedil;&atilde;o da Institui&ccedil;&atilde;o do Sistema</title>
<!-- InstanceEndEditable --> 
<link href="<? echo $diretorio_layout; ?>estilos/estilo_geral.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_validacao.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_admin.css" rel="stylesheet" type="text/css">
<script language="JavaScript1.2" type="text/javascript" src="<? echo $diretorio_layout; ?>scripts/menu.js"></script>
<?
$script='<script language="JavaScript" src="../tde_i18n/mensagens_js_'.$idioma_sistema.'.js"></script>';
echo $script;
?>
<!-- InstanceBeginEditable name="head" --> <!-- InstanceEndEditable -->
<meta name="Pragma" content="no-cache">
<meta name="Cache-Control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="Expires" content="Mon, 06 Jan 1990 00:00:01 GMT">
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table width="100%" height="100%"  border="0" align="left" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="80" align="left" valign="top"><table width="100%" height="80"  border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="80" align="center" valign="top" class="subMenuAdmin"><table width="100%" height="20"  border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="139" height="20" align="left" valign="top"><a href="<? echo $link; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/logo_inst.jpg" alt="<? echo $texto; ?>" name="logoInst" width="139" height="60" hspace="0" vspace="0" border="0" id="logoInst"></a><img src="<? echo $diretorio_layout; ?>imagens/subMenuarr.gif" width="139" height="20" hspace="0" vspace="0" border="0"></td>
              </tr>
          </table></td>
          <td width="32" height="80" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="68" class="menuAdmin"><img src="<? echo $diretorio_layout; ?>imagens/menuSep_admin.gif" name="menuSep" width="62" height="68" hspace="0" vspace="0" border="0" id="menuSep"></td>
            </tr>
            <tr>
              <td class="tdConteudo">&nbsp;</td>
            </tr>
          </table></td>
          <td width="100%" height="80" align="left" valign="top"><table width="100%" height="78"  border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="44" align="left" valign="top"><table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" class="tituloSistemaInterno">
                    <tr> 
                      <td align="center" valign="middle"> 
                        <? echo $txSPETD_T; ?>
                        <span class="tituloPos"> | 
                        <? echo $txAdministracao_T; ?>
                        |</span></td>
                      <td width="25" height="44" align="left" valign="top" class="menuAdmin"><img src="<? echo $diretorio_layout; ?>imagens/titleSep.gif" width="25" height="44" hspace="0" vspace="0" border="0"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="34" align="center" valign="top"><table width="100%" height="24" border="0" align="left" cellpadding="0" cellspacing="0" class="menuAdmin">
                    <tr> 
                      <td height="15" align="center" valign="middle">| <a href="javascript:changeMenu(0,'../');" target="_self" class="menu" onMouseOver="javascript:overMenu(0,'../');" onMouseOut="javascript:overMenu(5,'../');"> 
                        <? echo $txInicio_T; ?> </a> | <a href="javascript:changeMenu(1,'../');" class="menu" onMouseOver="javascript:overMenu(1,'../');" onMouseOut="javascript:overMenu(5,'../');"> 
                        <? echo $txBusca_T; ?> </a> | <a href="javascript:changeMenu(2,'../');" class="menu" onMouseOver="javascript:overMenu(2,'../');" onMouseOut="javascript:overMenu(5,'../');"> 
                        </a><a href="javascript:changeMenu(4,'../');" class="menu" onMouseOver="javascript:overMenu(4,'../');" onMouseOut="javascript:overMenu(5,'../');"> 
                        <? echo $txBiblioteca_T; ?> </a> | <a href="javascript:changeMenu(5,'../');" class="menu" onMouseOver="javascript:overMenu(5,'../');" onMouseOut="javascript:overMenu(5,'../');"> 
                        <? echo $txAdministracao_T; ?> </a> | <a href="javascript:changeMenu(6,'../');" class="menu" onMouseOver="javascript:overMenu(6,'../');" onMouseOut="javascript:overMenu(5,'../');"> 
                        <? echo $txContato_T; ?> </a> |</td>
                    </tr>
                    <tr> 
                      <td height="9" align="left" valign="top"><img src="<? echo $diretorio_layout; ?>imagens/menuTile_admin.gif" name="menuBar" width="100%" height="9" hspace="0" vspace="0" border="0" id="menuBar"></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="100%" align="left" valign="top"><!-- InstanceBeginEditable name="Conteudo da Pagina" --><? session_start();
if(!session_is_registered("VAdmin_cnCod")) {
header("Location: ../index.php");
}else{
?>
      <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="139" height="100%" valign="top" class="subMenuAdmin"> 
            <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="txt">
              <tr> 
                <td class="td"><span class="txtBold">&raquo; Exportador DSPACE</span></td>
              </tr>
              <tr> 
			  <!-- esta TD precisa ser reestruturada para poder inserir o link -->
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='exportar.php'">
                 
                  <a href="exportar.php" class="linkpreto">&raquo; Exportar</a></td>
              </tr>
              
              <tr> 
                <td class="subMenuOver" onClick="location='tela_export.php'"><a href="tela_export.php" class="linkpreto">&raquo; <? echo $txVisualizar; ?></a></td>
              </tr>
              <tr> 
                <td class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='tde_admin.php'"><a href="../tde_admin/tde_admin.php" class="linkpreto">&laquo; <? echo $txMenuPrincipal; ?></a></td>
              </tr>
              <tr> 
                <td height="15" class="td">&nbsp;</td>
              </tr>
              <tr> 
                 <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../tde_ajuda/ajuda.php"  class="linkpreto" target="_blank">&raquo; 
                  <? echo $txAjuda2; ?></a></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
          </table> </td>
          <td height="100%" valign="top" class="tdConteudo"> 
           
            <div>
			<table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
              <tr> 
                <td width="90%">
                
                <table width="100%" border="0" >
               <?php if ($_GET["e"]=="") {?>     
  <tr  align="center" class="tdAdmin">
    <td class="txtBold"><span class="txtBold">Esse módulo tem como objetivo exportar toda a base de dados PUBLICADA para o DSPACE. Esse procedimento pode ser demorado, podendo durar minutos ou até horas. <br />
	Caso necessite pode-se aplicar filtros para exportação de TEDs  específicos. 
	Se você realmente deseja continuar, aguarde até o sistema informar o resultado da exportação. 
	<!--Para continuar <a href="exportar.php?e=sim"> clique aqui</a>! --></span></td>
  </tr>

	<tr>
<td><span class="style1"> <span class="loginTableTitle">Exportar TDEs Publicadas</span><strong><br><br>
             Filtros</strong><br>
          </span>
		  
            <table width="100%" border="0" class="txt">
              <tr>
                <td><form name="form_exportacao" method="get" action="exportar.php" target="">
                <input type="hidden" id="e" name="e" value="sim">
				<table width="100%" border="0" class="loginTable">
                  <tr>
                    <td width="14%"><strong>Programas:</strong></td>
                     
                    <td><select multiple size=10 name="programa[]" size="1" id="grau">
						<option value="Todos" selected>Todos</option>
					  <?
					   require "../conexao/conexao_fim.php";  
	  					$SEL_pr="SELECT * FROM Programa ORDER BY prNome";
	  					$SEL_pr_query=mysql_db_query($base_fim,$SEL_pr,$conexao_fim);
	 					$SEL_pr_RES=mysql_fetch_array($SEL_pr_query);
		  				while ($SEL_pr_RES!="") {
						
							$prCod=$SEL_pr_RES['prCod'];
							$prNome=$SEL_pr_RES['prNome'];
						
							$SEL_tsqtd="SELECT count(*) as qtd FROM TSPF
							INNER JOIN Teses ON Teses.tsIdentificador = TSPF.tsIdentificador
							LEFT JOIN OAIControle ON TSPF.tsIdentificador = OAIControle.tsIdentificador 
							INNER JOIN PessoaFisica ON PessoaFisica.pfCod = TSPF.pfCod
							WHERE TSPF.prCod =$prCod  AND TSPF.tspfTipo = 'Autor'  AND OAIControle.tsIdentificador IS NULL "; 
						
							$SEL_tsqtd_query=mysql_db_query($base_fim,$SEL_tsqtd,$conexao_fim);
							$SEL_tsqtd_RES=mysql_fetch_array($SEL_tsqtd_query); 
							$qtd=$SEL_tsqtd_RES['qtd'];
						
					
						  ?>
						  <option value="<? echo $prCod; ?>"><? echo $prNome . " -> ( ".$qtd." TDE(s))"; ?></option>
						  <?
						  $SEL_pr_RES=mysql_fetch_array($SEL_pr_query);
					  }
					  ?>
                    </select></td>
                  </tr>
                  <tr>
                    <td><strong><? echo $txGrau; ?>:</strong></td>
                    <td width="86%"><select name="grau" size="1" id="grau">
                      <option value="Todos"><? echo $txTodos; ?></option>
                      <option value="M"><? echo $txMestrado; ?></option>
                      <option value="D"><? echo $txDoutorado; ?></option>
                    </select>   </td>
                    </tr>
				   <tr>
                    <td><strong>Organizar os arquivos exportados:</strong></td>
                    <td width="86%">
					  <input type="radio" id="organizar" name="organizar" value="UN" checked="checked">Em uma única pasta.<br>
					  <input type="radio" id="organizar" name="organizar" value="PG">Em Programa  / Grau.<br>
					</td>
                  </tr>
				
					
				  <?
				   require "../conexao/conexao.php"; 
				   require "../conexao/funcao_erro.inc";
				  ?>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="left">
						<input type="submit" value="Exportar" class="botao">
                     </td>
                  </tr>
                </table>
                </form></td>
              </tr>
			  			
            </table>
         </td>
        </tr>

    <?php } if ($_GET["e"]=="sim") {  ?>
	
  <tr align="center" class="tdAdmin">
    <td align="center">&nbsp; Exportando... aguarde. <br>Esse procedimento pode demorar alguns minutos ou até horas. <br>
	<!--<img src="biblioteca/aguarde.gif"  alt="aguarde">-->
    <?php require "biblioteca/export.php"; ?>
    </td>
  </tr>
                </table>
               
                <table width="100%" border="0" >
                  <tr align="center" class="tdAdmin"> </tr>
  <?php } ?>
                  <?php if ($_GET[e]=="finalizado") {?>
                  <tr align="center" class="tdAdmin">
                    <td>Exportação Finalizada! <br><br>
					Relatório da exportação:<br><br>
					Quantidade de registros processados: <?php echo $_GET[qtd]; ?><br>
					Quantidade de registros exportados com sucesso: <?php echo $_GET[qtd_sucesso]; ?><br>
					Quantidade de registros exportados com erros: <?php echo $_GET[qtd2]; ?><br>
					<!--Quantidade de erro de metadados: <?php echo $_GET[qtd2]; ?><br>
					Quantidade de erro em arquivos: <?php echo $_GET[qtd3]; ?><br>
					Quantidade total de erros: <?php echo $_GET[qtd4]; ?><br><br> -->
					Para visualizar detalhes da exportação, acesse o item de menu "Visualizar" ou <a href="tela_export.php">clique aqui</a>! <?php echo $finalizado; ?></td>
                  </tr>
  <?php } ?>
                  
                </table>
                
                </td>
              </tr>
            </table></div>
            <br>
          </td>
        </tr>
      </table>
      <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="50" align="left" valign="bottom"><table width="100%" height="50"  border="0" align="left" cellpadding="0" cellspacing="0">
        <tr align="right" valign="bottom"> 
          <td width="139" nowrap class="subMenuAdmin"><table width="139" height="50"  border="0" align="right" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="139" height="33" align="right" valign="middle" class="versao"><br>
                  <? require "../bibliotecas/versao_sistema.bib"; echo $versao ?>
                  | <? echo $txCopyright; ?></td>
              </tr>
          </table></td>
          <td width="100%" valign="middle"><table width="100%" height="50"  border="0" align="right" cellpadding="0" cellspacing="0" class="bttmBar">
            <tr align="center" valign="middle">
              <td width="25%" align="center"><a href="<? echo $link2; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/logo_tede1.gif" / alt="<? echo $texto2; ?>" height="33" border="0"></a></td>
              <td width="25%" align="center"><a href="<? echo $link3; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/logo_tede2.gif" / alt="<? echo $texto3; ?>" height="33" border="0"></a></td>
              <td width="25%" align="center"><a href="<? echo $url_bdtd; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/teses_logo_tede.jpg" alt="<? echo $url_bdtd; ?>" name="bdtdLogo" border="0" id="bdtdLogo"></a></td>
              <td width="25%" align="center" valign="middle"><a href="<? echo $url_ibict; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/ibict_logo_tede.jpg" alt="<? echo $url_ibict; ?>" name="ibictLogo" border="0" id="ibictLogo"></a></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html> <?php } ?>