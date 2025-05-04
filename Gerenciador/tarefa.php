<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit;
}

// Inclui o arquivo de conexão com o banco de dados
require_once 'Banco/dbfake.php'

?>
<div class="col-6">
    <div class="containerTarefa">

        <table border="1" cellpadding="10">
            <tr>
                <th><h1>Título</h1></th>
                <th>Descrição</th>
                <th>Data Limite</th>
                <th>Responsável</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($tarefas as $tarefa): ?>
                <tr>
                    <td><?php echo htmlspecialchars($tarefa['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($tarefa['descricao']); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($tarefa['data_limite'])); ?></td>
                    <td><?php echo htmlspecialchars($tarefa['responsavel']); ?></td>
                    <td><?php echo htmlspecialchars($tarefa['status']); ?></td>
                    <td>
                        <a href="tarefaComentarios.php?tarefa_id=<?php echo $tarefa['id']; ?>">Comentários</a> |
                        <a href="tarefaEditar.php?tarefa_id=<?php echo $tarefa['id']; ?>">Editar</a> |
                        <a href="tarefaExcluir.php?tarefa_id=<?php echo $tarefa['id']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>


    </div>
</div>
