<?php

include ("conexao.php");
include ("salvarCadastrarProduto.php");
include ("consultaFornecedor.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#file').change(function (e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                $('#preview').removeClass('hidden');
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
            });
        });
    </script>

</head>


<body>
    <div class="produtosDiv">
    <?php
    if ($result->num_rows > 0) {
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
        echo '<img  id="preview" src="#"  height="90px" class="hidden"><br><br>';
        echo '<input type="submit" value="Enviar">';
        echo '</form>';
    } else {
        echo "Nenhum fornecedor encontrado.";
    }
    ?>
    </div>

</body>

</html>