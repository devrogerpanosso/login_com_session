<?php
		//define sessão para login
		session_start();

		//recebe dados da requisicao 
		if(isset($_POST["usuario"]) AND !empty($_POST["usuario"])) {
			$usuario = addslashes(htmlspecialchars($_POST["usuario"]));
				echo "<strong>Usuario:</strong>" . $usuario;
				echo "<br>" . PHP_EOL;
		}else {
			echo "Usuario não informado";
		}

		if(isset($_POST["senha"]) AND !empty($_POST["senha"])) {
			$senha = addslashes(htmlspecialchars(md5($_POST["senha"])));
				echo "<strong>Senha:</strong>" . $senha;
				echo "<br>" . PHP_EOL;
		}else {
			echo "Senha não informada";
		}

		//estabelece conexão com MySQL
		require "connect_mysql.php";

		//define query para seleção de dados de acordo com usuario e senha "SELECT"
		$query = "SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha";
		$query = $db->prepare($query);
		$query->bindValue(":usuario", $usuario);
		$query->bindValue(":senha", $senha);
		$query->execute();

		//testa se consulta foi realizada
		if($query == TRUE) {
			echo "Consulta realizada com suscesso !!";
		}else {
			echo $db->errorInfo();
		}

		//verifica se há dados na tabela e seleciona id do usuario e grava na sessão
		if($query->rowCount() > 0) {
			$dado_usuario = $query->fetch();

			//atribui id do usuario recebido pela funcao fetch() em sessão
			$_SESSION["id"] = $dado_usuario["id"];

			//REDIRECIONA USUARIO PARA INDEX COM SESSÃO ATIVA COM SEU ID
			header("Location:index.php");
		}else {
			echo $_SESSION["login"] = "
			<div class='container text-center'>
				<div class='alert alert-danger fade show' role='alert'>
					<span class='text text-danger bd-lead'>Usuário ou Senha Incorretos !!</span>
				</div>
			</div>";
			header("Location:login.php");
		}
?>