<?php

use PhpMyAdmin\Config\Validator;

require_once('db.class.php');

	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);
	$cpf = $_POST['cpf'];

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$usuario_existe = false;
	$email_existe = false;
	$cpf_existe = false;

	//if(strlen($email) < 8 || substr_count($email, "0") != || substr_count($email, ".") == 0)
    //	echo "O e-mail digitado é inválido! ";
	
	$email = filter_var($email, FILTER_SANITIZE_EMAIL); //elimina informações erradas
	$email = str_replace(" ", "", $email);
	$email = str_replace("/", "", $email);
	$email = str_replace("@.", "@", $email);
	$email = str_replace(".@", "@", $email);
	$email = str_replace(",", ".", $email);
	$email = str_replace(";", ".", $email);

	function cpf_errado($cpf){
		$erro = false;
		$aux_cpf = "";
		$digito = "";
		for ($j = 0; $j < strlen($cpf); $j++)
		 if (substr($cpf, $j, 1) >= "0" AND substr($cpf, $j, 1) <= "9")
			$aux_cpf .= substr($cpf, $j, 1);
		if (strlen($aux_cpf) != 11)
			$erro = true;
		else {
			$cpf1 = $aux_cpf;
			$cpf2 = substr($cpf, -2);
			$controle = "";
			$start = 2;
			$end = 10;
		for ($i = 1; $i <= 2; $i++){
			$soma = 0;
			for ($j = $start; $j <= $end; $j++)
				$soma += substr($cpf1, ($j-$i-1),1) * ($end+1+$i-$j);
			if ($i == 2)
				$soma += $digito * 2;
			$digito = ($soma * 10) % 11;
			if ($digito == 10)
				$digito = 0;
			$controle .= $digito;
			$start = 3;
			$end = 11;
		}
		if ($controle != $cpf2)
			$erro = true;
		}
		 return $erro;
	}
	
	//verificar se o usuário já existe
	$sql = " select * from usuarios where usuario = '$usuario' ";
	if($resultado_id = mysqli_query($link, $sql)){

		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['usuario'])){
			$usuario_existe = true;
		}
		
	}else {
		echo 'Erro ao tentar localizar o registro de usuário';
	}

	//VERIFICAR SE O E-MAIL JÁ EXISTE
	$sql = " select * from usuarios where email = '$email' ";
	if($resultado_id = mysqli_query($link, $sql)){

		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['email'])){
			$email_existe = true;
		}
		
	}else {
		echo 'Erro ao tentar localizar o registro de email';
	}

	//VERIFICAR SE O CPF JÁ EXISTE
	$sql = " select * from usuarios where cpf = '$cpf' ";
	if($resultado_id = mysqli_query($link, $sql)){

		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['cpf'])){
			$cpf_existe = true;
		}
		
	}else {
		echo 'Erro ao tentar localizar o registro de cpf';
	}

	if($usuario_existe || $email_existe || $cpf_existe){

		$retorno_get = '';

		if($usuario_existe){
			$retorno_get.= "erro_usuario=1&";
		}

		if($email_existe){
			$retorno_get.= "erro_email=1&";
		}
		
		if($cpf_existe){
			$retorno_get.= "erro_cpf=1&";
		}

		header("Location: inscrevase.php?".$retorno_get); //força o rediciona a pagina e depois da ? é tudo parametros
		die();
	}

	$sql = " insert into usuarios(usuario, email, senha, cpf) values ('$usuario', '$email', '$senha', $cpf) ";

	//if (strlen($estado) < 2 )
	//	echo "O estado deve possuir 2 caracteres.";
	//elseif (strlen($senha) < 5)
	//	echo "A senha deve possuir pelo menos 5 caracteres.";
	//$password = "teste teste";
	//	if(strstr ($password, " ") != FALSE){
	//			echo('A senha não pode conter espaços em branco');
	//} 

	//executar a query
	if(mysqli_query($link, $sql)){
		echo 'Usuário registrado com sucesso!';
	} else {
		echo 'Erro ao registrar o usuário!';
	}


?>