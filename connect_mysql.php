<?php
		//estabelece conexão com MySQL
		class Conexao {
			private $dsn;
			private $dbuser;
			private $dbpass;
			private $db;

			public function db_mysql() {
				$this->dsn = "mysql:dbname=b7web_login;port=3306;host=localhost";
				$this->dbuser = "root";
				$this->dbpass = "";

				return $this->db = new PDO($this->dsn, $this->dbuser, $this->dbpass);
			}
		}
		//realiza instancia da classe criando objeto
		$connect = new Conexao();
		$db = $connect->db_mysql();
		//define metodo PDO para detectar erros internos
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//Testa se conexão foi estabelecida
		if($db == TRUE) {
			//echo "conexão estabelecida com suscesso !!";
		}else {
			echo $db->getMessage();
		}
?>