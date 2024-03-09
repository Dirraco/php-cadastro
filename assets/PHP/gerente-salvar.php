
<?php

include('config.php');
	switch ($_REQUEST["acao"]) {
		case 'cadastrar':
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
						'".$_POST["password"]."',
						'".$_POST["gender"]."',
						'".$_POST["cargo"]."',
						'".$_POST["salarioUsuario"]."'
					)";
					
					$res = $conn->query($sql);

					if ($res==true) {
						print "<script>alert('Cadastrou com sucesso!!!');</script>";
						// print "<script>location.href='?page=modelos-listar'</script>";
					} else {
						print "<script>alert('Não foi possível!!!');</script>";
						// print "<script>location.href='?page=modelos-listar'</script>";
					}
					break;
					
	}
?>
