<?php
include 'Comuns/header.php';
include 'Comuns/autentica.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

// Envio do formulário e retorno à página de dashboard 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Adicionar a lógica para salvar a nova tarefa no banco de dados
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
                    <div class="col-12">
                        <label for="titulo">Título:</label>
                        <input type="text" id="titulo" name="titulo" required>
                        <label for="data_limite">Data Limite:</label>
                        <input type="date" id="data_limite" name="data_limite" required>
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
                        <label for="urgente">Urgente:</label><br />
                        <input type="radio" id="sim" name="urgente" value="sim">
                        <label for="sim">Sim</label><br />
                        <input type="radio" id="nao" name="urgente" value="nao">
                        <label for="nao">Não</label><br />
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
                    <div class="text-info ft-11">* Campos de preenchimento obrigatorio</div>
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include 'Comuns/footer.php';
?>