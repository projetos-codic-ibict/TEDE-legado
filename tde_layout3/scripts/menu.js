<!-- //
/*
DHTML by Ramón Fonseca
Desenvolvimento Web
IBICT - Instituto Brasileiro de Informação em Ciência e Tecnologia
contato:
ramon@ibict.br
alt: ramonsodoma@hotmail.com
Tels.:IBICT
+55 61 217 6443
+55 61 217 6347

Tel.:Res
+55 61 367 0018

Sistema em PHP e Projeto de Banco de Dados
by Márcio Henrique dos Santos Rosa
Desenvolvimento Web
IBICT - Instituto Brasileiro de Informação em Ciência e Tecnologia
contato:
marcio@ibict.br
alt: marciohsr@brturbo.com
Tels.:IBICT
+55 61 99913045
+55 61 217 6443
+55 61 217 6347
*/
/* a detecção de browser não está sendo utilizada no momento por não funcionar em outros navegadores ainda
// DETECÇÃO DE NAVEGADOR
// JavaScript Document
var browserName=navigator.appName;
var browserVersion=parseInt(navigator.appVersion);
var agt=navigator.userAgent.toLowerCase();

var comeco='<table bgcolor="#FFFFFF" border="1" bordercolor="#CCCCCC" width="400" height="220" align="center" cellpadding="3" cellspacing="0"><tr><td class="txt" align="left" valign="top"><font face="Verdana" color="#000000" size="2">';
var txtP='<br />Voc&ecirc; est&aacute; usando:<br /><font color="#FF0000"><b>'+browserName+'&nbsp;inferior &agrave; vers&atilde;o 5</b></font><br />';
var warningP='Por favor atualize seu Navegador de Internet!<br />';
var txtE='<br />You are using:<br /><font color="#FF0000"><b>'+browserName+'&nbsp;inferior to version 5</b></font><br />';
var warningE='Please update your internet browser software!<br />';
var final='</font></td></tr></table>';
var message;
var browser;

function browserDetect () {
	if (agt.indexOf("mozilla")){
			browser="mozilla"; // Netscape 6
		alert(browser);
	}else if (browserName=="Netscape" && browserVersion >=5) {
		browser="nn6UP"; // Netscape 6
		alert(browser);
	}else if (browserName=="Mozilla" && browserVersion >=5) {
		browser="mozilla5UP"; //mozilla
		alert(browser);
	}else if (browserName=="Netscape" && browserVersion==4) {
		browser="nn4UP"; // Navigator 4 
		alert(browser);                                     
	}else if (browserName=="Microsoft Internet Explorer" && browserVersion >=4 && navigator.appVersion.indexOf("MSIE 6.0") !=-1) {
		browser="ie6UP"; // IE 6.0
		alert(browser);	
	}else if (browserName=="Microsoft Internet Explorer" && browserVersion >=4 && navigator.appVersion.indexOf("MSIE 5.5") !=-1) {
		browser="ie55UP"; // IE 5.5
		alert(browser);
	}else if (browserName=="Microsoft Internet Explorer" && browserVersion >=4 && navigator.appVersion.indexOf("MSIE 5.0") !=-1) {
		browser="ie5UP"; // IE 5.0
		alert(browser);
	}else if (browserName=="Microsoft Internet Explorer" && browserVersion >=4) {
		browser="ie4UP"; // IE 4
		alert(browser);
	}else if (browserName=="Microsoft Internet Explorer" && browserVersion < 4) {
		browser="ie3UP"; // IE 3
		alert(browser);
	}

	if (browser=="ie3UP" || browser=="nn4UP" || browser=="mozilla5UP"){
		message=comeco + txtP + warningP + txtE + warningE +final;
		popUp(message);
	 }	 
}

function popUp (w){
	w=message;
	document.write(w);
}
*/

