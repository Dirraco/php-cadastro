<h1>Editar cadastro</h1>
<?php
    include ('config.php');
    
        $sql = "SELECT * FROM usuario_dados WHERE id_usuario_dados=".@$_REQUEST['id_usuario_dados'];
        $res = $conn->query($sql);
        $row = $res->fetch_object();
?>
<form action="?page=marca-salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_usuario_dados" value="<?php print $row->id_usuario_dados; ?>">
    
    <div class="mb-3">
        <label>Nome do funcionario</label>
        <input type="text" name="nome_marca" value="<?php print $row->nome_marca; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>