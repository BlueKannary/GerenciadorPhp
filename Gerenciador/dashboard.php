<?php
// dashboard.php
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
  return $tarefa['responsavel'] == $usuario_id;
});
?>

<main>
  <div class="containerHeader">
    <div class="pull-left">
      <h1>Dashboard</h1>
    </div>
    <div class="pull-right">
      <a class="btn btn-secundary" href="dashboard.php">Home</a>
      <a class="btn btn-secundary" href="tarefaNova.php">Adicionar Tarefa</a>
    </div>
  </div>

  <h2>Minhas Tarefas</h2>
  <div class="container">
    <?php if (!empty($tarefas_usuario)): ?>
      <ul>
        <?php foreach ($tarefas_usuario as $tarefa): ?>
          <li>
            <a href="tarefa.php?id=<?= urlencode($tarefa['id']) ?>">
              <?= htmlspecialchars($tarefa['titulo']) ?>
            </a>
            – <?= htmlspecialchars($tarefa['status']) ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <p>Você ainda não possui tarefas.</p>
    <?php endif; ?>
  </div>

</main>

<?php
require_once 'Comuns/footer.php';
?>