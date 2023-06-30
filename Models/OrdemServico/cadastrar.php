<h1>Cadastrar Ordem de Serviço</h1>

<?php
$queryProdutos = "SELECT * FROM produto WHERE status = TRUE";
$result = pg_query($conn, $queryProdutos);
?>

<form action="?page=ordemSalvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label> Nome do cliente </label>
        <input type="text" name="nomecliente" class="form-control">
    </div>
    <div class="mb-3">
        <label> CPF do cliente</label>
        <input type="text" name="cpfcliente" class="form-control">
    </div>
    <div class="mb-3">
        <label> Produto </label>
        <select class="form-select" name="idproduto">
            <option selected>Selecione um produto</option>
            <?php
            while ($produto = pg_fetch_object($result)) {
                echo ("<option value='{$produto->id}'>{$produto->codigo} - {$produto->descricao}</option>");
            }
            ?>
        </select>

    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> Cadastrar</button>
    </div>
</form>