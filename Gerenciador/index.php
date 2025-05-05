<?php
require_once "./Comuns/header.php";

$page = $_GET['page'] ?? 'home';

echo "<main>";

require_once (match($page) {
    "home" => "./dashboard.php",
    "login" => "./login.php",
    "tarefas" => "./tarefa.php",
    default => "./404.php",
});

echo "</main>";
require_once "./Comuns/footer.php";
?>
