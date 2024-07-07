
<?php

include('config.php');
	switch ($_REQUEST["acao"]) {
		case 'cadastrar':
			// Verificar nome
			$nome = $_POST["firstname"]." ".$_POST["lastname"];
			$sql_check = "SELECT *
							FROM usuario_dados 
							WHERE nome_usuario = '$nome'";
			$res_check = $conn->query($sql_check);
			if($res_check->num_rows > 0) {
				print "<script>alert('Este nome já existe!');</script>";
				print "<script>location.href='../../index2.html';</script>";
			} else {


				$sql = "INSERT INTO usuario_dados (
							nome_usuario,
							email_usuario,
							celular_usuario,
							senha_usuario,
							genero_usuario,
							cargo_usuario,
							salario_usuario
						
						) VALUES (
							'".$_POST["firstname"]." ".$_POST["lastname"]."',
							'".$_POST["email"]."',
							'".$_POST["number"]."',
							'".md5($_POST["password"])."',
							'".$_POST["gender"]."',
							'".$_POST["cargo"]."',
							'".$_POST["salarioUsuario"]."'
						)";
						
						$res = $conn->query($sql);
							
						if ($res==true) {
							print "<script>alert('Cadastrou com sucesso!!!');</script>";
							print "<script>location.href='../../index.html';</script>";
						} else {
							print "<script>alert('Não foi possível!!!');</script>";
							print "<script>location.href='../../index2.html';</script>";
						}
				}
					break;


		case 'editar':
			// Certifique-se de que os campos necessários estejam presentes no formulário
			if (isset($_POST['nome_usuario'], $_POST['cargo_usuario'])) {
				// Recupere o ID do usuário com base no ID do usuário
				$id_usuario_dados = $_POST['nome_usuario'];
				
				// Preparando a query SQL para evitar SQL Injection
				$stmt = $conn->prepare("UPDATE usuario_dados 
										SET cargo_usuario = ? 
										WHERE id_usuario_dados = ?");
				
				// Vinculando os parâmetros enviados pelo formulário
				$stmt->bind_param("si", $_POST['cargo_usuario'], $id_usuario_dados);
				
				// Executando a query
				if ($stmt->execute()) {
					echo "<script>alert('Editou com sucesso!!!');</script>";
					print "<script>location.href='gerente-dashbord.php';</script>";
				} else {
					echo "<script>alert('Não foi possível editar.');</script>";
					print "<script>location.href='gerente-dashbord.php';</script>";
				}
				
				// Fechando o statement
				$stmt->close();
			} else {
				echo "<script>alert('Parâmetros inválidos.');</script>";
				print "<script>location.href='gerente-dashbord.php';</script>";
			}
			break;

					

		case 'excluir':
			if (isset($_POST['nome_usuario'])) {
				// Recupere o ID do usuário com base no ID do usuário
				$id_usuario_dados = $_POST['nome_usuario'];
		
				// Preparando a query SQL para evitar SQL Injection
				$stmt = $conn->prepare("DELETE FROM usuario_dados WHERE id_usuario_dados = ?");
		
				// Vinculando os parâmetros enviados pelo formulário
				$stmt->bind_param("i", $id_usuario_dados);
		
				// Executando a query
				if ($stmt->execute()) {
					echo "<script>alert('Excluiu com sucesso!!!');</script>";
					print "<script>location.href='gerente-dashbord.php';</script>";
				} else {
					echo "<script>alert('Não foi possível excluir.');</script>";
					print "<script>location.href='gerente-dashbord.php';</script>";
				}
		
				// Fechando o statement
				$stmt->close();
			} else {
				echo "<script>alert('Parâmetros inválidos.');</script>";
				print "<script>location.href='gerente-dashbord.php';</script>";
			}
			break;			
	}
	//print "<script>alert('ola');</script>" ;
