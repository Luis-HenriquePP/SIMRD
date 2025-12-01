<?php
session_start();
require_once '../php/connect.php';

$sql = "SELECT * FROM Escolas ORDER BY idEscolas DESC";
$result = $pdo -> query($sql);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Escolas - Secretaria</title>

<link href="../bootstrap/CSS/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../bootstrap/CSS/bootstrap-icons.css">
<script src="../bootstrap/JS/bootstrap.bundle.min.js"></script>
<script src="../bootstrap/JS/jquery.min.js"></script>
<link rel="stylesheet" href="../assets/css/lista_escolas.css">
</head>
<body>
<div id="overlay" onclick="closeMobileSidebar()"></div>
<button id="mobile-toggle" onclick="toggleSidebar()">
 <i><img src="../assets/img/menu.png"></i>
</button>
<div id="sidebar" style="background-color: #4C8F5A;">
  <div>
    <button class="toggle-btn" onclick="toggleSidebar()">
      <img src="../assets/img/SIMRD.png" alt="SIMRD" style="width:90px;">
    </button>

    <ul class="nav flex-column">
      <li><a href="../html/dashboard_sec.php"><img src="../assets/img/dashboard.png" style="width: 25px;" alt=""> <span class="label-text">Dashboard</span></a></li>
      <li><a href="../html/lista_escolas_sec.php"><img src="../assets/img/escola.png" style="width: 25px;" alt=""> <span class="label-text">Escolas</span></a></li>
      <li><a href="../html/lista_relatorios_sec.html"><img src="../assets/img/relatorio.png" style="width: 25px;" alt=""> <span class="label-text">Relatórios</span></a></li>
    </ul>
  </div>

  <ul class="nav flex-column bottom-nav">
    <li><a href="../php/logout.php"><img src="../assets/img/logout.png" class="sair" style="width:25px;" alt=""> <span class="label-text">Sair</span></a></li>
  </ul>
</div>
<main id="main">
 <h2>Escolas</h2>
 <br>
 <hr><br>
 <table class="table table-striped table-bordered" id="workTable">
   <thead class=" table-success">
     <tr class="tr">
       <th class="th">Nome</th>
       <th class="th1">INEP</th>
       <th class="th2">Município</th>
       <th class="th2">Localidade</th>
       <th class="th1">Tarefas</th>
     </tr>
   </thead>
   <br>
   <tbody>
    <?php 
    while($escola_data = $result -> fetch(PDO::FETCH_ASSOC)){
      echo '<tr>';
      echo '<td>' . $escola_data['nome'] . '</td>';
      echo '<td>' . $escola_data['inep'] . '</td>';
      echo '<td>' . $escola_data['municipio'] . '</td>';
      echo '<td>' . $escola_data['localidade'] . '</td>';
      echo '<td>' . 'Sem tarefas cadastradas' . '</td>';
    }
     ?>
   </tbody>
 </table>

 </main>
</body>
</html>