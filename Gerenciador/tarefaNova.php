<?php
session_start();
include 'Comuns/header.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

// Salva nova tarefa no cookie
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tarefas = isset($_COOKIE['tarefas']) ? json_decode($_COOKIE['tarefas'], true) : [];

    $nova_tarefa = [
        'id' => uniqid(),
        'titulo' => $_POST['titulo'],
        'responsavel' => $_POST['responsavel'],
        'descricao' => $_POST['descricao'],
        'urgente' => $_POST['urgente'] ?? 'nao',
        'data' => $_POST['data'],
        'status' => $_POST['status'],
        'prioridade' => $_POST['prioridade'],
        'categoria' => $_POST['categoria'],
        'usuario_id' => $_SESSION['usuario_id'] // mesmo nome usado no login
    ];

    $tarefas[] = $nova_tarefa;

    setcookie('tarefas', json_encode($tarefas), time(), '/');

    header('Location: dashboard.php');
    exit;
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
        <h2>Criar Nova Tarefa</h2>

        <div class="containerTarefa">
            <form action="tarefaNova.php" method="POST">
                <div class="row">
                    <div class="col-6">
                        <label for="titulo">Título:</label>
                        <input type="text" id="titulo" name="titulo" required>
                    </div>
                    <div class="col-6">
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
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
include 'Comuns/footer.php';
?>