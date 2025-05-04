<?php 
include 'Comuns/header.php';
?>
<main>
  <div class="row">
    <div class="col-12">
      <div class="container">
        <h2>Bem-vindo ao Gerenciador de Tarefas</h2>
        <p>Faça login para acessar suas tarefas e gerenciar seu tempo de forma eficiente.</p>
      </div>
    </div>
  </div>
  <div class="containerLog">
    <h1>Cadastrar Novo Usuário</h1>
    <div>
      <form action="cadastrar_usuario.php" method="POST">
        <div class="row">
          <div class="col-12">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
          </div>
        </div>
        <button type="submit" class="btn btn-log">Cadastrar</button>
      </form>
    </div>
  </div>
</main>
<?php
include 'Comuns/footer.php';
?>
