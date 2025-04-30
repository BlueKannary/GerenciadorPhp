<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gerenciador de Tarefas</title>
        <link rel="stylesheet" href="css/style.css"> <!-- Link para o CSS -->
    </head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="index.php"><img  /></a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="nova_tarefa.php">Nova Tarefa</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>

</header>

<div class="container">
    <?php
    // Exibir uma saudação com o nome do usuário logado
    if (isset($_SESSION['nome'])) {
        echo "<p>Olá" . htmlspecialchars($_SESSION['nome']) . "</p>";
    }
    ?>
