<?php
session_start();
require_once 'Comuns/header.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit;
}

// Simulação de dados de comentários
$comentarios = [
];

// Obtém o ID da tarefa da URL
$tarefa_id = isset($_GET['tarefa_id']) ? (int)$_GET['tarefa_id'] : 0;

// Filtra os comentários para a tarefa específica
$comentarios_tarefa = array_filter($comentarios, function($comentario) use ($tarefa_id) {
    return $comentario['tarefa_id'] === $tarefa_id;
});
?>
<div class="containerHeader">
    <div class="pull-left">
        <h1>Comentários da Tarefa</h1>
    </div>
    <div class="pull-right">
        <a class="btn btn-secundary" href="dashboard.php">Home</a>
        <a class="btn btn-secundary" href="tarefas.php">Tarefas</a>
    </div>
</div>
<div class="container">
    
<?php if (!empty($comentarios_tarefa)): ?>
    <ul>
        <?php foreach ($comentarios_tarefa as $comentario): ?>
            <li>
                <strong><?php echo htmlspecialchars($comentario['usuario_nome']); ?></strong> disse:
                "<?php echo htmlspecialchars($comentario['comentario']); ?>" em
                <?php echo date('d/m/Y H:i', strtotime($comentario['data_hora'])); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?><form action="tarefaComentarios.php?tarefa_id=<?php echo $tarefa_id; ?>" method="POST">
        <div class="form-group">
            <label for="comentario">Adicionar Comentário:</label>
            <textarea id="comentario" name="comentario" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-sucess">Enviar</button>
    </form>
<?php endif; ?>

</div>

<?php require_once 'Comuns/footer.php'; ?>
