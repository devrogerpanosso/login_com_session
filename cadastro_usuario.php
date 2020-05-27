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

		//estabelece conexão com mysql
		require "connect_mysql.php";

		//define query consulta anexação para inserção de dados
		$query = "INSERT INTO usuarios (usuario,senha) VALUES (:usuario, :senha)";

		//prepara query para ser executada
		$query = $db->prepare($query);
		$query->bindValue(":usuario", $usuario);
		$query->bindValue(":senha", $senha);
		//executa consulta no servidor Mysql
		$query->execute();

		//testa se consulta foi realizada 
		if($query == TRUE) {
			echo "Consulta realizada com suscesso !!";
		}else {
			echo $db->errorInfo();
		}

		//verifia se total de resultados é maior que 0 e retorna sessão de cadastro
		if($query->rowCount() >= 1) {
			echo $_SESSION["cadastro"] = "
			<div class='container text-center'>
				<div class='alert alert-primary' role='alert'>
					<small class='text text-success'>Usuário Cadastrado com Suscesso !!</small>
				</div>
			</div>";
		}else {
			echo "<p class='text text-danger'>Não há usuarios cadastrados !!</p>";
		}

		header("Location:cadastrar.php");
?>