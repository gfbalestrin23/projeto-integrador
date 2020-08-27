<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Cadastro de produtos</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="row pt-4">
      <div class="col-sm-12 col-md-6 col-lg-6">
        <h2>Lista de produtos</h2>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 text-right">
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">Cadastro de produtos</button>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Cadastro de produtos</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                <form action="actions.php" method="POST" class="was-validated" enctype="multipart/form-data">
                  <input type="hidden" name="acao" value="cadastrar">
                  <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome do produto" name="nome" required />
                  </div>
                  <div class="form-group">
                    <label for="preco">Preço (R$):</label>
                    <input type="number" min="1" step="any" class="form-control" id="preco" placeholder="00,00" name="preco" required />
                  </div>
                  <div class="form-group">
                    <label for="">Imagem do produto:</label>
                    <input type="file" name="imagem" />
                  </div>
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nome</th>
          <th>Imagem</th>
          <th>Preço</th>
          <th class="text-center">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once("conexao.php");
        $query = $conn->prepare("SELECT * FROM atv9_produtos");
        $query->execute();
        if ($query->rowCount() > 0) {
          $resposta = $query->fetchAll(PDO::FETCH_OBJ);
          foreach ($resposta as $indice => $produto) {
            echo '<tr>';
            echo '<td>' . $produto->id_produto . '</td>';
            echo '<td>' . $produto->nome . '</td>';
            echo '<td>';
            echo '<img src="' . $produto->imagem . '" alt="" />';
            echo '</td>';
            echo '<td>R$ ' . $produto->preco . '</td>';
            echo '<td class="text-center">';
            echo '<a href="editar.html" title="Editar"><i class="fa fa-pencil"></i></a>';
            echo '<a href="excluir.html" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a>';
            echo '</td>';
            echo '</tr>';
          }
        }

        ?>

      </tbody>
    </table>
  </div>
</body>

</html>