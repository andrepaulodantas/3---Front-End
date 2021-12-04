<?php include("cabecalho.php");
include("logica-usuario.php");?>
         
<br><br><br>
          <h1> Bem vindo! Olá André e Juliana Araújo </h1>
          <br>  
    <?php if(usuarioEstaLogado()){?>
        <p class="alert-success">Você está logado como <?= usuarioLogado()?></p>
        <a href="logout.php">Deslogar</a>
    <?php }else{?>

         <h2>login</h2>
         <form action="login.php" method="post">
         <table class="table">
             <tr>
                 <td>Email</td>
                    <td><input type="email" name="email" class="form-control"></td>
            </tr>
            <tr>
                <td>Senha</td>
                <td><input type="password" name="senha" class="form-control"></td>
            </tr>
            <tr>
                <td><button class="btn btn-primary">Login</button></td>
            </tr>
            </table>
            </form>
           <!--  <h2>Cadastro</h2>
            <table class="table">
                <tr>
                    <td>
                        <form action="cadastro.php" method="post">
                            <label>Nome:</label>
                            <input type="text" name="nome" class="form-control">
                            <label>Email:</label>
                            <input type="text" name="email" class="form-control">
                            <label>Senha:</label>
                            <input type="password" name="senha" class="form-control">
                            <input type="submit" value="Cadastrar" class="btn btn-primary">
                        </form>
                    </td>
                </tr>
            </table>
        </form> -->
<?php }?>
<?php include("rodape.php")?>



