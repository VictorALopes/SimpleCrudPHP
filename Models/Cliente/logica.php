<?php

$nome = trim($_POST["nome"]);
$cpf = trim($_POST["cpf"]);
$endereco = trim($_POST["endereco"]);

switch (@$_REQUEST["acao"]) {
    case 'cadastrar':
        if (!validaParametrosObrigatorios($nome, $cpf)) {
            break;
        }

        $sql = "INSERT INTO cliente (nome, cpf, endereco) VALUES ( '{$nome}', '{$cpf}', '{$endereco}' )";
        $result = pg_query($conn, $sql);

        if ($result) {
            echo MensagemPopUp("Cliente cadastrado com sucesso");
            echo RedirecionarPara("clienteListar");
        } else {
            echo MensagemPopUp("Erro ao cadastrar cliente, tente novamente.");
            echo RedirecionarPara("clienteListar");
        }
        break;
    case 'editar':
        if (!validaParametrosObrigatorios($nome, $cpf)) {
            break;
        }
        $sql = "UPDATE cliente SET nome='{$nome}', cpf='{$cpf}', endereco='$endereco' WHERE id = {$_REQUEST['id']}";
        $result = pg_query($conn, $sql);

        if ($result) {
            echo MensagemPopUp("Cliente atualizado com sucesso");
            echo RedirecionarPara("clienteListar");
        } else {
            echo MensagemPopUp("Erro ao atualizar cliente, tente novamente.");
            echo RedirecionarPara("clienteListar");
        }
        break;
    case 'excluir':
        $sql = "DELETE FROM cliente WHERE id = {$_REQUEST['id']}";
        $result = pg_query($conn, $sql);

        if ($result) {
            echo MensagemPopUp("Cliente excluído");
            echo RedirecionarPara("clienteListar");
        } else {
            echo MensagemPopUp("Erro ao excluir cliente, tente novamente.");
            echo RedirecionarPara("clienteListar");
        }
        break;
    default:
        break;
}


function validaParametrosObrigatorios(string $nome, string $cpf)
{
    if (empty($nome) or empty($cpf)) {
        echo MensagemPopUp("Dados inválidos, verifique o nome e o CPF.");
        echo RedirecionarPara("clienteListar");
        return false;
    }

    return true;
}
