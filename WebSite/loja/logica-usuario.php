<?php

session_start();

function usuarioEstaLogado() {
    return isset($_SESSION["usuario_logado"]);
}

function verificaUsuario() {
    if(!usuarioEstaLogado()) {
        $_SESSION["danger"] = "Você não tem acesso a esta funcionalidade.";
        header("Location: index.php");
        die();
    }
}

function usuarioLogado() {
    return $_SESSION["usuario_logado"];
}

function logaUsuario($email) {
    $_SESSION["usuario_logado"] = $email;
    //setcookie("usuario_logado", $email, time() + 60 * 60 * 24 * 7);
}

function logout() {
    session_destroy();
    session_start();
    //setcookie("usuario_logado", "", time() - 3600);
}