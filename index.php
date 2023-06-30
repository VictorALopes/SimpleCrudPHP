<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de controle de OS</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Clientes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=clienteCadastrar">Cadastrar cliente</a></li>
                            <li><a class="dropdown-item" href="?page=clienteListar">Listar clientes</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Produtos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=produtoCadastrar">Cadastrar produto</a></li>
                            <li><a class="dropdown-item" href="?page=produtoListar">Listar produtos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ordens de serviço
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=ordemCadastrar">Cadastrar OS</a></li>
                            <li><a class="dropdown-item" href="?page=ordemListar">Listar OS</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <?php
                include("util.php");

                switch (@$_REQUEST["page"]) {
                    case 'clienteCadastrar':
                        include("Models/Cliente/cadastrar.php");
                        break;
                    case 'clienteListar':
                        include("Models/Cliente/listar.php");
                        break;
                    case 'clienteEditar':
                        include("Models/Cliente/editar.php");
                        break;
                    case 'clienteSalvar':
                        include("Models/Cliente/logica.php");
                        break;
                    case 'produtoCadastrar':
                        include("Models/Produto/cadastrar.php");
                        break;
                    case 'produtoListar':
                        include("Models/Produto/listar.php");
                        break;
                    case 'produtoEditar':
                        include("Models/Produto/editar.php");
                        break;
                    case 'produtoSalvar':
                        include("Models/Produto/logica.php");
                        break;
                    case 'ordemCadastrar':
                        include("Models/OrdemServico/cadastrar.php");
                        break;
                    case 'ordemSalvar':
                        include("Models/OrdemServico/logica.php");
                        break;
                    case 'ordemEditar':
                        include("Models/OrdemServico/editar.php");
                        break;
                    case 'ordemListar':
                        include("Models/OrdemServico/listar.php");
                        break;
                    default:
                        echo ("opa");
                        break;
                }
                ?>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>