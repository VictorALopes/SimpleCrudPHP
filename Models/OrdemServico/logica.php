<?php

$dataabertura = date("d/m/Y");
$nomecliente = trim($_POST["nomecliente"]);
$cpfcliente = trim($_POST["cpfcliente"]);
$idproduto = $_POST["idproduto"];

switch (@$_REQUEST["acao"]) {
    case 'cadastrar':
        if (!validaParametrosObrigatorios($nomecliente, $cpfcliente)) {
            break;
        }

        //regra de inserir o cliente
        $clienteExiste = confereCliente($nomecliente, $cpfcliente, $conn);

        if (!$clienteExiste) {
            inserirCliente($nomecliente, $cpfcliente, $conn, $idCliente);
        }
        //regra de inserir o cliente

        $sql = "INSERT INTO ordemservico (dataabertura, nomecliente, cpfcliente, idproduto) VALUES ( '{$dataabertura}', '{$nomecliente}
                ', '{$cpfcliente}', '{$idproduto}' )";
        $result = pg_query($conn, $sql);

        if ($result) {
            echo MensagemPopUp("Ordem de serviço cadastrado com sucesso");
            echo RedirecionarPara("ordemListar");
        } else {
            echo MensagemPopUp("Erro ao cadastrar ordem de serviço, tente novamente.");
            echo RedirecionarPara("ordemListar");
        }
        break;
    case 'editar':
        if (!validaParametrosObrigatorios($nomecliente, $cpfcliente)) {
            break;
        }

        //regra de inserir o cliente
        $clienteExiste = confereCliente($nomecliente, $cpfcliente, $conn);

        if (!$clienteExiste) {
            inserirCliente($nomecliente, $cpfcliente, $conn, $idCliente);
        }
        //regra de inserir o cliente

        $sql = "UPDATE ordemservico SET dataabertura='{$dataabertura}', nomecliente='{$nomecliente}', cpfcliente='$cpfcliente' , idproduto='$idproduto' 
                WHERE id = {$_REQUEST['id']}";

        $result = pg_query($conn, $sql);

        if ($result) {
            echo MensagemPopUp("Ordem de serviço atualizada com sucesso");
            echo RedirecionarPara("ordemListar");
        } else {
            echo MensagemPopUp("Erro ao atualizar ordem de serviço, tente novamente.");
            echo RedirecionarPara("ordemListar");
        }
        break;
    case 'excluir':
        $sql = "DELETE FROM ordemservico WHERE id = {$_REQUEST['id']}";
        $result = pg_query($conn, $sql);

        if ($result) {
            echo MensagemPopUp("Ordem de serviço excluída");
            echo RedirecionarPara("ordemListar");
        } else {
            echo MensagemPopUp("Erro ao excluir ordem de serviço, tente novamente.");
            echo RedirecionarPara("ordemListar");
        }
        break;
    default:
        echo ("aoba blz?");
        break;
}


function validaParametrosObrigatorios(string $nomecliente, string $cpfcliente)
{
    if (empty($nomecliente) or empty($cpfcliente)) {
        echo MensagemPopUp("Dados inválidos, verifique o nome e o CPF.");
        echo RedirecionarPara("ordemListar");
        return false;
    }

    return true;
}


function inserirCliente(string $nomecliente, string $cpfcliente, $conn, &$idCliente)
{
    $sql = "INSERT INTO cliente (nome, cpf) VALUES ( '{$nomecliente}', '{$cpfcliente}') RETURNING id";
    $result = pg_query($conn, $sql);

    if ($result) {
        echo MensagemPopUp("Cliente não encontrado e foi cadastrado automaticamente.");
        $idCliente = pg_fetch_object($result); //Aqui eu pego o id do cliente que foi inserido e retorno para a função.
        //esse id não é inserido na ordem de serviço pois inicialmente eu salvei na tabela o nome e o cpf do cliente,
        // não deu tempo de corrigir essa estrutura.
    } else {
        echo MensagemPopUp("Cliente não encontrado. Houve um erro ao cadastrar cliente, tente novamente.");
        echo RedirecionarPara("ordemListar");
    }
}

function confereCliente(string $nomecliente, string $cpfcliente, $conn)
{
    $sql = "SELECT * FROM cliente WHERE nome = '{$nomecliente}' AND cpf = '{$cpfcliente}' ";
    $result = pg_query($conn, $sql);
    $clienteRow = pg_fetch_object($result);

    return $clienteRow ? true : false;
}
