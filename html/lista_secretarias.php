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
<div id="sidebar" style="background-color: #4C8F5A;">
 <div>
   <button class="toggle-btn" onclick="toggleSidebar()">
     <img src="../assets/img/SIMRD.png" alt="SACC" style="width:90px;">
     <span class="brand-text"></span>
   </button>
   <ul class="nav flex-column">
    <li><a href=""><i><img src="" class="dashboard"></i> <span class="label-text">Dashboard</span></a></li>
     <li><a href=""><i><img src="" class="escola"></i> <span class="label-text">Escolas</span></a></li>
     <li><a href=""><i><img src="" class="secretaria"></i> <span class="label-text">Secretarias</span></a></li>
     <li><a href=""><i><img src="" class="relatorio"></i> <span class="label-text">Relatórios</span></a></li>
    </ul>
  </div>
  <ul class="nav flex-column bottom-nav">
    <li><a href=""><img src="" class="sair"> <span class="label-text">Sair</span></a></li>
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