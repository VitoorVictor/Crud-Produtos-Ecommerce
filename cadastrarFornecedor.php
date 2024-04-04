
<?php

include("conexao.php");
include("salvarCadastrarFornecedor.php");




?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Fornecedor</title>
</head>
<body>
    <h2>Cadastrar Fornecedor</h2>
    <form action="" method="POST">
        <label for="razao_social">Razão Social:</label><br>
        <input type="text" id="razao_social" name="razao_social" required><br><br>

        <label for="cnpj">CNPJ:</label><br>
        <input type="text" id="cnpj" name="cnpj" required><br><br>

        <label for="numero_contato">Número Contato:</label><br>
        <input type="text" id="numero_contato" name="numero_contato" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Cadastrar Fornecedor">
    </form>
</body>
</html>
