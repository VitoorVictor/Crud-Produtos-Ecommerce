<?php

include ("bloqueio.php");
include ("conexao.php");
include ("salvarCadastrarProduto.php");
include ("consultaFornecedor.php");
include ("salvarCadastrarFornecedor.php");
function generateProductForm($result) {
    // Início do formulário
    echo '<form action="" method="POST" enctype="multipart/form-data">';
    echo '<label for="codigo_operacao">Código de Operação:</label><br>';
    echo '<input type="text" id="codigo_operacao" name="codigo_operacao" required><br><br>';
    echo '<label for="nome">Nome:</label><br>';
    echo '<input type="text" id="nome" name="nome" required><br><br>';
    echo '<label for="descricao">Descricao:</label><br>';
    echo '<input type="text" id="descricao" name="descricao" required><br><br>';
    echo '<label for="fornecedor">Fornecedor:</label><br>';
    echo '<select id="fornecedor" name="fornecedor" required>';
    echo '<option value="" disabled selected>Selecione um fornecedor</option>';

    // Loop através dos resultados da consulta para criar opções para cada fornecedor
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["nome_fantasia"] . '">' . $row["nome_fantasia"] . '</option>';
    }

    echo '</select><br><br>';
    echo '<label for="preco">Preço:</label><br>';
    echo '<input type="number" id="preco" name="preco" step="0.01" required><br><br>';
    echo '<label for="file">Selecione o arquivo:</label><br>';
    echo '<input type="file" id="file" name="file" required><br><br>';
    echo '<label for="preview">Veja a preview da imagem:</label><br>';
    echo '<img id="preview" src="#" alt="Preview da Imagem" class="hidden" height="90px"><br><br>';
    echo '<input type="submit" value="Enviar">';
    echo '</form>';
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styleCadastrar.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>

    <header>
        <nav>
            <div class="nameCrud">
                <button class="openbtn" onclick="openNav()"><i class="fa-solid fa-bars"></i>GRÃFINO GRÃOS</button>
            </div>
            <div class="iconsCrud">
                <ul>
                    <li id="userSair">
                        <?php echo "Olá, " . ($_SESSION["username"]); ?>
                        <i class="fa-solid fa-user"></i>
                    </li>
                    <li>
                        <form action="" method="POST"><input type="submit" class="logout-btn " name="logout"
                                value="Sair"></form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Barra lateral -->
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="home.php">HOME</a>
        <a href="cadastrar.php">CADASTRAR</a>
        <a href="cesta.php">CESTA</a>
    </div>

    <div class="options">
        <div>
            <ul>
                <li><a href="javascript:void(0)" onclick="toggleCadastro('produto')">Produtos</a></li>
                <li><a href="javascript:void(0)" onclick="toggleCadastro('fornecedor')">Fornecedores</a></li>
            </ul>
        </div>
        <div id="conteudoCadastroProduto" style="background-color: lightgray; display: none;">
            <?php generateProductForm($result); ?>
        </div>
        <div id="conteudoCadastroFornecedor" style="background-color: lightgray; display: none;"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    let conteudoCadastroProdutoDiv = document.getElementById("conteudoCadastroProduto");
    let conteudoCadastroFornecedorDiv = document.getElementById("conteudoCadastroFornecedor");
    let produtoVisivel = false; // Variável para rastrear o estado de exibição do formulário de produto
    let fornecedorVisivel = false; // Variável para rastrear o estado de exibição do formulário de fornecedor

    function toggleCadastro(tipo) {
        if (tipo === 'produto') {
            if (produtoVisivel) {
                hideCadastroProduto();
            } else {
                showCadastroProduto();
            }
            hideCadastroFornecedor();
        } else if (tipo === 'fornecedor') {
            if (fornecedorVisivel) {
                hideCadastroFornecedor();
            } else {
                showCadastroFornecedor();
            }
            hideCadastroProduto();
        }
    }

    function showCadastroProduto() {
        conteudoCadastroProdutoDiv.style.display = "block";
        produtoVisivel = true;
    }

    function hideCadastroProduto() {
        conteudoCadastroProdutoDiv.style.display = "none";
        produtoVisivel = false;
    }

    function showCadastroFornecedor() {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                conteudoCadastroFornecedorDiv.innerHTML = this.responseText;
                conteudoCadastroFornecedorDiv.style.display = "block";
            }
        };
        xhttp.open("GET", "cadastrarFornecedor.php", true);
        xhttp.send();
        fornecedorVisivel = true;
    }

    function hideCadastroFornecedor() {
        conteudoCadastroFornecedorDiv.innerHTML = '';
        conteudoCadastroFornecedorDiv.style.display = "none";
        fornecedorVisivel = false;
    }

    $(document).ready(function () {
        $('#file').change(function (e) {
            let file = e.target.files[0];
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
                $('#preview').removeClass('hidden');
            }
            reader.readAsDataURL(file);
        });
    });
</script>

    <script src="scriptSideBar.js" defer></script>
</body>

</html>