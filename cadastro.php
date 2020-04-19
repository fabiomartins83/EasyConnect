<?php 
// $nick = $_POST['nick'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = SHA1(MD5($_POST['senha']));
$confsenha = SHA1(MD5($_POST['confirmasenha']));
$cpf = $_POST['cpf'];
$nasc = $_POST['nasc'];
$tel = $_POST['telefone'];
$endereco = $_POST['endereco'];
$numend = $_POST['numend'];
$cidade = $_POST['cid'];
$cep = $_POST['cep'];

$con = mysqli_connect('localhost','root','', 'bdCentral');
$db = mysqli_select_db($con,"bdCentral");
$query_select = "SELECT EmailUser FROM tbUsuariosPf WHERE EmailUser = '$email'";
$select = mysqli_query($con,$query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['email']; //corrigir erro nesta linha

if (($nome == "" || $nome == null) || ($email == "" || $email == null) || ($senha == "" || $senha == null) || ($confsenha == "" || $confsenha == null) || ($cpf == "" || $cpf == null) || ($nasc == "" || $nasc == null) || ($tel == "" || $tel == null) || ($endereco == "" || $endereco == null) || ($cidade == "" || $cidade == null) || ($cep == "" || $cep == null)) {
	echo"<script language='javascript' type='text/javascript'>alert('Insira as informações solicitadas no formulário.');window.location.href='cadastro.html';</script>";
} else {
	if ($senha == $confsenha) {	
		if($logarray == $email){
			echo"<script language='javascript' type='text/javascript'>alert('E-mail já cadastrado.');window.location.href='cadastro.html';</script>";
			die();
		} else {
			$query = "INSERT INTO tbUsuariosPf (NomeLoginUser, NomeCompletoUser, CpfUser, DataNascUser, EmailUser, TelefoneUser, EnderecoUser, NumEnderecoUser, CidadeUser, CepUser, SenhaUser) VALUES ('$email','$nome','$cpf','$nasc','$email','$tel','$endereco','$numend','$cidade','$cep','$senha');";
			$insert = mysqli_query($con,$query);
         
			if($insert){
				echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso.');window.location.href='logout.php'</script>";
			} else {
				echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário.');window.location.href='cadastro.html'</script>";
			}
		}
    } else {
		echo"<script language='javascript' type='text/javascript'>alert('Confirmação de senha não corresponde à senha digitada.');window.location.href='cadastro.html';</script>";
		die();
	}
}
?>