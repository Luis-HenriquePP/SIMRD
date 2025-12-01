<?php
  session_start();
  require_once '../php/connect.php';

  $sql = "SELECT * FROM Secretarias ORDER BY idSecretarias DESC";
  $result = $pdo -> query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Secretarias - Admin</title>

<link href="../bootstrap/CSS/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../bootstrap/CSS/bootstrap-icons.css">
<script src="../bootstrap/JS/bootstrap.bundle.min.js"></script>
<script src="../bootstrap/JS/jquery.min.js"></script>
<link rel="stylesheet" href="../assets/css/lista_secretarias.css">
</head>
<body>
<div id="overlay" onclick="closeMobileSidebar()"></div>
<button id="mobile-toggle" onclick="toggleSidebar()">
 <i><img src="../assets/img/menu.png"></i>
</button>
<div id="sidebar">
    <div>
      <button class="toggle-btn" onclick="toggleSidebar()">
        <img class="logo" src="../assets/img/SIMRD.png" alt="SIMRD">
      </button>

      <ul class="nav flex-column">
        <li><a href="../html/dashboard_admin.php"><img src="../assets/img/dashboard.png" style="width: 25px;" alt=""> <span class="label-text">Dashboard</span></a></li>
        <li><a href="../html/lista_secretarias.php"><img src="../assets/img/secretaria.png" style="width: 25px;" alt=""> <span class="label-text">Secretaria</span></a></li>
        <li><a href="../html/lista_escolas_admin.php"><img src="../assets/img/escola.png" style="width: 25px;" alt=""> <span class="label-text">Escola</span></a></li>
        <li><a href="../html/lista_relatorios_admin.html"><img src="../assets/img/relatorio.png" style="width: 25px;" alt=""> <span class="label-text">Relatórios</span></a></li>
      </ul>
    </div>

    <ul class="nav flex-column bottom-nav">
      <li><a href="../php/logout.php"><img src="../assets/img/logout.png" class="sair" style="width:25px;" alt=""> <span class="label-text">Sair</span></a></li>
    </ul>
  </div>
<main id="main">
 <h2>Secretarias</h2>
 <br>
 <hr><br>
 <table class="table table-striped table-bordered" id="workTable">
   <thead class=" table-success">
     <tr class="tr">
       <th class="th">Nome</th>
       <th class="th1">Município</th>
       <th class="th">Acesso</th>
     </tr>
   </thead>
   <br>
   <tdoby>
    <?php 
    while($sec_data = $result -> fetch(PDO::FETCH_ASSOC)){
      echo '<tr>';
      echo '<td>' . $sec_data['usuario'] . '</td>';
      echo '<td>' . $sec_data['municipio'] . '</td>';
      echo '<td>' . $sec_data['senha'] . '</td>';
    }
    ?>
   </tdoby>
 </table>
 </main>
</body>
</html>