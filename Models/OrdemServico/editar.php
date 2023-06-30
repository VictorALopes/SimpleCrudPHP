<h1>Editar Ordem de Serviço</h1>

<?php
$sql = "SELECT * FROM ordemservico WHERE id = {$_REQUEST['id']}";
$result = pg_query($conn, $sql);
$ordemservico = pg_fetch_object($result);
var_dump($ordemservico->id);
?>


<form action="?page=ordemSalvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php echo ($ordemservico->id); ?>">
    <div class="mb-3">
        <label> Data de abertura </label>
        <input type="text" name="idproduto" value="<?php echo ($ordemservico->dataabertura); ?>" class="form-control">
    </div>
    <div class="mb-6">
        <label> Nome do cliente </label>
        <input type="text" name="nomecliente" value="<?php echo ($ordemservico->nomecliente); ?>" class="form-control">
        <!-- </div>
    <div class="mb-3"> -->
        <label> CPF do cliente</label>
        <input type="text" name="cpfcliente" value="<?php echo ($ordemservico->cpfcliente); ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label> Produto </label>
        <input type="text" name="idproduto" value="<?php echo ($ordemservico->idproduto); ?>" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> Editar</button>
    </div>
</form>