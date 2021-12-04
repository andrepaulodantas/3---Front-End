<?php include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");
include("logica-usuario.php");

verificaUsuario();

    $categorias = listaCategorias($conexao);
    ?>

<div class="d-grid gap-2 col-6 mx-auto"><br><br><br>
    <button class="btn btn-danger" type="button"><h1>Necessidades e Valores</h1></button>
</div>    
      <form action="adiciona-produto.php" method="post">
          <table class="table">
                <tr>
                    <td>Nome</td>
                    <td><input class="form-control" type="text" name="nome"></td>
                </tr>
                <tr>
                    <td>Preço</td>
                    <td><input class="form-control" type="number" name="preco"></td>
                </tr>
                <tr>
                    <td>Descrição</td>
                    <td><textarea class="form-control" name="descricao"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" name="usado" value="true">Usado</td>
                </tr>
                    <td>Categoria</td>
                    <td>
                        <select class="form-control" name="categoria_id">
                            <?php foreach($categorias as $categoria) : ?>
                                <option value="<?=$categoria['id']?>">
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
                    <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
                </tr>
            </table>
       </form>

<?php include("rodape.php")?>