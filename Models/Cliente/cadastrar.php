<h1>Cadastrar cliente</h1>
<form action="?page=clienteSalvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label> Nome </label>
        <input type="text" name="nome" class="form-control">
    </div>
    <div class="mb-3">
        <label> CPF </label>
        <input type="text" name="cpf" class="form-control">
    </div>
    <div class="mb-3">
        <label> Endereco </label>
        <input type="text" name="endereco" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> Cadastrar</button>
    </div>
</form>