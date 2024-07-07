<?php 
    session_start();

    if(empty($_POST) or (empty($_POST["name"]) or (empty($_POST["email"]) or (empty($_POST["password"]))))) {
        print "<script>location.href='index.php';</script>";
    }

    include ('config.php');

    $nome = $_POST["name"];
    $email = $_POST["email"];
    $senha = $_POST["password"];

    $sql = "SELECT * FROM usuario_dados
            WHERE nome_usuario = '{$nome}' 
            AND email_usuario = '{$email}'
            AND senha_usuario = '".md5($senha)."'
            ";


    $res = $conn->query($sql) or die($conn->error);

    $row = $res->fetch_object();

    $qtd = $res->num_rows;

    if($qtd > 0){
        $_SESSION["name"]   = $nome;
        $_SESSION["cargo"]  = $row->cargo_usuario;
        switch ($_SESSION["cargo"]) {
            case "gerente":
                header("Location: gerente-dashbord.php");
                break;
            case "funcionario":
                header("Location: funcionario-dashbord.php");
                break;
            default:
                header("Location: dashbord.php");
        }
    } else {
        print "<script>alert('Erro de nome ou senha');</script>";
        print "<script>location.href='../../index.html';</script>";
    }

