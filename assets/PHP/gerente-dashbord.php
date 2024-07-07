<?php
    session_start();
    if(empty($_SESSION)) {
        print "<script>location.href='../../index.html';</script>";
    }
?>
  <!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style3.css">
  </head>
  <body>
    <main class="main">
        <div class="container">
            <div class="row">
                <div class="principal">
                    <div class="d-grid gap-2">
                        <h1 class="principal_alinhamento">Gerente</h1>
                        <?php
                            print "<h2 class='principal_alinhamento'>". $_SESSION["name"] ."</h2>";
                        ?> 
                        <div class="card mb-6 mt-5 mb-5">
                            <div class="card-body">
                                <?php
                                include('config.php');

                                $sql_usuarios = "SELECT * FROM usuario_dados";
                                $res_usuarios = $conn->query($sql_usuarios);

                                if ($res_usuarios->num_rows > 0) {
                                    ?>
                                    <form action="cadastro-salvar.php" method="POST" onsubmit="return confirm('Deseja realmente salvar as alterações?')">
                                        <input type="hidden" name="acao" id="acao" value="editar">
                                        <div class="mb-5">
                                            <label for="nome_usuario" class="form-label">Escolha um usuário:</label>
                                            <select name="nome_usuario" id="nome_usuario" class="form-select form-select-lg mb-3" aria-label="Large select example" onchange="mostrarCargo()">
                                                <option selected>Escolha um usuário</option>
                                                <?php
                                                while ($row_usuarios = $res_usuarios->fetch_object()) {
                                                    echo "<option value='" . $row_usuarios->id_usuario_dados . "' data-cargo='" . $row_usuarios->cargo_usuario . "'>" . $row_usuarios->nome_usuario . "</option>";
                                                }
                                                ?> 
                                            </select>

                                            <label for="cargo_usuario" class="form-label">Escolha um cargo:</label>
                                            <select name="cargo_usuario" id="cargo_usuario" class="form-select form-select-sm mb-2" aria-label="Small select example">
                                                <option selected>Escolha um cargo</option>
                                                <?php
                                                $sql_cargos = "SELECT DISTINCT cargo_usuario FROM usuario_dados";
                                                $res_cargos = $conn->query($sql_cargos);
                                                while ($row_cargos = $res_cargos->fetch_object()) {
                                                    echo "<option value='" . $row_cargos->cargo_usuario . "'>" . $row_cargos->cargo_usuario . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    <?php
                                } else {
                                    echo "<p>Não há usuários cadastrados.</p>";
                                }
                                ?>
                                <div class="mb-6">
                                    <div class="row">
                                        <div class="d-grid gap-2 col-5 mx-auto">
                                            <!-- Botão para Alterar -->
                                            <button type="submit" class="btn btn-outline-primary" onclick="alterarAcao('editar')">Alterar</button>
                                        </div>
                                        <div class="d-grid gap-2 col-5 mx-auto">
                                            <!-- Botão para Excluir -->
                                            <button type="submit" class="btn btn-outline-danger" onclick="alterarAcao('excluir')">Excluir</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        <?php
                            print "<a href='../../index.html' class='mt-5 mb-3 principal_alinhamento__sair btn btn-danger'>Sair</a>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
    function alterarAcao(acao) {
        // Certifique-se de que um usuário foi selecionado
        let select = document.getElementById("nome_usuario");
        if (select.value === "") {
            alert("Por favor, escolha um usuário antes de continuar.");
            return false;
        }

        // Atualiza dinamicamente o valor do campo de ação
        document.getElementById('acao').value = acao;

        // Atualiza dinamicamente o valor do atributo 'formaction' com base na ação
        document.getElementById('meuFormulario').setAttribute('action', acao === 'editar' ? 'cadastro-salvar.php' : 'cadastro-excluir.php');

        // Submete o formulário
        document.getElementById('meuFormulario').submit();
    }

    function mostrarCargo() {
        let select = document.getElementById("nome_usuario");
        let cargoSelecionado = select.options[select.selectedIndex].getAttribute("data-cargo");
        
        // Atualiza o segundo select com o cargo selecionado
        document.getElementById("cargo_usuario").value = cargoSelecionado;
    }
</script>
    <?php 
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>