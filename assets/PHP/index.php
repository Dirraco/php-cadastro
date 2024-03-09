<?php
                //conexão com o banco de dados
                include('PHP/config.php');
                //include das páginas
                switch (@$_REQUEST['page']) {
                  //marcas
                  case 'marca-listar':
                    include('PHP/gerente-listar.php');
                    break;
                  case 'marca-cadastrar':
                    include('PHP/gerente-cadastrar.php');
                    break;
                  case 'marca-editar':
                    include('PHP/gerente-editar.php');
                    break;
                  case 'marca-salvar':
                    include('PHP/gerente-salvar.php');
                    break;
                    default:
                    print "<h1>Seja Bem-vindo</h1>";
                }
?>