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
  <title>Alteração de Dados</title>
</head>

<body>
  <?php
  // receber o id do usuário a ser alterado e montar o formulário
  $id = $_GET['id_usuario'];

  // procure os dados no banco
  // conectar ao banco
  include '../model/connect.php';

  // select no banco para recuperar os dados do usuário
  $sql = "SELECT * FROM usuario WHERE id=$id ";

  // executar a query
  $result = $conn->query($sql); // orientado a objetos utilizando obj $result

  // montar o formulário
  // enquanto o fetch array possui registros ele retorna TRUE e quando ele termina, retorna FALSE


  if ($linha = $result->fetch_array()) {
    $id = $linha['id'];
    $nome = $linha[1];
    $email = $linha[2];
    $sexo = $linha[3];
    $telefone = $linha[4];
    $nascimento = $linha[6];
    $tipo = $linha[7];
    $img = $linha[8];
  }

  ?>

  <div class="container">
    <div class="pt-2">
      <div class="card bg-ligth">
        <div class="card-header bg-warning text-white">
          <h1>Alterar Dados do Usuário</h1>
        </div>
        <div class="card-body">
          <form method="post" action="atualizarusuario.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                <label for="inputNome" class="form-label">Nome</label>
                <input type="text" name="nome" id="inputNome" class="form-control" required value="<?= isset($nome) ? $nome : '' ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" name="email" id="inputEmail" class="form-control" required value="<?= isset($email) ? $email : '' ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="inputTelefone" class="form-label">Telefone</label>
                <input type="tel" name="telefone" id="inputTelefone" class="form-control" required value="<?= isset($telefone) ? $telefone : '' ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="inputSenha" class="form-label">Senha</label>
                <input type="password" name="senha" id="inputSenha" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="inputSexo" class="form-label">Sexo</label>
                <select name="sexo" id="inputSexo" class="form-select" aria-label="Default select example" required>
                  <option selected></option>
                  <option value="M" <?= $sexo == 'M' ? 'selected' : '' ?>>Masculino</option>
                  <option value="F" <?= $sexo == 'F' ? 'selected' : '' ?>>Feminino</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="inputData" class="form-label">Data de Nascimento</label>
                <input type="date" name="dtnasc" id="inputData" class="form-control" required value="<?= isset($nascimento) ? $nascimento : '' ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="inputType" class="form-label">Tipo</label>
                <select name="tipo" id="inputType" class="form-select" aria-label="Default select example" required>
                  <option selected></option>
                  <option value="1" <?= $sexo == '1' ? 'selected' : '' ?>>Administrador</option>
                  <option value="2" <?= $sexo == '2' ? 'selected' : '' ?>>Usuário</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="formFile" class="form-label">Avatar</label>
                <input type="file" name="avatar" id="formFile" class="form-control">
              </div>
              <div class="col-md-2 py-3">
              <button type="submit" class="btn bg-warning text-white">Atualizar</button>
              </div>
              <div class="col-md-2 py-3">
                <button type="reset" class="btn bg-warning text-white" value="Limpar">Limpar</button>
              </div>
              <div class="col-md-2 py-3">
                <a href="../view/exibirusuarios.php" class="btn bg-warning text-white">Listar</a>
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