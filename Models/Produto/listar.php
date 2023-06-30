<?php
$sql = "SELECT * FROM produto";

$result = pg_query($conn, $sql);

if ($result) {
    $html = "<table class='table table-hover table-striped table-bordered'>";
    $html .= "<tr>";
    $html .= "<th>#</th>";
    $html .= "<th>Código</th>";
    $html .= "<th>Descrição</th>";
    $html .= "<th>Ativo</th>";
    $html .= "<th>Tempo de garantia</th>";
    $html .= "<th>Ações</th>";
    $html .= "</tr>";
    echo ($html);

    while ($row = pg_fetch_object($result)) {
        $htmlBotoes = "<button onclick=\"location.href='?page=produtoEditar&id={$row->id}'\" class='btn btn-success'>Editar</button> 
        <button onclick=\"if(confirm('Prosseguir com exclusão?')){location.href='?page=produtoSalvar&acao=excluir&id={$row->id}';}else{false;}\" class='btn btn-danger'>Excluir</button>";

        echo ("<tr>");
        echo ("<td>{$row->id}</td>");
        echo ("<td>{$row->codigo}</td>");
        echo ("<td>{$row->descricao}</td>");
        echo ($row->status === 't') ? "<td><input type='checkbox' checked disabled></td>" : "<td><input type='checkbox' disabled></td>";
        echo ("<td>{$row->tempogarantia}</td>");
        echo ("<td>{$htmlBotoes}</td>");
        echo ("</tr>");
    }

    echo ("</table>");
} else {
    echo ("<p> Nenhum produto cadastrado </p>");
}
