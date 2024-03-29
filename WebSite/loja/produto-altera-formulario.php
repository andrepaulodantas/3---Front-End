<?php include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");
include("banco-produto.php");

$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
$categorias = listaCategorias($conexao);
$usado = $produto['usado'] ? "checked='checked'" : "";

    $categorias = listaCategorias($conexao);
    ?>

    <h1>Alterando produto</h1>
      <form action="altera-produto.php" method="post">
        <input type="hidden" name="id" value="<?=$produto['id']?>">
          <table class="table">
                <tr>
                    <td>Nome</td>
                    <td><input class="form-control" type="text" name="nome" value="<?=$produto['nome']?>"></td>
                </tr>
                <tr>
                    <td>Preço</td>
                    <td><input class="form-control" type="number" name="preco" value="<?=$produto['preco']?>"></td>
                </tr>
                <tr>
                    <td>Descrição</td>
                    <td><textarea class="form-control" name="descricao"><?=$produto['descricao']?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" name="usado" <?=$usado?> value="true">Usado</td>
                </tr>
                    <td>Categoria</td>
                    <td>
                        <select class="form-control" name="categoria_id">
                            <?php foreach($categorias as $categoria) : 
                               $essaCategoria = $produto['categoria_id'] == $categoria['id'];
                               $selecao = $essaCategoria ? "selected='selected'" : "";  
                            ?>                              
                                <option value="<?=$categoria['id']?>" <?=$selecao?>>
                                    <?=$categoria['nome']?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    <!-- <td>
                            <?php foreach($categorias as $categoria) : ?> 
                                <input type="radio" name="categoria_id" 
                                    value="<?=$categoria['id']?>">
                                    <?=$categoria['nome']?><br /> 
                            <?php endforeach ?>
                    </td> -->
                </tr>
                <tr>
                    <td><button class="btn btn-primary" type="submit">Alterar</button></td>
                </tr>
            </table>
       </form>

<?php include("rodape.php")?>