// MENUS SISTEMA TDE
/*
as funções a seguir dão o feedback para o usuário sobre a seção que deseja visitar. No mouseover, altera-se
a imagem através do uso de arrays de imagens e no mouseout altera-se a página a carregar, também usando um
array de endereçamento. A barra superior possui 2 imagens que devem ser alternadas no mouseover:
menuSep, menuTile (2 imagens para cada seção - caso o layout seja alterado estas imagens devem ser alteradas, porém o nome deve ser mantido, para facilitar a manutenção.)
*/
// declaração de variáveis globais
var y;
var x;
var myUrl='/opt/eprints/html/tede/'; // alterar para endereço físico da máquina para posterior atualização do código
var dir = 'tde_layout3/';
// array de separadores dos menus
var mySeparator=new Array ("imagens/menuSep.gif","imagens/menuSep_busca.gif","imagens/menuSep_aluno.gif","imagens/menuSep_pos.gif","imagens/menuSep_biblio.gif","imagens/menuSep_admin.gif","imagens/menuSep_contato.gif");
//array de barras de menu (identificação de seção, para feedback ao usuário)
var myMenubar=new Array ("imagens/menuTile.gif","imagens/menuTile_busca.gif","imagens/menuTile_aluno.gif","imagens/menuTile_pos.gif","imagens/menuTile_biblio.gif","imagens/menuTile_admin.gif","imagens/menuTile_contato.gif");
//array de endereçamento
var myLocations=new Array ("index.php","tde_busca/index.php","tde_aluno/login.php","tde_pos/login.php","tde_biblioteca/login.php","tde_admin/login.php","tde_admin/contato.php");

function changeMenu (x,y) {
	window.location.replace(y+myLocations[x]);
}

function overMenu (x,y) {
	document.menuSep.src=y+dir+mySeparator[x]; //alterar para início (página inicial do pacote)
	document.menuBar.src=y+dir+myMenubar[x]; //alterar separador do menu para o original
}

function aviso(strng){
	returnMessage(erro00);
}
/* ################ Script Geral para Validação de Formulário #####################
Este conjunto de funções visa verificar, através de javascript e css, campos de formulários HTML para 
validação
nome dos estilos de css usados:
.req 
.failed 
.optional

adaptado de vários scripts retirados da web, customizados para uso específico
Desenvolvimento: Ramón Fonseca
ramonsodoma@hotmail.com
*/

