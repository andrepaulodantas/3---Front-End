<?php

function listaCategorias($conexao) { // Função para listar as categorias
    $categorias = array(); // Cria um array vazio 
    $query = "select * from categorias"; // Query para listar as categorias  
    $resultado = mysqli_query($conexao, $query); // Executa a query 
    while ($categoria = mysqli_fetch_assoc($resultado)) { // Enquanto houver registros 
        array_push($categorias, $categoria); // Adiciona o registro no array
    }
    return $categorias; // Retorna o array
}