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
  <link rel="stylesheet" href="../assets/css/dashboard_admin.css">
</head>
<body>

<div id="sidebar" style="background-color: #4C8F5A;">

  <div>
    <button class="toggle-btn" onclick="toggleSidebar()">
      <img src="../assets/img/SIMRD.png" alt="SIMRD" style="width:90px;">
    </button>

    <ul class="nav flex-column">
      <li><a href="#"><img src="../assets/img/dashboard.png" style="width: 25px;" alt=""> <span class="label-text">Dashboard</span></a></li>
      <li><a href="#"><img src="../assets/img/secretaria.png" style="width: 25px;" alt=""> <span class="label-text">Secretaria</span></a></li>
      <li><a href="#"><img src="../assets/img/escola.png" style="width: 25px;" alt=""> <span class="label-text">Escola</span></a></li>
      <li><a href="#"><img src="../assets/img/relatorio.png" style="width: 25px;" alt=""> <span class="label-text">Relatórios</span></a></li>
    </ul>
  </div>

  <ul class="nav flex-column bottom-nav">
    <li><a href="#"><img src="../assets/img/logout.png" class="sair" style="width:25px;" alt=""> <span class="label-text">Sair</span></a></li>
  </ul>
</div>

<main id="main">
    <div class="container-fluid">
      <h2>Dashboard Admin</h2>
      
      <div class="row mb-4 mt-4 top-buttons">
        <div class="col justify-content-center d-flex gap-2">
          <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#CadastrarEscolaModal">Cadastrar Escola</button>
          <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#CadastrarSecretariaModal">Cadastrar Secretaria</button>
        </div>
      </div>
      <div class="modal fade" id="CadastrarSecretariaModal" tabindex="-1" aria-labelledby="CadastrarSecretariaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="CadastrarSecretariaModalLabel">Cadastrar Secretaria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="secretariaNome" class="form-label">Nome da Instituição</label>
                                <input type="text" class="form-control" id="secretariaName" required>
                            </div>
                            <div class="mb-3">
                                <label for="secretariaMunicípio" class="form-label">Município</label>
                                <select class="form-select" id="secretariaMunicipio" required>
                                    <option value="">Selecione o Município</option>
                                    <option value="1">Canindé</option>
                                    <option value="2">Caridade</option>
                                    <option value="3">General Sampaio</option>
                                    <option value="4">Itatira</option>
                                    <option value="5">Paramoti</option>
                                    <option value="6">Santa Quitéria</option>
                                </select>
                            </div>
                            <div class="mb-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="CadastrarEscolaModal" tabindex="-1" aria-labelledby="CadastrarEscolaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CadastrarEscolaModalLabel">Cadastrar Escola</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../php/Cadescola.php">
                    <div class="mb-2">
                        <label for="escolaName" class="form-label">Nome da Instituição</label>
                        <input type="text" class="form-control" id="escolaName" required name="nome">
                    </div>
                    <div class="mb-2">
                        <label for="escolaInep" class="form-label">INEP</label>
                        <input type="text" class="form-control" id="escolaInep" required name="inep">
                    </div>
                    <div class="mb-3">
                        <label for="escolaMunicipio" class="form-label">Município</label>
                        <select class="form-select" id="escolaMunicipio" required name="municipio">
                            <option value="">Selecione o Município</option>
                            <option value="1">Canindé</option>
                            <option value="2">Caridade</option>
                            <option value="3">General Sampaio</option>
                            <option value="4">Itatira</option>
                            <option value="5">Paramoti</option>
                            <option value="6">Santa Quitéria</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="escolaLocalidade" class="form-label">Localidade</label>
                        <select class="form-select" id="escolaLocalidade" required name="localidade">
                            <option value="">Selecione a Localidade</option>
                            <option value="1">Urbana</option>
                            <option value="2">Rural</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" value="Enviar">
                </form>
            </div>
        </div>
    </div>
  </div>


<div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
  <div class="col-sm-4">
    <div class="card h-100 shadow-lg text-center border-0" style="border-radius: 18px;">
      <div class="card-body p-4">
        <h5 class="card-title fw-bold mb-3"> Pendente </h5>
        <div class="display-4 mb-2 fw-bold text-warning"> 0 </div>
        <p class="card-text text-muted">Planejamentos Pendentes</p>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card h-100 shadow-lg text-center border-0" style="border-radius: 18px;">
      <div class="card-body p-4">
        <h5 class="card-title fw-bold mb-3"> Em Execução </h5>
        <div class="display-4 mb-2 fw-bold text-primary"> 20 </div>
        <p class="card-text text-muted">Planejamentos em Execução</p>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card h-100 shadow-lg text-center border-0" style="border-radius: 18px;">
      <div class="card-body p-4">
        <h5 class="card-title fw-bold mb-3"> Concluídos</h5>
        <div class="display-4 mb-2 fw-bold text-success">0</div>
        <p class="card-text text-muted">Planejamentos Concluídos</p>
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
                <th>Secretaria</th>
                <th>Município</th>
                <th>Escola</th>
                <th>Plano</th>
                <th>Responsável</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Secretaria Municipal da Educação</td>
                <td>Caridade</td>
                <td>EEF Carmozina Bittencourt de Pinho</td>
                <td>Para suprir a carência em operações matemá...</td>
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
