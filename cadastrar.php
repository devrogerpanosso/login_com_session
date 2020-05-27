<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="bootstrap4/css/style.css"/>
	</head>
<body>
	<article>
		<header>
			<div class="container">
				<br/>
				<H1 class="page-header text-center text-primary">
					Cadastre-se
				</H1>
				<a class="nav-link badge badge-dark" title="Login" href="login.php">login</a>
			</div>
		<?php
			//define sessão de login
			session_start();
			if(isset($_SESSION["cadastro"]) AND !empty($_SESSION["cadastro"])) {
				echo $_SESSION["cadastro"];
				//finaliza sessão
				unset($_SESSION["cadastro"]);
			}
		?>
		<hr class="bg-success">
		</header>
		<section>
			<div class="container">
				<form name="login" method="POST" action="cadastro_usuario.php">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="text text-info" for="usuario">Usuário</label>
								<input type="text" name="usuario" class="form-control form-control-lg" autocomplete="off" placeholder=" Seu Usuário.. " required/>
								<small class="text text-muted text-secondary">Não compartilharemos seu E-Mail</small>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label class="text text-info" for="senha">Senha</label>
								<input type="password" name="senha" class="form-control form-control-lg" autocomplete="off" placeholder=" Sua Senha.. " required/>
								<small class="text text-muted text-secondary">Não compartilharemos sua Senha</small>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-success btn-lg">Cadastrar</button>
				</form>
				</div>
			</div>
		</section>
	</article>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap4/js/script.js"/></script>
</body>
</html>