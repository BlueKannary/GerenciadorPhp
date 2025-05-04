<?php
require_once 'db.php'; // Carrega o "banco de dados" em cookies
include 'Comuns/header.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

// Envio do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $responsavel = $_POST['responsavel'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $urgente = ($_POST['urgente'] ?? '') === 'sim' ? true : false;
    $data = $_POST['data'] ?? '';
    $status = $_POST['status'] ?? '0';
    $prioridade = $_POST['prioridade'] ?? '0';
    $categoria = $_POST['categoria'] ?? '0';

    if ($titulo && $responsavel && $descricao && $data) {
        $tarefas = json_decode($_COOKIE['tarefas'], true);

        $novaTarefa = [
            "id" => rand(1000, 9999),
            "titulo" => $titulo,
            "responsavel" => $responsavel,
            "descricao" => $descricao,
            "urgente" => $urgente,
            "data" => $data,
            "status" => $status,
            "prioridade" => $prioridade,
            "categoria" => $categoria,
            "criador_id" => $_SESSION['usuario_id'],
        ];

        $tarefas[] = $novaTarefa;
        setcookie("tarefas", json_encode($tarefas), 0, "/");

        $_SESSION['sucesso_tarefa'] = "Tarefa salva com sucesso!";
        header('Location: dashboard.php');
        exit;
    } else {
        $_SESSION['erro_tarefa'] = "Preencha todos os campos obrigatórios.";
        header('Location: tarefaNova.php');
        exit;
    }
}
?>

<main>
    <div class="containerHeader">
        <div class="pull-left">
            <h1>Tarefa</h1>
        </div>
        <div class="pull-right">
            <a class="btn btn-secundary" href="dashboard.php">Home</a>
            <a class="btn btn-secundary" href="tarefas.php">Tarefas</a>
        </div>
    </div>
    <div class="container">

        <h2>Nova Tarefa</h2>

        <?php if (isset($_SESSION['erro_tarefa'])): ?>
            <div class="alert alert-danger"><?php echo $_SESSION['erro_tarefa']; unset($_SESSION['erro_tarefa']); ?></div>
        <?php endif; ?>

        <div class="containerTarefa">
            <form action="tarefaNova.php" method="POST">
                <div class="row">
                    <div class="col-12">
                        <label for="titulo">Título:</label>
                        <input type="text" id="titulo" name="titulo" required><br/>
                        <label for="responsavel">Responsável:</label>
                        <input type="text" id="responsavel" name="responsavel" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="descricao">Descrição:</label>
                        <textarea id="descricao" name="descricao" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label>Urgente:</label><br />
                        <input type="radio" id="sim" name="urgente" value="sim">
                        <label for="sim">Sim</label><br />
                        <input type="radio" id="nao" name="urgente" value="nao" checked>
                        <label for="nao">Não</label><br />
                    </div>
                    <div class="col-3">
                        <label for="data">Data:</label>
                        <input type="date" id="data" name="data" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="status">Status:</label>
                        <select id="status" name="status">
                            <option value="0">Pendente</option>
                            <option value="1">Em Andamento</option>
                            <option value="2">Concluída</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="prioridade">Prioridade:</label>
                        <select id="prioridade" name="prioridade">
                            <option value="0">Baixa</option>
                            <option value="1">Média</option>
                            <option value="3">Alta</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="categoria">Categoria:</label>
                        <select id="categoria" name="categoria">
                            <option value="0">Outros</option>
                            <option value="1">Trabalho</option>
                            <option value="2">Pessoal</option>
                            <option value="3">Estudo</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="text-info ft-11">* Campos de preenchimento obrigatório</div>
                    <button type="submit" class="btn btn-sucess">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include 'Comuns/footer.php'; ?>