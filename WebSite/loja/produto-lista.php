<?php include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");?>

<?php if(isset($_SESSION["success"])){?>
    <p class="alert-success"><?= $_SESSION["success"]?></p>
<?php 
    unset($_SESSION["success"]);
}?>


<?php
if(array_key_exists("alterado", $_GET) && $_GET["alterado"]=="true"){
    ?>
    <p class="alert-success">Produto alterado com sucesso!</p>
    <?php
}
?>

<table class="table table-striped table-bordered"><br><br><br>
<?php
$produtos = listaProdutos($conexao); //mostra produtos no banco de dados
foreach($produtos as $produto) { //mostra produtos no banco de dados
?>
    <tr>
        
        <td><?= $produto['nome'] ?></td>
        <td>R$<?= $produto['preco'] ?></td>
        <td><?= substr($produto['descricao'], 0, 40) ?></td>
        <td><?= $produto['categoria_nome'] ?></td>
        <td>
            <a class="btn btn-primary" href="produto-altera-formulario.php?id=<?= $produto['id'] ?>" method="post">
            alterar</a>
        </td>
        <td>
            <form action="remove-produto.php" method="get">
            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
            <button class="btn btn-danger">remover</button>
            </form>
         </td>          
    </tr>    

    <?php  
  }   
    ?>
</table>

<?php include("rodape.php");?>
