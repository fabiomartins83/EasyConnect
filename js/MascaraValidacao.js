function validaNome(camponome) {
	nomecompleto = camponome.value;
	if (nomecompleto.search(" ") == -1) {
		alert("Insira o sobrenome.");
		camponome.value = null;
	} else {
		primnome = camponome.value.substring(0, camponome.value.indexOf(" "));
		sobrenome = camponome.value.substring(camponome.value.indexOf(" ")+1, camponome.value.length);
		if ((primnome.length < 2) || (sobrenome.length < 2)) {
			alert("Nome inválido.");
			camponome.value = null;
		}
	}
}

function validaEmail(campoemail) {
	usuario = campoemail.value.substring(0, campoemail.value.indexOf("@"));
	dominio = campoemail.value.substring(campoemail.value.indexOf("@")+1, campoemail.value.length);
	if ((usuario.length < 1) || (dominio.length < 3) || (usuario.search("@") != -1) || (dominio.search("@") != -1) || (usuario.search(" ") != -1) || (dominio.search(" ") != -1) || (dominio.search(".") == -1) || (dominio.indexOf(".") < 1) || (dominio.lastIndexOf(".") > dominio.length - 1)) {
		alert("E-mail inválido. ");
		campoemail.value = null;
		document.getElementById(campoemail).focus();
	}
}

function MascaraCNPJ(cnpj) {
	if (mascaraInteiro(cnpj)==false) {
		event.returnValue = false;
	}
	return formataCampo(cnpj, '00.000.000/0000-00', event);
}

function MascaraData(data) {
	if (mascaraInteiro(data)==false){
		event.returnValue = false;
	} 
	return formataCampo(data, '00/00/0000', event);
}

function MascaraTelefone(tel) {
	if (mascaraInteiro(tel)==false) {
		event.returnValue = false;
	}
	return formataCampo(tel, '(00) 0000-0000', event);
}

function MascaraCPF(cpf) {
	if (mascaraInteiro(cpf)==false) {
		event.returnValue = false;
	}
	return formataCampo(cpf, '000.000.000-00', event);
}

function ValidaSenha() {
	var s = document.getElementById("senha1").value;
	var c = document.getElementById("senha2").value;
	if (s != c) {
		alert("As senhas não conferem.");
		document.getElementById("senha1").value = null;
		document.getElementById("senha2").value = null;
		document.getElementById("senha1").focus();
	}
}

function ValidaTelefone(tel) {
	exp = /\(\d{2}\)\ \d{4}\-\d{4}/
	if (!exp.test(tel.value))
		alert('Numero de telefone incorreto. Insira novamente.');
}

function ValidaData(data) {
	exp = /\d{2}\/\d{2}\/\d{4}/
	if (!exp.test(data.value))
		alert('Data incorreta. Insira novamente.');
}

function ValidaCPF(Objcpf) {
	var cpf = Objcpf.value;
	exp = /\.|\-/g
	cpf = cpf.toString().replace(exp, "" ); 
	var digitoDigitado = eval(cpf.charAt(9) + cpf.charAt(10));
	var soma1 =0 , soma2 = 0;
	var vlr = 11;
	for (i = 0; i < 9; i++) {
		soma1+=eval(cpf.charAt(i) * (vlr - 1));
		soma2+=eval(cpf.charAt(i) * vlr);
		vlr--;
	}
	soma1 = (((soma1 * 10) % 11) == 10 ? 0:((soma1 * 10) % 11));
	soma2 = (((soma2 + (2 * soma1)) * 10) % 11);
	var digitoGerado = (soma1 * 10) + soma2;
	if (digitoGerado != digitoDigitado) {
		alert('CPF incorreto. Insira novamente.');
		Objcpf.value = null;
		return false;
	}
}

function mascaraInteiro() {
	if (event.keyCode < 48 || event.keyCode > 57) {
		event.returnValue = false;
		return false;
	}
	return true;
}

function ValidaCNPJ(ObjCnpj) {
	var cnpj = ObjCnpj.value;
	var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
	var dig1= new Number;
	var dig2= new Number;
	exp = /\.|\-|\//g
	cnpj = cnpj.toString().replace( exp, "" ); 
	var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));
	for(i = 0; i < valida.length; i++){
		dig1 += (i > 0? (cnpj.charAt(i - 1) * valida[i]) : 0); 
		dig2 += cnpj.charAt(i) * valida[i]; 
	}
	dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
	dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));
	if(((dig1 * 10) + dig2) != digito) 
		alert('CNPJ incorreto. Insira novamente.');
}

//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) { 
        var boleanoMascara; 
        var Digitato = evento.keyCode;
        exp = /\-|\.|\/|\(|\)| /g
        campoSoNumeros = campo.value.toString().replace( exp, "" ); 

        var posicaoCampo = 0;    
        var NovoValorCampo="";
        var TamanhoMascara = campoSoNumeros.length;; 

        if (Digitato != 8) { // backspace 
                for(i=0; i<= TamanhoMascara; i++) { 
                        boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                                || (Mascara.charAt(i) == "/")) 
                        boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                                                                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
                        if (boleanoMascara) { 
                                NovoValorCampo += Mascara.charAt(i); 
                                  TamanhoMascara++;
                        }else { 
                                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                                posicaoCampo++; 
                          }              
                  }      
                campo.value = NovoValorCampo;
                  return true; 
        }else { 
                return true; 
        }
}

function LimpaFormulario() {
	$("#formcadastro").each (function() {
		this.reset();
	});
	document.getElementById("nome").focus();
}

function MascaraCep(cep) {
	if (mascaraInteiro(cep)==false) {
		event.returnValue = false;
	}
	return formataCampo(cep, '00000-000', event);
}

function ValidaCep(numcep){
	exp = /\d{5}\-\d{3}/
	//alert("Teste1");
	if(!exp.test(numcep.value)) {
		alert('CEP incorreto. Insira novamente.')
	} else {
			var cep = numcep.value.replace(/[^0-9]/, "");
			if(cep.length != 8){
				alert("CEP incorreto. Insira novamente.");
				return false;
			}
			var url = "https://viacep.com.br/ws/"+cep+"/json/";
			alert("Enviando CEP para "+url);
			$.getJSON(url, function(dadosRetorno){
				try{
					$("#logradouro").val(dadosRetorno.logradouro);
					$("#bairro").val(dadosRetorno.bairro);
					$("#cidade").val(dadosRetorno.localidade);
					$("#uf").val(dadosRetorno.uf);
				}catch(ex){
					alert("Não foi possível verificar endereço através do CEP.");
				}
			});
	}
}