//############# FUNÇÕES ################//
/*
function Numero(campo)
validação de campo numérico apenas
*/
//inicio de Numero(campo)
function Numero(campo){
	var sMask='01234567890';
	var KeyTyped=String.fromCharCode(window.event.keyCode);
	var srcObject=window.event.srcElement;
	if (sMask.indexOf(KeyTyped.toString())==-1){
		window.event.keyCode=0;
		_ret=false;
	} 
}
//fim de Numero(campo)	
/*
verificação de campo numérico
*/
// inicio checkNumero
function checkNumero (strng) {
	if (strng=='') {	
		returnMessage(erro02);
		return false;
	}else{
		return true;
	}
}
// fim de checkCNPJ
/*
function checkEmail (strng)
Validação de string de email
esta função valida o string do email, para ver se o conteúdo está correto
*/
//inicio de checkEmail
function checkEmail (strng) {
	var emailFilter=/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/;
    var illegalChars=/(^[\?\!\#\$\%\¨\*\\(\)\+\=\@\"\&\.\-\_])|(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)|(.*#.*)|(.*\.)*($[0-9]+)/;
	if (strng=='') {
		return false;
	}else if (!emailFilter.test(strng)) { 
		returnMessage(erro03);
		return false;
	}else if (strng.match(illegalChars)) {
		returnMessage(erro04);
		return false;
	}else{
		return true;
	}
}
// fim de checkEmail
/*
function CNPJ(campo)
Internet Explorer apenas
Formata a string recebida de acordo com uma máscara de CNPJ
pode ser customizada para qualquer máscara numérica (data, telefone, cpf, identidade, etc)
porém, só funciona no IE4+
*/
// inicio de CNPJ
function CNPJ(campo){
	var sMask='01234567890';
	var KeyTyped=String.fromCharCode(window.event.keyCode);
	var srcObject=window.event.srcElement;
	if (sMask.indexOf(KeyTyped.toString())==-1){
		window.event.keyCode=0;
		_ret=false;
	} 
	/* 
	* The variable "frigger" is used because the friggen DOM 
	*does not does not expose lenght via window.event.srcElement.length
	*/
	//frigger=document.getElementById(window.event.srcElement.id);
	frigger=campo;
	keyCount=frigger.value.length;
	var tmpStr='';
	keyEntered=KeyTyped;
	keyCount++;
	switch (keyCount){
		case 1: 
			tmpStr +=srcObject.value;
			srcObject.value=tmpStr;	   
 			break;
		case 3:
			srcObject.value +='.';
			break;
		case 7:
			srcObject.value +='.';
		break;
		case 11:
			srcObject.value +='/';
		break;
	 	case 16:
			srcObject.value +='-';
		break;
	}
}
// fim de CNPJ
/*
function checkCNPJ
função para verificação de conteúdo do campo CNPJ, alertando o usuário e aplicando estilo específico
para feedback do usuário.
*/
// inicio checkCNPJ
function checkCNPJ (strng) {
	if (strng=='') {	
		returnMessage(erro05);
		return false;
	}	
	var stripped=strng.replace(/[\.\/\-\ ]/g, ''); //strip out acceptable non-numeric characters
	if (isNaN(parseInt(stripped))) {	
		returnMessage(erro06);
	 	return false;
	} 
	if (!(stripped.length=='14')) {
		returnMessage(erro07);
		return false;
	} else {
		return true;
	}
}
// fim de checkCNPJ

/*
function CPF(campo)
Internet Explorer apenas
Formata a string recebida de acordo com uma máscara de CPF
porém, só funciona no IE4+
*/
// inicio de CPF
function CPF(campo){
	var sMask='01234567890';
	var KeyTyped=String.fromCharCode(window.event.keyCode);
	var srcObject=window.event.srcElement;
	if (sMask.indexOf(KeyTyped.toString())==-1){
		window.event.keyCode=0;
		_ret=false;
	} 
	/* 
	* The variable "frigger" is used because the friggen DOM 
	*does not does not expose lenght via window.event.srcElement.length
	*/
	//frigger=document.getElementById(window.event.srcElement.id);
	frigger=campo;
	keyCount=frigger.value.length;
	var tmpStr='';
	keyEntered=KeyTyped;
	keyCount++;
	switch (keyCount){
		case 1: 
			tmpStr +=srcObject.value;
			srcObject.value=tmpStr;	   
 			break;
		case 4:
			srcObject.value +='.';
			break;
		case 8:
			srcObject.value +='.';
		break;
		case 12:
			srcObject.value +='-';
		break;
	}
}
// fim de CPF
// inicio checkCNPJ
function checkCPF (strng) {
	if (strng=='') {	
		returnMessage(erro09);
		return false;
	}	
	var stripped=strng.replace(/[\.\/\-\ ]/g, ''); //strip out acceptable non-numeric characters
	if (isNaN(parseInt(stripped))) {	
		returnMessage(erro10);
	 	return false;
	} 
	if (!(stripped.length=='11')) {
		returnMessage(erro11);
		return false;
	} else {
		return true;
	}
}
// fim de checkCNPJ

/*
function checkRequired(frmData)
função que verifica pelo nome do estilo aplicado se o campo é obrigatório ou não
se for e estiver vazio aplica o estilo 'failed' para destacar o campo
*/
// início de checkRequired
function checkRequired(frmData) {
var bFail=false; // variavel com valor padrao para retorno
//for loop para passar pos todos os elementos do formulario
for(iElement=0; iElement < frmData.elements.length; iElement++) {
var constant = frmData.elements[iElement];
	//if para testar elementos com estilos especificos e campos vazios (input de texto)
	if(constant.className=='req' || constant.className=='failed')
	 {		
	 	if(constant.value=='') {
			bFail=true;
			constant.className='failed';
		} else {
			constant.className='req';
		}
	} 
	//if para testar se input de texto tem estilo email
	if (constant.className=='email' || constant.className=='emailFailed'){
	  	if (!checkEmail(constant.value)) {
			bFail=true;
			constant.className='emailFailed';
		} else {
			constant.className='email';
		}
	}
	//if para testar se input de texto tem estilo cnpj
	if (constant.className=='cnpj' || constant.className=='cnpjFailed'){
	  	if (!checkCNPJ(constant.value)) {
			bFail=true;
			constant.className='cnpjFailed';
		} else {
			constant.className='cnpj';
		}
	}
	//if para testar se input de texto tem estilo cnpj
	if (constant.className=='cpf' || constant.className=='cpfFailed'){
	  	if (!checkCPF(constant.value)) {
			bFail=true;
			constant.className='cpfFailed';
		} else {
			constant.className='cpf';
		}
	}
	//if para testar se input de texto tem estilo numero
	if (constant.className=='numero' || constant.className=='numeroFailed'){
	  	if (!checkNumero(constant.value)) {
			bFail=true;
			constant.className='numeroFailed';
		} else {
			constant.className='numero';
		}
	}
	//if para testar se ha elemento select no formulario
	if (constant.className=='select' || constant.className=='selectFailed'){
		if (constant.options.selectedIndex==0 && (constant.options.value=='' || constant.options.value==null)){
			bFail=true;
			constant.className='selectFailed';
			returnMessage(erro08);
		} else {
			constant.className='select';
		}
	}
	
	//os if´s a seguir verificam itens opcionais
	//if para testar elementos opcionais
	if (constant.className=='optionalCPF' || constant.className=='optionalCPFfailed' || constant.className=='radio'){
		if (!checkOptional(frmData,constant)){
			bFail=true;
		}
	}

}
return !bFail;
} 
// fim de checkRequired

/*
function checkForm(formName)
função geral de validação de formulário, através da qual são chamadas as outras sub-funções de validação
específica
pode ser necessário customizá-la para atender as suas necessidades, porém o objetivo é usar css e javascript
para criar uma validação geral, ou seja, se houver algum campo com o estilo definido como obrigatório, 
então será verificado.
*/
//inicio de checkForm
function checkForm(formName) {
  if(!checkRequired(document.forms[formName])) {
    if(!document.all) {
      returnMessage(erro01);
   	  return false;
	  } else {
      returnMessage(erro01);
	  return false;
    }
  } else {
	document.forms[formName].submit();	
  }
} 
//fim de checkForm

//Mensagens de Erro
// função returnMessage() : função que recebe os valores de array, chama a função errorMessages externa 
// e retorna as mensagens
// inicio de  getMessage(strng)
function returnMessage(strng){
	if (strng){
		errorMessage(strng);
		alert (strng);
	}else{
		return false;
		alert ('erro fatal');
		alert (strng);
	}
}
// fim de getMessage(strng)

//function optional(formName)
/*
função para verificação de campos opcionais antes de enviar o formulário
*/
function checkOptional(f,c){
var Fail=false; // variavel com valor padrao para retorno
//for loop para passar pos todos os elementos do formulario
for (i=0;i<f.elements.length;i++){
	d=f.elements[i];
	if (c.type=='text' && d.type=='checkbox'){
		if (c.value=='' && d.checked==false){
			Fail=true;
			returnMessage(erro12);
			c.className='optionalCPFfailed';
		}else if (c.value!=''){
			d.checked=false;
			if(!checkCPF(c.value)){
				Fail=true;
				c.className='optionalCPFfailed';
			}else{
				Fail=false;
			}
		}
	}
}
return !Fail;
}
//function optional (f,c,d)
/*
chamada quando o campo é alterado na página
esta função verifica
- campos CPF para contribuidor (editar_contribuidores.php e inserir_contribuidores.php
- campo de texto e select ()
*/
function optional (f,c,d){
if(c.type=='text' && d.type=='checkbox'){
	 if (c.value!='' && d.checked==false){
	 d.checked=false;
	 c.className='optionalCPF';
	 }
	 if (c.value=='' && d.checked==true){
	  d.checked=true;
	  c.className='optionalCPFfailed';
	 }
}

if (c.type=='checkbox'){
	if (c.checked==true){
		d.value='';
		d.className='optionalCPF';
		c.className='radio';
	}
	if (c.checked==false){
		if (d.value==''){
			d.className='optionalCPFfailed';
			c.className='radio';
		}else{
			d.className='optionalCPF';
			c.className='radio';
		}
	}
}

if (c.type=='textarea' && d.type=='select'){
	if (c.value!=''){
		c.className='req';
		d.className = 'select';	
	}
	if (c.value==''){
		c.className='failed';
		d.className = 'selectFailed';	
	}
}

}

// fim do documento
//-->
