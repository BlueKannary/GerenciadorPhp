<?php
// dashboard.php
include 'Comuns/header.php';
include 'Comuns/autentica.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
  header('Location: login.php');
  exit;
}

// Obtém as tarefas do usuário
include 'Banco/dbfake.php';
$usuario_id = $_SESSION['usuario_id'];
$tarefas = array_filter($tarefas, fn($tarefa) => $tarefa['responsavel'] == $usuario_id);
?>
<main>
  <h1>Dashboard</h1>
  <p><a href="tarefaNova.php">Criar Nova Tarefa</a></p>
  <h2>Minhas Tarefas</h2>
  <ul>
    <?php foreach ($tarefas as $tarefa): ?>
      <li>
        <a href="tarefa.php?id=<?= $tarefa['id'] ?>"><?= htmlspecialchars($tarefa['titulo']) ?></a>
        - <?= htmlspecialchars($tarefa['status']) ?>
      </li>
    <?php endforeach; ?>
  </ul>
</main>
<?php
include 'Comuns/footer.php';
?>
