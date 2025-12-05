<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['idSecretaria']) || $_SESSION['usuario_tipo'] !== 'secretaria') {
  header('Location: ../html/login.php?tipo=secretaria');
  exit();
}
require_once '../php/connect.php';
$municipio_sec = $_SESSION['municipio']; // município da secretaria logada
$idSecretaria = $_SESSION['idSecretaria'];
$status = $_GET['status'] ?? '';
$componente = $_GET['componente'] ?? '';

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
      <?php
      // ÁREA DESTINADA AS CONSULTAS DE CONTAGEM EM TEMPO REAL DO DASHBOARD
      $stmt = $pdo->prepare("
    SELECT COUNT(*) AS total_pendentes 
    FROM Planos p
    JOIN Planos_Escola pe ON pe.id_planos = p.idPlanos
    JOIN Escolas e ON pe.id_escolas = e.idEscolas
    WHERE p.status = 0
      AND e.municipio = :municipio
");
      $stmt->execute(['municipio' => $municipio_sec]);
      $total_pendentes = $stmt->fetch()['total_pendentes'];

      $stmt = $pdo->prepare("
    SELECT COUNT(*) AS total_exec 
    FROM Planos p
    JOIN Planos_Escola pe ON pe.id_planos = p.idPlanos
    JOIN Escolas e ON pe.id_escolas = e.idEscolas
    WHERE p.status = 1
      AND e.municipio = :municipio
");
      $stmt->execute(['municipio' => $municipio_sec]);
      $total_exec = $stmt->fetch()['total_exec'];

      $stmt = $pdo->prepare("
    SELECT COUNT(*) AS total_concluidos 
    FROM Planos p
    JOIN Planos_Escola pe ON pe.id_planos = p.idPlanos
    JOIN Escolas e ON pe.id_escolas = e.idEscolas
    WHERE p.status = 2
      AND e.municipio = :municipio
");
      $stmt->execute(['municipio' => $municipio_sec]);
      $total_concluidos = $stmt->fetch()['total_concluidos'];


      ?>
      <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
        <button class="col-auto" style="background:none; border:none;" data-bs-toggle="modal" data-bs-target="#PlanosPendentesModal">
          <div class="card h-100 shadow-lg text-center border-0" style="border-radius: 18px;">
            <div class="card-body p-4">
              <h5 class="card-title fw-bold mb-3"> Pendente </h5>
              <div class="display-4 mb-2 fw-bold text-warning"><?php echo $total_pendentes; ?></div>
              <p class="card-text text-muted">Planejamentos Pendentes</p>
            </div>
          </div>
        </button>
        <button class="col-auto" style="background:none; border:none;" data-bs-toggle="modal" data-bs-target="#PlanosEmProcessoModal">
          <div class="card h-100 shadow-lg text-center border-0" style="border-radius: 18px;">
            <div class="card-body p-4">
              <h5 class="card-title fw-bold mb-3"> Em Execução </h5>
              <div class="display-4 mb-2 fw-bold text-primary"><?php echo $total_exec; ?></div>
              <p class="card-text text-muted">Planejamentos em Execução</p>
            </div>
          </div>
        </button>
        <button class="col-auto" style="background:none; border:none;" data-bs-toggle="modal" data-bs-target="#PlanosConcluidosModal">
          <div class="card h-100 shadow-lg text-center border-0" style="border-radius: 18px;">
            <div class="card-body p-4">
              <h5 class="card-title fw-bold mb-3"> Concluídos</h5>
              <div class="display-4 mb-2 fw-bold text-success"><?php echo $total_concluidos ?></div>
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
                  <tr style="text-align: center;">
                    <th>Escola</th>
                    <th>Plano</th>
                    <th>Componente</th>
                    <th>Responsável</th>
                    <th>Data de Inicio</th>
                  </tr>
                </thead>
                <?php
                require_once '../php/connect.php';

                $idSecretaria = $_SESSION['idSecretaria'];
                $sql = "SELECT 
                e.nome AS escola,
                p.nome_plano AS plano,
                p.componente,
                p.responsavel,
                p.data_inicio
            FROM Planos p
            JOIN Planos_Escola pe ON pe.id_planos = p.idPlanos
            JOIN Escolas e ON e.idEscolas = pe.id_escolas
            WHERE p.status = 0
              AND e.municipio = (
                  SELECT municipio FROM Secretarias WHERE idSecretarias = ?
              )";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([$idSecretaria]);
                $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $mapaComponentes = [
                  '1' => 'Língua Portuguesa',
                  '2' => 'Matemática'
                ];

                ?>
                <tbody>
                  <?php foreach ($dados as $row): ?>
                    <tr style="text-align: center;">
                      <td><?php echo htmlspecialchars($row['escola']) ?? ''; ?></td>
                      <td><?php echo htmlspecialchars($row['plano']) ?? ''; ?></td>
                      <td><?php echo $mapaComponentes[$row['componente']] ?? ''; ?></td>
                      <td><?php echo htmlspecialchars($row['responsavel']) ?? ''; ?></td>
                      <td><?php echo htmlspecialchars($row['data_inicio']) ?? ''; ?></td>
                    </tr>
                  <?php endforeach; ?>
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
                <?php
                $idSecretaria = $_SESSION['idSecretaria'];
                $sqlExec = "SELECT 
                e.nome AS escola,
                p.nome_plano AS plano,
                p.componente,
                p.responsavel,
                p.data_inicio
                FROM Planos p
                JOIN Planos_Escola pe ON pe.id_planos = p.idPlanos
                JOIN Escolas e ON e.idEscolas = pe.id_escolas
                WHERE p.status = 1
                  AND e.municipio = (
                      SELECT municipio FROM Secretarias WHERE idSecretarias = ?
                  )";

                $stmtExec = $pdo->prepare($sqlExec);
                $stmtExec->execute([$idSecretaria]);
                $dadosExec = $stmtExec->fetchAll(PDO::FETCH_ASSOC);
                $mapaComponentes = [
                  '1' => 'Língua Portuguesa',
                  '2' => 'Matemática'
                ];
                ?>
                <tbody>
                  <?php foreach ($dadosExec as $row): ?>
                    <tr style="text-align: center;">
                      <td><?php echo htmlspecialchars($row['escola']) ?? ''; ?></td>
                      <td><?php echo htmlspecialchars($row['plano']) ?? ''; ?></td>
                      <td><?php echo $mapaComponentes[$row['componente']] ?? ''; ?></td>
                      <td><?php echo htmlspecialchars($row['responsavel']) ?? ''; ?></td>
                      <td><?php echo htmlspecialchars($row['data_inicio']) ?? ''; ?></td>
                    </tr>
                  <?php endforeach; ?>
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
                <?php
                $idSecretaria = $_SESSION['idSecretaria'];
                $sqlConc = "SELECT 
                e.nome AS escola,
                p.nome_plano AS plano,
                p.componente,
                p.responsavel,
                p.data_inicio
              FROM Planos p
              JOIN Planos_Escola pe ON pe.id_planos = p.idPlanos
              JOIN Escolas e ON e.idEscolas = pe.id_escolas
              WHERE p.status = 2
                AND e.municipio = (
                    SELECT municipio FROM Secretarias WHERE idSecretarias = ?
              )";

                $stmtConc = $pdo->prepare($sqlConc);
                $stmtConc->execute([$idSecretaria]);
                $dadosConc = $stmtConc->fetchAll(PDO::FETCH_ASSOC);
                $mapaComponentes = [
                  '1' => 'Língua Portuguesa',
                  '2' => 'Matemática'
                ];
                ?>
                <tbody>
                  <?php foreach ($dadosConc as $row): ?>
                    <tr style="text-align: center;">
                      <td><?php echo htmlspecialchars($row['escola']) ?? ''; ?></td>
                      <td><?php echo htmlspecialchars($row['plano']) ?? ''; ?></td>
                      <td><?php echo $mapaComponentes[$row['componente']] ?? ''; ?></td>
                      <td><?php echo htmlspecialchars($row['responsavel']) ?? ''; ?></td>
                      <td><?php echo htmlspecialchars($row['data_inicio']) ?? ''; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php
      // CAPTURA DOS FILTROS
      $status = $_GET['status'] ?? '';
      $buscaEscola = $_GET['escola'] ?? '';
      $componente = $_GET['componente'] ?? '';

      $param = [];
      $sqlFiltro = "
SELECT 
    p.status,
    e.nome AS escola,
    p.nome_plano AS plano,
    p.componente,
    p.responsavel
FROM Planos p
JOIN Planos_Escola pe ON pe.id_planos = p.idPlanos
JOIN Escolas e ON e.idEscolas = pe.id_escolas
WHERE e.municipio = (
    SELECT municipio FROM Secretarias WHERE idSecretarias = :idSecretaria
)
";

      $param['idSecretaria'] = $_SESSION['idSecretaria'];

      // FILTRO STATUS
      if (!empty($status)) {
        $sqlFiltro .= " AND p.status = :status ";
        $param['status'] = $status;
      }

      // FILTRO ESCOLA
      if (!empty($buscaEscola)) {
        $sqlFiltro .= " AND e.nome LIKE :escola ";
        $param['escola'] = "%$buscaEscola%";
      }

      // FILTRO COMPONENTE
      if (!empty($componente)) {
        $sqlFiltro .= " AND p.componente = :componente ";
        $param['componente'] = $componente;
      }

      $sqlFiltro .= " ORDER BY e.nome ASC ";

      $stmtFiltro = $pdo->prepare($sqlFiltro);
      $stmtFiltro->execute($param);
      $dados = $stmtFiltro->fetchAll(PDO::FETCH_ASSOC);

      $mapaComponentes = [
        '1' => 'Língua Portuguesa',
        '2' => 'Matemática'
      ];
      ?>
      <div class="ranking-box mt-4">
        <div class="d-flex justify-content-center mb-4">
          <form class="d-flex align-items-center flex-wrap gap-3">
            <select class="btn btn-secondary">
              <option value="">Filtrar por Status</option>
              <option value="6" <?= ($status === '6') ? 'selected' : '' ?>>Não realizada</option>
              <option value="3" <?= ($status === '3') ? 'selected' : '' ?>>Planejado</option>
              <option value="4" <?= ($status === '4') ? 'selected' : '' ?>>Replanejado</option>
              <option value="5" <?= ($status === '5') ? 'selected' : '' ?>>Realizado no Prazo</option>
            </select>
            <input type="text" placeholder="Buscar Escola" class="form-control w-auto">
            <select class="btn btn-secondary">
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
              <th>Status</th>
              <th>Escola</th>
              <th>Plano</th>
              <th>Componente</th>
              <th>Responsável</th>
            </tr>
          </thead>
          <tbody>
          <tbody style="text-align: center;">
            <?php if (empty($dados)): ?>
              <tr>
                <td colspan="5" class="text-center">Nenhum registro encontrado</td>
              </tr>
            <?php else: ?>
              <?php foreach ($dados as $row): ?>
                <tr >
                  <td><?= htmlspecialchars($row['status']) ?></td>
                  <td><?= htmlspecialchars($row['escola']) ?></td>
                  <td><?= htmlspecialchars($row['plano']) ?></td>
                  <td><?= htmlspecialchars($mapaComponentes[$row['componente']] ?? '') ?></td>
                  <td><?= htmlspecialchars($row['responsavel']) ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>

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