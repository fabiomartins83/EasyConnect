//verifica se o browser tem suporte a AJAX
var request = null;

function criarRequest() {
	try { 
		request = new XMLHttpRequest();
	} catch (tryIE) {
		try {
			request = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (otherIE) {
			try {
				request = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (falha) {
				request = null;
			}
		}
	}
}

function enviarRequisicao(str, url) {
	if (str.length == 0) {
		document.getElementById("sugestao").innerHTML = "";
		return;
	} else {
		criarRequest();
		request.open("GET", url + "?q=" + str, true);
		request.send(null);
		request.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("sugestao").innerHTML = this.responseText;
			} else if (request.onreadystatechange.readyState == 1) {
				document.getElementById("sugestao").innerHTML = "Carregando..."
			}
		} ;
	}
}