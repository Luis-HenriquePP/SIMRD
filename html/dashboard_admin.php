<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../php/connect.php';
$status = $_GET['status'] ?? '';
$componente = $_GET['componente'] ?? '';

$mapMunicipio = [
  '1' => 'Canindé',
  '2' => 'Caridade',
  '3' => 'General Sampaio',
  '4' => 'Itatira',
  '5' => 'Paramoti',
  '6' => 'Santa Quitéria'
];

$sql = "SELECT 
          s.usuario AS secretaria,
          s.municipio AS municipio,
          e.nome AS escola,
          t.nome AS tarefa,
          t.responsavel AS responsavel,
          t.status AS status,
          t.componente AS componente
        FROM Secretaria_Escola_Tarefa setaf
        JOIN Secretarias s ON setaf.id_secretarias = s.idSecretarias
        JOIN Escolas e ON setaf.id_escolas = e.idEscolas
        JOIN Tarefa t ON setaf.id_tarefa = t.idTarefa
        WHERE 1=1";

$params = [];

if ($status !== '') {
  $sql .= " AND t.status = ?";
  $params[] = (int)$status;
}
if ($componente !== '') {
  $sql .= " AND t.componente = ?";
  $params[] = (int)$componente;
}

$sql .= " ORDER BY s.usuario, e.nome";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
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
              <form method="POST" action="../php/Cadsec.php">
                <div class="mb-3">
                  <label for="secretariaNome" class="form-label">Nome da Instituição</label>
                  <input type="text" class="form-control" id="secretariaName" required name="usuario">
                </div>
                <div class="mb-3">
                  <label for="secretariaMunicípio" class="form-label">Município</label>
                  <select class="form-select" id="secretariaMunicipio" required name="municipio">
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
                  <input type="submit" class="btn btn-primary" value="Enviar">
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
      <?php
      // ÁREA DESTINADA AS CONSULTAS DE CONTAGEM EM TEMPO REAL DO DASHBOARD
      $stmt = $pdo->query("SELECT COUNT(*) AS total_pendentes FROM Planos WHERE status = 0 ");
      $pendentes = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $total_pendentes = $pendentes[0]['total_pendentes'] ?? 'erro';

      $stmt = $pdo->query("SELECT COUNT(*) AS total_exec FROM Planos WHERE status = 1");
      $execucao = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $total_exec = $execucao[0]['total_exec'] ?? 'erro';

      $stmt = $pdo->query("SELECT COUNT(*) AS total_concluidos FROM Planos WHERE status = 2");
      $concluidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $total_concluidos = $concluidos[0]['total_concluidos'] ?? 'erro';


      ?>
      <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
        <div class="col-sm-4">
          <div class="card h-100 shadow-lg text-center border-0" style="border-radius: 18px;">
            <div class="card-body p-4">
              <h5 class="card-title fw-bold mb-3"> Pendente </h5>
              <div class="display-4 mb-2 fw-bold text-warning"> <?php echo $total_pendentes; ?></div>
              <p class="card-text text-muted">Planejamentos Pendentes</p>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card h-100 shadow-lg text-center border-0" style="border-radius: 18px;">
            <div class="card-body p-4">
              <h5 class="card-title fw-bold mb-3"> Em Execução </h5>
              <div class="display-4 mb-2 fw-bold text-primary"><?php echo $total_exec; ?></div>
              <p class="card-text text-muted">Planejamentos em Execução</p>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card h-100 shadow-lg text-center border-0" style="border-radius: 18px;">
            <div class="card-body p-4">
              <h5 class="card-title fw-bold mb-3"> Concluídos</h5>
              <div class="display-4 mb-2 fw-bold text-success"><?php echo $total_concluidos ?></div>
              <p class="card-text text-muted">Planejamentos Concluídos</p>
            </div>
          </div>
        </div>

      </div>

      <div class="ranking-box mt-4">
        <div class="d-flex justify-content-center mb-4">
          <form class="d-flex align-items-center flex-wrap gap-3" method="GET">
            <select class="btn btn-secondary" name="status">
              <option value="">Filtrar por Status</option>
              <option value="6" <?= ($status === '6') ? 'selected' : '' ?>>Não realizada</option>
              <option value="3" <?= ($status === '3') ? 'selected' : '' ?>>Planejado</option>
              <option value="4" <?= ($status === '4') ? 'selected' : '' ?>>Replanejado</option>
              <option value="5" <?= ($status === '5') ? 'selected' : '' ?>>Realizado no Prazo</option>
            </select>

            <select class="btn btn-secondary" name="componente">
              <option value="">Filtrar por Componente</option>
              <option value="1" <?= ($componente === '1') ? 'selected' : '' ?>>Língua Portuguesa</option>
              <option value="2" <?= ($componente === '2') ? 'selected' : '' ?>>Matemática</option>
            </select>
            <button class="btn btn-success" type="submit">Filtrar</button>
            <a class="btn btn-outline-secondary" href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">Limpar</a>
          </form>
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
            <?php if (empty($dados)): ?>
              <tr>
                <td colspan="5" style="text-align: center;">Nenhum registro encontrado.</td>
              </tr>
            <?php else: ?>
              <?php foreach ($dados as $campo): ?>
                <?php
                $municipioRaw = $campo['municipio'] ?? '';
                $municipioExib = is_numeric($municipioRaw) ? ($mapMunicipio[$municipioRaw] ?? $municipioRaw) : $municipioRaw;
                ?>
                <tr>
                  <td><?= htmlspecialchars($campo['secretaria'] ?? '') ?></td>
                  <td><?= htmlspecialchars($municipioExib) ?></td>
                  <td><?= htmlspecialchars($campo['escola'] ?? '') ?></td>
                  <td><?= htmlspecialchars($campo['tarefa'] ?? '') ?></td>
                  <td><?= htmlspecialchars($campo['responsavel'] ?? '') ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
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

  document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.get('sucesso') === '1') {

      Swal.fire({
        icon: 'success',
        title: 'Tudo certo!',
        text: 'Cadastro realizado com sucesso!',
        confirmButtonText: 'OK',
        background: '#ffffff',
        color: '#333',
        iconColor: '#4CAF50',
        confirmButtonColor: '#128630ff',
        confirmButtonTextColor: '#fff',
        width: '450px',
        padding: '35px',
        customClass: {
          popup: 'swal-custom-popup',
          title: 'swal-custom-title',
          confirmButton: 'swal-custom-btn'
        }
      });

      const url = new URL(window.location);
      url.searchParams.delete('sucesso');
      window.history.replaceState({}, '', url);
    }
  });
</script>
<script src="../assets/js/sweetalert2@11.js"></script>

</html>