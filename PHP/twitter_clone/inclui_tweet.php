<?php

session_start(); //para executar variáveis de sessão

//nível de controle
	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}

require_once('db.class.php');

$texto_tweet = $_POST['texto_tweet'];
$id_usuario = $_SESSION['id_usuario'];


//if($texto_tweet == '' || $id_usuario == ''){
//  die();
//}

if($texto_tweet != '' && $id_usuario != ''){

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = " INSERT INTO tweet(id_usuario, tweet)values($id_usuario, '$texto_tweet') ";

    mysqli_query($link, $sql);

}
 


?>