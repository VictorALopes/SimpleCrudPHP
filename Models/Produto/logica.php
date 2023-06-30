<?php

$codigo = trim($_POST["codigo"]);
$descricao = trim($_POST["descricao"]);
$status = ($_POST["status"]) ?  'true' : 'false';
$tempogarantia = trim($_POST["tempogarantia"]);

switch (@$_REQUEST["acao"]) {
    case 'cadastrar':
        if (!validaParametrosObrigatorios($codigo, $descricao)) {
            break;
        }

        $sql = "INSERT INTO produto (codigo, descricao, status, tempogarantia) VALUES ( '{$codigo}', '{$descricao}
            ', '{$status}', '{$tempogarantia}' )";
        $result = pg_query($conn, $sql);

        if ($result) {
            echo MensagemPopUp("Produto cadastrado com sucesso");
            echo RedirecionarPara("produtoListar");
        } else {
            echo MensagemPopUp("Erro ao cadastrar produto, tente novamente.");
            echo RedirecionarPara("produtoListar");
        }
        break;
    case 'editar':
        if (!validaParametrosObrigatorios($codigo, $descricao)) {
            break;
        }
        $sql = "UPDATE produto SET codigo='{$codigo}', descricao='{$descricao}', status='$status' , tempogarantia='$tempogarantia' 
            WHERE id = {$_REQUEST['id']}";

        $result = pg_query($conn, $sql);

        if ($result) {
            echo MensagemPopUp("Produto atualizado com sucesso");
            echo RedirecionarPara("produtoListar");
        } else {
            echo MensagemPopUp("Erro ao atualizar produto, tente novamente.");
            echo RedirecionarPara("produtoListar");
        }
        break;
    case 'excluir':
        $sql = "DELETE FROM produto WHERE id = {$_REQUEST['id']}";
        $result = pg_query($conn, $sql);

        if ($result) {
            echo MensagemPopUp("Produto excluído");
            echo RedirecionarPara("produtoListar");
        } else {
            echo MensagemPopUp("Erro ao excluir produto, tente novamente.");
            echo RedirecionarPara("produtoListar");
        }
        break;
    default:
        break;
}


function validaParametrosObrigatorios(string $codigo, string $descricao)
{
    if (empty($codigo) or empty($descricao)) {
        echo MensagemPopUp("Dados inválidos, verifique o código e a descrição.");
        echo RedirecionarPara("produtoListar");
        return false;
    }

    return true;
}
