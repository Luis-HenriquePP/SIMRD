<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once '../php/connect.php';
$sql = $pdo->query("SELECT * FROM Escolas");
$escolas = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Escolas - Admin</title>

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
        <img src="../assets/img/SIMRD.png" alt="SACC" style="width:90px;">
        <span class="brand-text"></span>
      </button>
      <ul class="nav flex-column">
        <li><a href="../html/dashboard_crede.php"><i><img src="" class="dashboard"></i> <span class="label-text">Dashboard</span></a></li>
        <li><a href="../html/lista_escolas_admin.php"><i><img src="" class="escola"></i> <span class="label-text">Escolas</span></a></li>
        <li><a href="../html/lista_secretarias.php"><i><img src="" class="secretaria"></i> <span class="label-text">Secretarias</span></a></li>
        <li><a href="../html/lista_relatorios_admin.html"><i><img src="" class="relatorio"></i> <span class="label-text">Relatórios</span></a></li>
      </ul>
    </div>
    <ul class="nav flex-column bottom-nav">
      <li><a href=""><img src="" class="sair"> <span class="label-text">Sair</span></a></li>
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
      <tbody>
        <?php foreach ($escolas as $esc): ?>
          <tr>
            <td><?= $esc['nome'] ?></td>
            <td><?= $esc['inep'] ?></td>
            <td><?= $esc['municipio'] ?></td>
            <td><?= $esc['localidade'] ?></td>
            <td><button style="border: none; background: none;" data-bs-toggle="modal" data-bs-target="#TarefaModal"><img src="../assets/img/olho.png" alt="" width="25%"></button></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <div class="modal fade" id="TarefaModal" tabindex="-1" aria-labelledby="TarefaModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TarefaModalLabel">Tarefas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Plano</th>
                  <th>Componente</th>
                  <th>Data de Início</th>
                  <th>Status</th>
                  <th>Detalhes</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="DetalhesModal" tabindex="-1" aria-labelledby="DetalhesModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="DetalhesModalLabel">Detalhes da Tarefa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Descrição do Plano</label>
              <div class="form-control" id="descricaoPlanoTexto">Para suprir a carência em operações matemáticas básicas, que frequentemente se manifesta como dificuldade na resolução de problemas e na compreensão de conceitos mais avançados, este plano de ação pedagógica propõe uma abordagem multifacetada e engajadora. O objetivo central é solidificar o conhecimento dos alunos sobre adição, subtração, multiplicação e divisão, indo além da simples memorização de algoritmos.
                A metodologia se baseia na premissa de que a aprendizagem é mais eficaz quando significativa e contextualizada. Portanto, serão introduzidas situações-problema extraídas do cotidiano dos alunos, como simulações de compras, divisão de tarefas ou contagem de objetos, para demonstrar a aplicabilidade prática da matemática. O uso de materiais concretos, como material dourado, tampinhas ou blocos de montar, será incentivado para visualizar as operações e facilitar a compreensão dos conceitos subjacentes, como o reagrupamento na adição e subtração, ou a ideia de grupos iguais na multiplicação.
                Além disso, a introdução de jogos pedagógicos, como o "Bingo Matemático" ou a "Loja da Matemática", transformará a prática repetitiva em uma atividade lúdica e colaborativa. Avaliações diagnósticas contínuas permitirão um acompanhamento individualizado, identificando lacunas específicas e adaptando o ensino às necessidades de cada estudante. Promovendo a discussão em sala de aula e incentivando os alunos a explicarem seus raciocínios, busca-se desenvolver não apenas a fluidez no cálculo, mas também a confiança e a capacidade de pensar criticamente sobre os processos matemáticos.
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Componente</label>
                <div class="form-control" id="componenteTexto"> Matemática</div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Série</label>
                <div class="form-control" id="serieTexto"> 3º Ano</div>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Responsável</label>
              <div class="form-control" id="responsavelTexto"> Olavo de Carvalho</div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label class="form-label">Data de Início</label>

                <div class="form-control" id="dataInicioTexto"> 01/01/2024</div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Data de Término</label>

                <div class="form-control" id="dataTerminoTexto"> 31/03/2024</div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>


  </main>
  <script>
    function abrirTarefas(idEscolas) {
      $.ajax({
        url: "buscarTarefas.php",
        type: "GET",
        data: {
          idEscolas: idEscolas
        },
        success: function(resposta) {
          let tarefas = JSON.parse(resposta);
          let tbody = '';

          tarefas.forEach(t => {
            tbody += `
                    <tr>
                        <td>${t.nome}</td>
                        <td>${t.componente || ''}</td>
                        <td>${t.data_inicial ? t.data_inicial.split(' ')[0] : ''}</td>
                        <td>${t.status || ''}</td>
                        <td>
                            <button style="border:none;background:none;" onclick="abrirDetalhes(${t.idTarefa})">
                                <img src="../assets/img/olho.png" width="25%">
                            </button>
                        </td>
                    </tr>
                `;
          });

          document.querySelector("#TarefaModal tbody").innerHTML = tbody;

          let modal = new bootstrap.Modal(document.getElementById('TarefaModal'));
          modal.show();
        }
      });
    }

    function abrirDetalhes(idTarefa) {
      $.ajax({
        url: "buscarDetalhes.php",
        type: "GET",
        data: {
          id: idTarefa
        },
        success: function(resposta) {
          let t = JSON.parse(resposta);

          document.getElementById("descricaoPlanoTexto").innerHTML = t.plano || '';
          document.getElementById("componenteTexto").innerHTML = t.componente || '';
          document.getElementById("serieTexto").innerHTML = t.serie || '';
          document.getElementById("responsavelTexto").innerHTML = t.responsavel || '';
          document.getElementById("dataInicioTexto").innerHTML = t.data_inicial ? t.data_inicial.split(' ')[0] : '';
          document.getElementById("dataTerminoTexto").innerHTML = t.data_final ? t.data_final.split(' ')[0] : '';

          let modal = new bootstrap.Modal(document.getElementById('DetalhesModal'));
          modal.show();
        }
      });
    }
  </script>


</body>

</html>