<?php
$sql = "SELECT * FROM ordemservico";

$result = pg_query($conn, $sql);

if ($result) {
    $html = "<table class='table table-hover table-striped table-bordered'>";
    $html .= "<tr>";
    $html .= "<th>#</th>";
    $html .= "<th>Data de abertura</th>";
    $html .= "<th>Nome do cliente</th>";
    $html .= "<th>CPF do cliente</th>";
    $html .= "<th>Descrição do produto</th>";
    $html .= "<th>Ações</th>";
    $html .= "</tr>";
    echo ($html);

    while ($row = pg_fetch_object($result)) {
        $htmlBotoes = "<button onclick=\"location.href='?page=ordemEditar&id={$row->id}'\" class='btn btn-success'>Editar</button> 
        <button onclick=\"if(confirm('Prosseguir com exclusão?')){location.href='?page=ordemSalvar&acao=excluir&id={$row->id}';}else{false;}\" class='btn btn-danger'>Excluir</button>";

        echo ("<tr>");
        echo ("<td>{$row->id}</td>");
        echo ("<td>{$row->dataabertura}</td>");
        echo ("<td>{$row->nomecliente}</td>");
        echo ("<td>{$row->cpfcliente}</td>");
        echo ("<td>{$row->idproduto}</td>");
        echo ("<td>{$htmlBotoes}</td>");
        echo ("</tr>");
    }

    echo ("</table>");
} else {
    echo ("<p> Nenhuma ordem cadastrada </p>");
}
