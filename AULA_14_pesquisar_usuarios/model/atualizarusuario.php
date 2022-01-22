<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>Cadrasto de Usuário</title>
</head>

<body>
  <?php

  //Processo de atualização
  include "connect.php"; //Criando a conexão com o banco de dados

  //Recuperar dado por GET
  $id = $_GET['id_usuario'];

  // Testando a conexão
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "UPDATE FROM usuario WHERE id='$id'";

  if ($conn->query($sql) === TRUE) {
    require_once "../view/formulario.php";
  } else {
    echo "Erro ao atualizar dados do usuário" . $conn->error;
  }

  $conn->close();
  ?>

  <div class="container">
    <div class="pt-2">
      <div class="card bg-ligth">
        <div class="card-header bg-warning text-white">
          <h1>Alterar dados do usuário</h1>
        </div>
        <div class="card-body">
          <form method="post" action="../model/cadastrarUsuario.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                <label for="inputNome" class="form-label">Nome</label>
                <input type="text" name="nome" id="inputNome" class="form-control" placeholder="ex:Beltrano da Silva " required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="email@example.com" required>
              </div>
              <div class="col-md-6">
                <label for="inputSenha" class="col-sm-4 col-form-label">Senha</label>
                <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="Password" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="inputSexo" class="form-label">Sexo</label>
                <select name="sexo" id="inputSexo" class="form-select" aria-label="Default select example" required>
                  <option selected></option>
                  <option value="M">Masculino</option>
                  <option value="F">Feminino</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="inputData" class="form-label">Data de Nascimento</label>
                <input type="date" name="dtnasc" id="inputData" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="inputType" class="form-label">Tipo</label>
                <select name="tipo" id="inputType" class="form-select" aria-label="Default select example" required>
                  <option selected></option>
                  <option value="1">Administrador</option>
                  <option value="2">Usuário</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="inputTelefone" class="form-label">Telefone</label>
                <input type="tel" name="telefone" id="inputTelefone" class="form-control" placeholder="(00) 0000-0000" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="formFile" class="form-label">Avatar</label>
                <input type="file" name="avatar" id="formFile" class="form-control">
              </div>
              <div class="row g-3">
                <div class="col-md">
                  <button type="submit" class="btn bg-warning text-white ">Cadastrar</button>
                </div>
                <div class="col-md">
                  <a href="exibirusuarios.php" class="btn bg-warning text-white float-end ">Listar</a>
                </div>
                <div class="col-md">
                  <a href="pesquisarusuarios.php" class="btn bg-warning text-white float-end">Pesquisar</a>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="card-footer  bg-warning text-white">
          Autora: Julyane Pereira Hengler
        </div>
      </div>
    </div>
  </div>
</body>

</html>