<?php
require_once __DIR__ . '/../Banco/dbfake.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'] ?? '';

    if ($email && $senha) {
        if (Logar($email, $senha)) {
            header('Location: dashboard.php');
            exit;
        } else {
            $_SESSION['erro_login'] = 'E-mail ou senha inválidos.';
        }
    } else {
        $_SESSION['erro_login'] = 'Por favor, preencha todos os campos.';
    }

    header('Location: login.php');
    exit;
} else {
    header('Location: login.php');
    exit;
}