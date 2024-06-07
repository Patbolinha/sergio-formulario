<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-4">Sistema 2 c!</h1>
                <p class="lead">sistema desenvolvido pelos alunos de informática</p>
                <hr class="my-4">
    <?php
    include ("conexao.php");
    $id = $_POST["id"];
    $nome = $_POST['nome'];

    $sql= "DELETE FROM usuario WHERE id = $id";

    if($conexao=mysqli_query($conexao, $sql)){
        echo"Deletado com sucesso";
    }
    else{
        echo"erro ao cadastra-se".mysqli_connect_error($conexao);
    }
    ?>
              
                <div class="jumbotron">
  
  <p>EEEP PAULO BARBOSA LEITE</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="cadastro.php" role="button">cadastre-se</a>
    <a class="btn btn-primary btn-lg" href="pesquisa.php" role="button">pesquisar</a>
  </p>
</div>
               
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>