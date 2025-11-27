<?php 
  session_start();
  require_once '../php/connect.php';

  $sql = "SELECT * FROM Tarefa ORDER BY idTarefa DESC";
  $result = $pdo-> query($sql);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tarefas - Escola</title>

<link href="../bootstrap/CSS/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../bootstrap/CSS/bootstrap-icons.css">
<script src="../bootstrap/JS/bootstrap.bundle.min.js"></script>
<script src="../bootstrap/JS/jquery.min.js"></script>
<link rel="stylesheet" href="../assets/css/lista_tarefa.css">
</head>
<body>
<div id="overlay" onclick="closeMobileSidebar()"></div>
<button id="mobile-toggle" onclick="toggleSidebar()">
 <i><img src="../assets/img/menu.png"></i>
</button>
<div id="sidebar">

 <div>
   <button class="toggle-btn" onclick="toggleSidebar()">
     <img src="../assets/img/SIMRD.png" alt="SACC" style="width:90px;">
     <span class="brand-text"></span>
   </button>
   <ul class="nav flex-column">
    <li><a href=""><i><img src="" class="dashboard"></i> <span class="label-text">Dashboard</span></a></li>
     <li><a href=""><i><img src="" class="tarefas"></i> <span class="label-text">Tarefas</span></a></li>
     <li><a href=""><i><img src="" class="relatorio"></i> <span class="label-text">Relatórios</span></a></li>
    </ul>
  </div>
  <ul class="nav flex-column bottom-nav">
    <li><a href=""><img src="" class="sair"> <span class="label-text">Sair</span></a></li>
  </ul>
</div>
<main id="main">
 <h2>Tarefas</h2>
 <br>
 <hr><br>

   <div class="button">
    <form>
      <input type="text" placeholder="Pesquisar trabalho">
      <button type="submit">Pesquisar</button>
    </form>
   </div>

 <table class="table table-striped table-bordered" id="workTable">
   <thead class=" table-success">
     <tr class="tr">
       <th class="th1">Tarefa</th>
       <th class="th2">Série</th>
       <th class="th3">Componente</th>
       <th class="th2">Data inicial</th>
       <th class="th3">Responsável</th>
       <th class="th2">Status</th>
     </tr>
   </thead>
   <br>
   <tbody>
    <?php 
    while($tarefa_data = $result -> fetch(PDO::FETCH_ASSOC)){
      echo '<tr>';
      echo '<td>' . $tarefa_data['nome'] ?? '' . '</td>';
      echo '<td>' . $tarefa_data['serie'] ?? '' . '</td>';
      echo '<td>' . $tarefa_data['componente'] ?? '' . '</td>';
      echo '<td>' . $tarefa_data['data_inicial'] ?? '' . '</td>';
      echo '<td>' . $tarefa_data['responsavel'] ?? '' . '</td>';
      echo '<td>' . $tarefa_data['status'] ?? '' . '</td>';
    }
    ?>    
   </tbody>
 </table>
 </main>
</body>
</html>