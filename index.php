<?php
	session_start();
	if(isset($_SESSION["id"]) AND !empty($_SESSION["id"])) {
	}else {
		header("Location:login.php");
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Index.php</title>
	</head>
<body>
	<article>
		<header>
			<H1>Olá tudo bem !!</H1>
		</header>
		<section>
			<p>seja bem vindo.</p>
		</section>
	</article>
</body>
</html>