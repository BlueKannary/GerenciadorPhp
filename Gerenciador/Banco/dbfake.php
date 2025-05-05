    <?php
    session_start([
        'name' => "usuario_id",
        'cookie_lifetime' => 60 * 60 * 24,
        'cookie_path' => '/',
        'cookie_secure' => false,
    ]);

    // Admin default
    $admin = [
        "id" => 0,
        "nome" => "admin",
        "email" => "admin@gmail.com",
        "senha" => "1234",
    ];

    // Inicia usuários se não existir
    if (!isset($_COOKIE["usuarios"])) {
        setcookie("usuarios", json_encode([$admin]), 0, "/");
    } else {
        $usuarios = json_decode($_COOKIE["usuarios"], true);
        $adminExists = false;
        foreach ($usuarios as $u) {
            if ($u["email"] == $admin["email"]) {
                $adminExists = true;
                break;
            }
        }
        if (!$adminExists) {
            $usuarios[] = $admin;
            setcookie("usuarios", json_encode($usuarios), 0, "/");
        }
    }

    // Inicia tarefas se não existir
    if (!isset($_COOKIE["tarefas"])) {
        setcookie("tarefas", json_encode([]), 0, "/");
    }

    // Função para registrar usuário
    function Registrar($nome, $email, $senha): bool {
        if ($nome && $email && $senha) {
            $usuarios = json_decode($_COOKIE["usuarios"], true);
            foreach ($usuarios as $usuario) {
                if ($usuario["email"] === $email) {
                    return false;
                }
            }
            $novoUsuario = [
                "id" => rand(1, 1000),
                "nome" => $nome,
                "email" => $email,
                "senha" => $senha,
            ];
            $usuarios[] = $novoUsuario;
            setcookie("usuarios", json_encode($usuarios), 0, "/");
            return true;
        }
        return false;
    }

    // Função para login
    function Logar($email, $senha): bool {
        $usuarios = json_decode($_COOKIE["usuarios"], true);
        foreach ($usuarios as $usuario) {
            if ($usuario["email"] === $email && $usuario["senha"] === $senha) {
                $_SESSION["usuario_id"] = $usuario["id"];
                $_SESSION["nomeLogado"] = $usuario["nome"];
                return true;
            }
        }
        return false;
    }
    ?>