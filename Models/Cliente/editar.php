<h1>Editar cliente</h1>
<?php
$sql = "SELECT * FROM cliente WHERE id = {$_REQUEST['id']}";
$result = pg_query($conn, $sql);
$cliente = pg_fetch_object($result);
?>

<form action="?page=clienteSalvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php echo ($cliente->id); ?>">
    <div class="mb-3">
        <label> Nome </label>
        <input type="text" name="nome" value="<?php echo ($cliente->nome); ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label> CPF </label>
        <input type="text" name="cpf" class="form-control" value="<?php echo ($cliente->cpf); ?>">
    </div>
    <div class="mb-3">
        <label> Endereco </label>
        <input type="text" name="endereco" class="form-control" value="<?php echo ($cliente->endereco); ?>">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> Atualizar</button>
    </div>
</form>