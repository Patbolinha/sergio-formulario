<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <?php
  $pesquisa = $_POST['busca'] ?? '';
  include "conexao.php";
  $sql = "SELECT * FROM usuario where nome LIKE '%$pesquisa%'";
  $dados = mysqli_query($conexao, $sql);
  ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Não pesquisa</h1>
        <nav class="navbar navbar-light bg-light">
          <form class="form-inline" method="POST" action="pesquisa.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Não digite aqui" aria-label="Search" name="busca">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisa</button>
          </form>
        </nav>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Açoes</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($linha =  mysqli_fetch_assoc($dados)) {
              $id = $linha['id'];
              $nome = $linha['nome'];
              $email = $linha['email'];

              echo "<tr>
      <td>$id</td>
      <td>$nome</td>
      <td>$email</td>

      <td width= 150px><a href='editar.php? id=$id' class='btn btn-success btn-sm'>Editar</a>
                <a href='#' class='btn btn-danger btn-sm' data-tOggle='modal' data-target='#confirma'
                onclick=".'"'."pegar_dados($id, '$nome')".'"'.">Excluir</a>
                 </td>
    
      </tr>";
            }
            ?>

          </tbody>

        </table>
      </div>
    </div>
  </div>
              <div class="modal fade" id="confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">CONFIRMAR EXCLUSÃO</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form  action="excluir.php" method="post">
                      <p>Tem certeza que deseja excluir o cadastro de <b id="nome_pessoa">   </b>?</p>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                      <input type="hidden" name="nome" id="nome_pessoa1" value="">
                      <input type="hidden" name="id" id="cod_pessoa" value="">
                      <input type="submit" class="btn btn-primary" value="Sim">
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <script>
                function pegar_dados(id,nome){
                  document.getElementById("nome_pessoa").innerHTML = nome;
                  document.getElementById("nome_pessoa1").value = nome;
                  document.getElementById("cod_pessoa").value = id;
                }
                </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>