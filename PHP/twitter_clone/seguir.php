<?php

session_start(); //para executar variáveis de sessão

//nível de controle
	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}

require_once('db.class.php');


$id_usuario = $_SESSION['id_usuario'];
$seguir_id_usuario = $_POST['seguir_id_usuario'];

if($id_usuario == '' || $seguir_id_usuario == ''){
  die();
}

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = " INSERT INTO usuarios_seguidores(id_usuario, seguindo_id_usuario)values($id_usuario, $seguir_id_usuario) "; //como são tipo inteiros, não precisa usar '' duplas

    mysqli_query($link, $sql);


?>