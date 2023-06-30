<h1>Cadastrar produto</h1>
<form action="?page=produtoSalvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label> Código </label>
        <input type="text" name="codigo" class="form-control">
    </div>
    <div class="mb-3">
        <label> Descrição </label>
        <input type="text" name="descricao" class="form-control">
    </div>
    <div class="mb-3">
        <label> Ativo? </label>
        <input type="checkbox" name="status">
    </div>
    <div class="mb-3">
        <label> Tempo de Garantia </label>
        <input type="text" name="tempogarantia" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> Cadastrar</button>
    </div>
</form>