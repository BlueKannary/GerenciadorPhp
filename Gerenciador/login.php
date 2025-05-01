<?php
// login.php
include 'Comuns/header.php';
?>
<main>
  <h1>Login</h1>
  <form action="autentica.php" method="POST">
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>
    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>
    <button type="submit">Entrar</button>
  </form>
</main>
<?php
include 'Comuns/footer.php';
?>
