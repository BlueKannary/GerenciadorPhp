<?php
// dashboard.php
session_start();
require_once 'Comuns/header.php';
require_once 'Comuns/autentica.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
  header('Location: login.php');
  exit;
}

// Obtém as tarefas do "banco"
require_once 'Banco/dbfake.php';

$usuario_id = $_SESSION['usuario_id'];
$tarefas_usuario = array_filter($tarefas, function ($tarefa) use ($usuario_id) {
  return $tarefa['usuario_id'] == $usuario_id;
});

function traduzStatus($status) {
  switch ($status) {
    case '0': return 'Pendente';
    case '1': return 'Em Andamento';
    case '2': return 'Concluída';
    default: return 'Desconhecido';
  }
}
?>

<main>
  <div class="containerHeader">
    <div class="pull-left">
      <h1>Dashboard</h1>
    </div>
    <div class="pull-right">
      <a class="btn btn-secondary" href="./tarefaNova.php">Adicionar Tarefa</a>
    </div>
  </div>

  <h2>Minhas Tarefas</h2>
  <div class="container">
    <?php if (!empty($tarefas_usuario)): ?>
      <ul>
        <?php foreach ($tarefas_usuario as $tarefa): ?>
          <li>
            <a href="./tarefa.php?id=<?= urlencode($tarefa['id']) ?>">
              <?= htmlspecialchars($tarefa['titulo']) ?>
            </a>
            – <?= traduzStatus($tarefa['status']) ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <div class="containerTarefa">
        <p>Você ainda não possui tarefas.</p>
      </div>
    <?php endif; ?>
  </div>
</main>

<?php
require_once 'Comuns/footer.php';
?>
