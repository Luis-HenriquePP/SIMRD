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
  <!-- Sidebar -->
  <div id="sidebar" style="background-color: #4C8F5A;">
    <div>
      <button class="toggle-btn" onclick="toggleSidebar()">
        <img src="../assets/img/SIMRD.png" alt="SIMRD" style="width:90px;">
      </button>
      <ul class="nav flex-column">
        <li><a href="../html/dashboard_escola.php"><img src="../assets/img/dashboard.png" style="width: 25px;" alt=""> <span class="label-text">Dashboard</span></a></li>
        <li><a href="../html/lista_tarefa_esc.php"><img src="../assets/img/report.png" style="width: 25px;" alt=""> <span class="label-text">Planos</span></a></li>
        <li><a href="../html/lista_relatorios_esc.html"><img src="../assets/img/relatorio.png" style="width: 25px;" alt=""> <span class="label-text">Relatórios</span></a></li>
      </ul>
    </div>
    <ul class="nav flex-column bottom-nav">
      <li><a href="../php/logout.php"><img src="../assets/img/logout.png" class="sair" style="width:25px;" alt=""> <span class="label-text">Sair</span></a></li>
    </ul>
  </div>

  <!-- Main -->
  <main id="main">
    <div class="container-fluid">
      <h2>Dashboard Escola</h2>

      <!-- Botão Cadastrar Plano -->
      <div class="row mb-4 mt-4 top-buttons">
        <div class="col justify-content-center d-flex gap-2">
          <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#CadastrarPlanoModal">Cadastrar Plano</button>
        </div>
      </div>

      <!-- Cards de Status -->
      <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
        <button class="col-auto" style="background:none; border:none;" data-bs-toggle="modal" data-bs-target="#PlanosPendentesModal">
          <div class="card h-100 shadow-lg text-center border-0" style="border-radius: 18px;">
            <div class="card-body p-4">
              <h5 class="card-title fw-bold mb-3">Pendente</h5>
              <div class="display-4 mb-2 fw-bold text-warning">0</div>
              <p class="card-text text-muted">Planejamentos Pendentes</p>
            </div>
          </div>
        </button>
        <button class="col-auto" style="background:none; border:none;" data-bs-toggle="modal" data-bs-target="#PlanosEmProcessoModal">
          <div class="card h-100 shadow-lg text-center border-0" style="border-radius: 18px;">
            <div class="card-body p-4">
              <h5 class="card-title fw-bold mb-3">Em Execução</h5>
              <div class="display-4 mb-2 fw-bold text-primary">20</div>
              <p class="card-text text-muted">Planejamentos em Execução</p>
            </div>
          </div>
        </button>
        <button class="col-auto" style="background:none; border:none;" data-bs-toggle="modal" data-bs-target="#PlanosConcluidosModal">
          <div class="card h-100 shadow-lg text-center border-0" style="border-radius: 18px;">
            <div class="card-body p-4">
              <h5 class="card-title fw-bold mb-3">Concluídos</h5>
              <div class="display-4 mb-2 fw-bold text-success">0</div>
              <p class="card-text text-muted">Planejamentos Concluídos</p>
            </div>
          </div>
        </button>
      </div>

      <!-- Filtro e Tabela de Ranking -->
      <div class="ranking-box mt-4">
        <div class="d-flex justify-content-center mb-4">
          <form class="d-flex align-items-center flex-wrap gap-3">
            <select class="btn btn-secondary" required>
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
              <td>Matemática</td>
              <td>Olavo de Carvalho</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Modal Cadastrar Plano -->
      <div class="modal fade" id="CadastrarPlanoModal" tabindex="-1" aria-labelledby="CadastrarPlanoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="CadastrarPlanoModalLabel">Cadastrar Plano</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="../php/cadplanos.php" id="idCadPlano">
                <!-- Dados básicos -->
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="AvalTopo" class="form-label">Avaliação Formativa</label>
                    <select name="AvaliaçãoFormativa" id="AvalTopo" class="form-select">
                      <option value="">Selecione a Avaliação Formativa</option>
                      <option value="1">CNCA</option>
                      <option value="2">Avalie CE</option>
                      <option value="3">Pacto de Recomposição</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="Componente" class="form-label">Componente</label>
                    <select name="Componente" id="Componente" class="form-select" required>
                      <option value="">Selecione o Componente</option>
                      <option value="1">Língua Portuguesa</option>
                      <option value="2">Matemática</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="Ciclo" class="form-label">Ciclo</label>
                    <select name="Ciclo" class="form-select" id="Ciclo" required>
                      <option value="">Selecione o Ciclo</option>
                      <option value="1">Ciclo I</option>
                      <option value="2">Ciclo II</option>
                      <option value="3">Ciclo III</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="Responsavel" class="form-label">Responsável</label>
                  <input name="Responsavel" type="text" class="form-control" id="Responsavel" required>
                </div>

                <!-- Tabelas sincronizadas -->
                <div class="mt-4">
                  <h6>Métricas de Desempenho</h6>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="tabelaMetricas">
                      <thead>
                        <tr>
                          <th>Avaliação</th>
                          <th>Série</th>
                          <th>Qtd Previstos</th>
                          <th>Qtd Avaliados</th>
                          <th>(%) Defasagem</th>
                          <th>Qtd Defasagem</th>
                          <th>Meta (%)</th>
                          <th>Meta Redução</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="linhaMetricas">
                          <td>
                            <select name="metricas[avaliacao][]" class="form-select avalMetricas">
                              <option value=""></option>
                              <option value="1">CNCA</option>
                              <option value="2">Avalie CE</option>
                              <option value="3">Pacto de Recomposição</option>
                            </select>
                          </td>
                          <td>
                            <select name="metricas[serie][]" class="form-select serieMetricas">
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
                          <td><input name="metricas[previstos][]" type="text" class="form-control"></td>
                          <td><input name="metricas[avaliados][]" type="text" class="form-control"></td>
                          <td><input name="metricas[pct_defasagem][]" type="text" class="form-control"></td>
                          <td><input name="metricas[qtd_defasagem][]" type="text" class="form-control"></td>
                          <td><input name="metricas[meta_pct][]" type="text" class="form-control"></td>
                          <td><input name="metricas[meta_reducao][]" type="text" class="form-control"></td>
                          <td><button type="button" class="btn btn-danger btnRemoverLinha">X</button></td>
                        </tr>
                      </tbody>
                    </table>
                    <button type="button" class="btn btn-secondary mt-2" id="addMetricas">Adicionar Linha</button>
                  </div>
                </div>

                <div class="mt-4">
                  <h6>Habilidades Críticas</h6>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="tabelaHabilidades">
                      <thead>
                        <tr>
                          <th>Avaliação</th>
                          <th>Série</th>
                          <th>Habilidade</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="linhaHab">
                          <td class="avalHab">#</td>
                          <td class="serieHab">#</td>
                          <td><input name="habilidades[nome][]" type="text" class="form-control"></td>
                          <td><button type="button" class="btn btn-danger btnRemoverLinha">X</button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="mt-4 mb-3">
                  <h6>Plano de Ação</h6>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="tabelaPlano">
                      <thead>
                        <tr>
                          <th>Avaliação</th>
                          <th>Série</th>
                          <th>Plano</th>
                          <th>Início</th>
                          <th>Término</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="linhaPlano">
                          <td class="avalPlano">#</td>
                          <td class="seriePlano">#</td>
                          <td><input name="plano[descricao][]" type="text" class="form-control"></td>
                          <td><input name="plano[inicio][]" type="date" class="form-control"></td>
                          <td><input name="plano[fim][]" type="date" class="form-control"></td>
                          <td>
                            <select name="plano[status][]" class="form-select">
                              <option value=""></option>
                              <option value="1">Não Realizado</option>
                              <option value="2">Planejado</option>
                              <option value="3">Replanejado</option>
                              <option value="4">Realizado no Prazo</option>
                              <option value="5">Realizado com Atraso</option>
                            </select>
                          </td>
                          <td><button type="button" class="btn btn-danger btnRemoverLinha">X</button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" form="idCadPlano">Enviar</button>
            </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </main>

  <!-- Scripts -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById("sidebar");
      const main = document.getElementById("main");
      sidebar.classList.toggle("collapsed");
      main.classList.toggle("collapsed");
    }

    function adicionarLinhaMetricas() {
      let linhaNova = $("#tabelaMetricas .linhaMetricas:first").clone();
      linhaNova.find("input").val("");
      linhaNova.find("select").val("");

      // Última linha para replicar Avaliação e Série
      let ultima = $("#tabelaMetricas .linhaMetricas:last");
      let avalValor = ultima.find(".avalMetricas").val();
      let avalTexto = ultima.find(".avalMetricas option:selected").text();
      let serieValor = ultima.find(".serieMetricas").val();
      let serieTexto = ultima.find(".serieMetricas option:selected").text();

      linhaNova.find(".avalMetricas").val(avalValor);
      linhaNova.find(".serieMetricas").val(serieValor);
      $("#tabelaMetricas tbody").append(linhaNova);

      // Habilidades
      let linhaHab = $("#tabelaHabilidades .linhaHab:first").clone();
      linhaHab.find("input").val("");
      linhaHab.find(".avalHab").text(avalValor ? avalTexto : "#");
      linhaHab.find(".serieHab").text(serieValor ? serieTexto : "#");
      $("#tabelaHabilidades tbody").append(linhaHab);

      // Plano
      let linhaPlano = $("#tabelaPlano .linhaPlano:first").clone();
      linhaPlano.find("input").val("");
      linhaPlano.find("select").val("");
      linhaPlano.find(".avalPlano").text(avalValor ? avalTexto : "#");
      linhaPlano.find(".seriePlano").text(serieValor ? serieTexto : "#");
      $("#tabelaPlano tbody").append(linhaPlano);
    }

    $(document).on("click", "#addMetricas", adicionarLinhaMetricas);

    $(document).on("change", ".avalMetricas, .serieMetricas", function () {
      $("#tabelaMetricas .linhaMetricas").each(function (index) {
        let avalValor = $(this).find(".avalMetricas").val();
        let avalTexto = $(this).find(".avalMetricas option:selected").text();
        let serieValor = $(this).find(".serieMetricas").val();
        let serieTexto = $(this).find(".serieMetricas option:selected").text();

        $("#tabelaHabilidades .linhaHab").eq(index).find(".avalHab").text(avalValor ? avalTexto : "#");
        $("#tabelaHabilidades .linhaHab").eq(index).find(".serieHab").text(serieValor ? serieTexto : "#");

        $("#tabelaPlano .linhaPlano").eq(index).find(".avalPlano").text(avalValor ? avalTexto : "#");
        $("#tabelaPlano .linhaPlano").eq(index).find(".seriePlano").text(serieValor ? serieTexto : "#");
      });
    });

    $(document).on("click", ".btnRemoverLinha", function () {
      let tbody = $(this).closest("tbody");
      if (tbody.children().length > 1) {
        let index = $(this).closest("tr").index();
        $(this).closest("tr").remove();
        if (tbody.attr("id") === "tabelaMetricas") {
          $("#tabelaHabilidades .linhaHab").eq(index).remove();
          $("#tabelaPlano .linhaPlano").eq(index).remove();
        } else if (tbody.attr("id") === "tabelaHabilidades") {
          $("#tabelaMetricas .linhaMetricas").eq(index).remove();
          $("#tabelaPlano .linhaPlano").eq(index).remove();
        } else if (tbody.attr("id") === "tabelaPlano") {
          $("#tabelaMetricas .linhaMetricas").eq(index).remove();
          $("#tabelaHabilidades .linhaHab").eq(index).remove();
        }
      }
    });
  </script>

</body>

</html>
