<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMRD</title>
  <link href="../bootstrap/CSS/bootstrap.min.css" rel="stylesheet">
  <script src="../bootstrap/JS/bootstrap.bundle.min.js"></script>
  <link href="../bootstrap/CSS/bootstrap-icons.css" rel="stylesheet">
  <script src="../bootstrap/JS/jquery.min.js"></script>
  <link rel="stylesheet" href="../assets/css/dashboard_escola.css">

</head>

<body>

<div id="sidebar" style="background-color: #4C8F5A;">

  <div>
    <button class="toggle-btn" onclick="toggleSidebar()">
      <img src="../assets/img/SIMRD.png" alt="SIMRD" style="width:90px;">
    </button>

    <ul class="nav flex-column">
      <li><a href="#"><img src="../assets/img/dashboard.png" style="width: 25px;" alt=""> <span class="label-text">Dashboard</span></a></li>
      <li><a href="#"><img src="../assets/img/report.png" style="width: 25px;" alt=""> <span class="label-text">Planos</span></a></li>
      <li><a href="#"><img src="../assets/img/relatorio.png" style="width: 25px;" alt=""> <span class="label-text">Relatórios</span></a></li>
    </ul>
  </div>

  <ul class="nav flex-column bottom-nav">
    <li><a href="#"><img src="../assets/img/logout.png" class="sair" style="width:25px;" alt=""> <span class="label-text">Sair</span></a></li>
  </ul>
</div>

<main id="main">
    <div class="container-fluid">
      <h2>Dashboard Escola</h2>

      <div class="row mb-4 mt-4 top-buttons">
        <div class="col justify-content-center d-flex gap-2">
          <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#CadastrarPlanoModal">Cadastrar Plano</button>
        </div>
      </div>
      <div class="modal fade" id="CadastrarPlanoModal" tabindex="-1" aria-labelledby="CadastrarPlanoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CadastrarPlanoModalLabel">Cadastrar Plano</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="AvaliaçãoFormativa" class="form-label">Avaliação Formativa</label>
                            <select name="AvaliaçãoFormativa" id="AvaliaçãoFormativa" class="form-select" aria-label="Selecione a Avaliação Formativa">
                                <option value="">Selecione a Avaliação Formativa</option>
                                <option value="1">CNCA</option>
                                <option value="2">Avalie CE</option>
                                <option value="3">Pacto de Recomposição</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="Componente" class="form-label">Componente</label>
                            <select class="form-select" id="Componente" required>
                                <option value="">Selecione o Componente</option>
                                <option value="1">Língua Portuguesa</option>
                                <option value="2">Matemática</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="Ciclo" class="form-label">Ciclo</label>
                            <select class="form-select" id="Ciclo" required>
                                <option value="">Selecione o Ciclo</option>
                                <option value="1">Ciclo I</option>
                                <option value="2">Ciclo II</option>
                                <option value="3">Ciclo III</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="Responsavel" class="form-label">Responsável</label>
                        <input type="text" class="form-control" id="Responsavel" placeholder="Digite o responsável" required>
                    </div>
                    <div class="mt-4">
                        <h6 class="mb-2">Métricas de Desempenho</h6>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Avaliação Formativa</th>
                                        <th>Série</th>
                                        <th>Qtd Alunos Previstos</th>
                                        <th>Qtd Alunos Avaliados</th>
                                        <th>(%) Alunos Defasagem</th>
                                        <th>Qtd Alunos Defasagem</th>
                                        <th>Meta (%) de Redução de Defasagem</th>
                                        <th>Meta de Redução da Defasagem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="AvaliaçãoFormativa" id="" class="form-select">
                                                <option value=""></option>
                                                <option value="1">CNCA</option>
                                                <option value="2">Avalie CE</option>
                                                <option value="3">Pacto de Recomposição</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="Série" id="" class="form-select">
                                                <option value=""></option>
                                                <option value="1">1º Ano</option>
                                                <option value="2">2º Ano</option>
                                                <option value="3">3º Ano</option>
                                                <option value="4">4º Ano</option>
                                                <option value="5">5º Ano</option>
                                                <option value="6">6º Ano</option>
                                                <option value="7">7º Ano</option>
                                                <option value="8">8º Ano</option>
                                                <option value="9">9º Ano</option>
                                            </select>
                                        </td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h6 class="mb-2">Habilidades Críticas</h6>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Avaliação Formativa</th>
                                        <th>Série</th>
                                        <th>Habilidades Críticas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td>#</td>
                                        <td><input type="text" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-4 mb-3">
                        <h6 class="mb-2">Plano de Ação</h6>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Avaliação Formativa</th>
                                        <th>Série</th>
                                        <th>Plano</th>
                                        <th>Data de Inicio</th>
                                        <th>Data de Término</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td>#</td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="date" class="form-control"></td>
                                        <td><input type="date" class="form-control"></td>
                                        <td>
                                            <select name="Status" id="" class="form-select">
                                                <option value="">Selecione o Status</option>
                                                <option value="1">Não Realizado</option>
                                                <option value="2">Planejado</option>
                                                <option value="3">Replanejado</option>
                                                <option value="4">Realizado no Prazo</option>
                                                <option value="5">Realizado com Atraso</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" form="seuFormularioID">Enviar</button>
            </div>
        </div>
    </div>
</div>
      
      


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
                <th>Plano</th>
                <th>Componente</th>
                <th>Responsável</th>
                <th>Data de Inicio</th>
              </tr>
            </thead>
            <tbody>
              <tr>
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
                <th>Plano</th>
                <th>Componente</th>
                <th>Responsável</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Realizada</td>
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