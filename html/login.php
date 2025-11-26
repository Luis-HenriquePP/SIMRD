<?php
$tipo = $_GET['tipo'] ?? '';

$nomenclatura = [
    "crede"      => "Crede",
    "secretaria" => "Secretaria",
    "escola"     => "Escola"
];

$icone = [
    "crede"      => "../assets/img/admin.png",
    "secretaria" => "../assets/img/secretaria.png",
    "escola"     => "../assets/img/escola.png"
];

if (!isset($nomenclatura[$tipo])) {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIMRD - Login</title>

  <!-- Seus CSS originais -->
  <link rel="stylesheet" href="../assets/css/login_sec.css">
  <link rel="stylesheet" href="../bootstrap/CSS/bootstrap.min.css">

  <script src="../bootstrap/JS/bootstrap.bundle.min.js"></script>
</head>
<body>

  <nav class="navbar bg-body-tertiary">
    <div class="d-flex">
      <a class="navbar-brand" href="#">
        <div id="corpo-img">
          <img src="../assets/img/SMRD.png" id="img-simrd">
        </div>
      </a>
    </div>
  </nav>

  <div class="container d-flex justify-content-center align-items-center">
    <div class="container-fluid" id="login-box" style="width:50%">
      
      <h1 id="tit" style="font-weight: bold;">
        <?= $nomenclatura[$tipo] ?>
      </h1>

      <div class="row d-flex justify-content-center align-items-center">
        <form method="POST" action="../php/autenticar.php">

          <!-- Identifica o tipo ao PHP -->
          <input type="hidden" name="tipo" value="<?= $tipo ?>">

          <div class="text-center mb-3">
            <img src="<?= $icone[$tipo] ?>" class="card-foto" style="width:90px;">
          </div>

          <div class="form-group">
            <label>Usuário:</label><br>
            <input class="form-control-md" type="text" name="usuario" required placeholder="Digite seu usuário">
          </div>

          <br>

          <div class="form-group">
            <label>Senha:</label><br>
            <input class="form-control-md" type="password" name="senha" required placeholder="Digite sua senha">
          </div>

          <br>

          <button class="btn btn-success" type="submit">Entrar</button>

        </form>
      </div>

      <img src="../assets/img/crede7.png" style="width: 120px;">
    </div>
  </div>

</body>
</html>
