<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Administrativo</title>
  <link href="../bootstrap/CSS/bootstrap.min.css" rel="stylesheet">
  <script src="../bootstrap/JS/bootstrap.bundle.min.js"></script>
  <link href="../bootstrap/CSS/bootstrap-icons.css" rel="stylesheet">
  <script src="../bootstrap/JS/jquery.min.js"></script>
  <link rel="stylesheet" href="../assets/css/dashboard_sec.css">
</head>
<body>

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
    <div class="container-fluid">
      <h2>Dashboard Secretaria</h2>

<div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
    <button class="col-auto" style="background:none; border:none;" data-bs-toggle="modal" data-bs-target="#PlanosPendentesModal">
        <div class="card h-100 shadow-lg text-center border-0" style="border-radius: 18px;">
            <div class="card-body p-4">
                <h5 class="card-title fw-bold mb-3"> Pendente </h5>
                <div class="display-4 mb-2 fw-bold text-warning"> 0 </div>
                <p class="card-text text-muted">Planejamentos Pendentes</p>
            </div>
        </div>
    </button>
    <button class="col-auto" style="background:none; border:none;" data-bs-toggle="modal" data-bs-target="#PlanosEmProcessoModal">
        <div class="card h-100 shadow-lg text-center border-0" style="border-radius: 18px;">
            <div class="card-body p-4">
                <h5 class="card-title fw-bold mb-3"> Em Execução </h5>
                <div class="display-4 mb-2 fw-bold text-primary"> 20 </div>
                <p class="card-text text-muted">Planejamentos em Execução</p>
            </div>
        </div>
    </button>
    <button class="col-auto" style="background:none; border:none;" data-bs-toggle="modal" data-bs-target="#PlanosConcluidosModal">
        <div class="card h-100 shadow-lg text-center border-0" style="border-radius: 18px;">
            <div class="card-body p-4">
                <h5 class="card-title fw-bold mb-3"> Concluídos</h5>
                <div class="display-4 mb-2 fw-bold text-success">0</div>
                <p class="card-text text-muted">Planejamentos Concluídos</p>
            </div>
        </div>
    </button>
</div>

 <div class="modal fade" id="PlanosPendentesModal" tabindex="-1" aria-labelledby="PlanoPedentesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="PlanoPedentesModalLabel">Planos Pendentes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th>Escola</th>
                <th>Plano</th>
                <th>Componente</th>
                <th>Responsável</th>
                <th>Data de Inicio</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>EEF Carmozina Bittencourt de Pinho</td>
                <td>Para suprir a carência em operações matemá...</td>
                <td>Matematica</td>
                <td>Olavo de Carvalho</td>
                <td>01/01/2024</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
 </div>

 <div class="modal fade" id="PlanosEmProcessoModal" tabindex="-1" aria-labelledby="PlanoEmProcessoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="PlanoEmProcessoModalLabel">Planos Em Processo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th>Escola</th>
                <th>Plano</th>
                <th>Componente</th>
                <th>Responsável</th>
                <th>Data de Inicio</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>EEF Carmozina Bittencourt de Pinho</td>
                <td>Para suprir a carência em operações matemá...</td>
                <td>Matematica</td>
                <td>Olavo de Carvalho</td>
                <td>01/01/2024</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
 </div>

 <div class="modal fade" id="PlanosConcluidosModal" tabindex="-1" aria-labelledby="PlanoConcluidosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="PlanoConcluidosModalLabel">Planos Concluídos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th>Escola</th>
                <th>Plano</th>
                <th>Componente</th>
                <th>Responsável</th>
                <th>Data de Inicio</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>EEF Carmozina Bittencourt de Pinho</td>
                <td>Para suprir a carência em operações matemá...</td>
                <td>Matematica</td>
                <td>Olavo de Carvalho</td>
                <td>01/01/2024</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
 </div>

      <div class="ranking-box mt-4">
        <div class="d-flex justify-content-center mb-4">
            <form class="d-flex align-items-center flex-wrap gap-3">
                <select class="btn btn-secondary">
                    <option>Filtrar por Status</option>
                    <option value="1">Não Realizado</option>
                    <option value="2">Planejado</option>
                    <option value="3">Replanejado</option>
                    <option value="4">Realizado no Prazo</option>
                    <option value="5">Realizado com Atraso</option>
                </select>

                <input type="text" placeholder="Buscar Escola" class="form-control w-auto">

                <select class="btn btn-secondary">
                    <option>Filtrar por Componente</option>
                    <option value="1">Língua Portuguesa</option>
                    <option value="2">Matemática</option>
                </select>
            </form>
        </div>

        <div class="mt-3 mb-3 justify-content-end d-flex">
        <button class="btn btn-success">Filtrar</button>
        </div>
        
        <table class="table">
            <thead>
            <tr>
                <th>Status</th>
                <th>Escola</th>
                <th>Plano</th>
                <th>Componente</th>
                <th>Responsável</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Realizada</td>
                <td>EEF Carmozina Bittencourt de Pinho</td>
                <td>Para suprir a carência em operações matemá...</td>
                <td>Matematica</td>
                <td>Olavo de Carvalho</td>
            </tr>
            </tbody>
        </table>
    </div>
  </main>
  
</body>
<script>
function toggleSidebar() {
  const sidebar = document.getElementById("sidebar");
  const main = document.getElementById("main");

  if (sidebar.classList.contains("collapsed")) {
    sidebar.classList.remove("collapsed");
    main.classList.remove("collapsed");
  } else {
    sidebar.classList.add("collapsed");
    main.classList.add("collapsed");
  }
}
</script>


</html>