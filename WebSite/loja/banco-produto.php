<?php

function listaProdutos($conexao) { //busca produtos no banco de dados
    $produtos = array(); //novo array
    $resultado = mysqli_query($conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");//busca produtos no banco de dados 
    while($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto); //joga o produto no array
    }
    return $produtos; //retorna o array
}

function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado) { // insere produto no banco de dados
        $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})"; //query 
        return mysqli_query($conexao, $query); //retorna o resultado da query 
}

function removeProduto($conexao, $id) { // remove produto do banco de dados
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) { // busca produto no banco de dados 
    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado) { // altera produto no banco de dados 
    $query = "update produtos SET nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria_id}, usado = {$usado} where id = {$id}";
    return mysqli_query($conexao, $query);
}
