<body>
    <?php
	require_once "./Comuns/header.php";

	echo "<main>";

	require_once (match($page){
		"home" => "./dashboard.php",
		"login" => "./login.php",
		"tarefas"=> "./tarefas.php",
		default => "./404.php",
	});

	echo "</main>";
	require_once "./Comuns/footer.php";
	?>
</body>