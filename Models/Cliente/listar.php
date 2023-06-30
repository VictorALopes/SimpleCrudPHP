<?php
$sql = "SELECT * FROM cliente";

$result = pg_query($conn, $sql);

if ($result) {
    $html = "<table class='table table-hover table-striped table-bordered'>";
    $html .= "<tr>";
    $html .= "<th>#</th>";
    $html .= "<th>Nome</th>";
    $html .= "<th>CPF</th>";
    $html .= "<th>Endereco</th>";
    $html .= "<th>Ações</th>";
    $html .= "</tr>";
    echo ($html);

    while ($row = pg_fetch_object($result)) {
        $htmlBotoes = "<button onclick=\"location.href='?page=clienteEditar&id={$row->id}'\" class='btn btn-success'>Editar</button> 
        <button onclick=\"if(confirm('Prosseguir com exclusão?')){location.href='?page=clienteSalvar&acao=excluir&id={$row->id}';}else{false;}\" class='btn btn-danger'>Excluir</button>";

        echo ("<tr>");
        echo ("<td>{$row->id}</td>");
        echo ("<td>{$row->nome}</td>");
        echo ("<td>{$row->cpf}</td>");
        echo ("<td>{$row->endereco}</td>");
        echo ("<td>{$htmlBotoes}</td>");
        echo ("</tr>");
    }

    echo ("</table>");
} else {
    echo ("<p> Nenhum cliente cadastrado </p>");
}
