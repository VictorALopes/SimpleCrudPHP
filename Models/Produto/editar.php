<h1>Editar produto</h1>

<?php
$sql = "SELECT * FROM produto WHERE id = {$_REQUEST['id']}";
$result = pg_query($conn, $sql);
$produto = pg_fetch_object($result);
?>

<form action="?page=produtoSalvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php echo ($produto->id); ?>">
    <div class="mb-3">
        <label> Código </label>
        <input type="text" name="codigo" value="<?php echo ($produto->codigo); ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label> Descrição </label>
        <input type="text" name="descricao" value="<?php echo ($produto->descricao); ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label> Ativo? </label>
        <input type="checkbox" name="status" <?php echo ($produto->status === 't') ? " checked" : '' ?>>
    </div>
    <div class="mb-3">
        <label> Tempo de Garantia </label>
        <input type="text" name="tempogarantia" value="<?php echo ($produto->tempogarantia); ?>" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> Cadastrar</button>
    </div>
</form>