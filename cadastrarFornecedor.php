
<?php

include_once("conexao.php");
include_once("salvarCadastrarFornecedor.php");
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

        <label for="nome_fantasia">Nome Fantasia:</label><br>
        <input type="text" id="nome_fantasia" name="nome_fantasia" required><br><br>

        <label for="rua">Rua:</label><br>
        <input type="text" id="rua" name="rua" required><br><br>

        <label for="bairro">Bairro:</label><br>
        <input type="text" id="bairro" name="bairro" required><br><br>

        <label for="numero_endereco">Número Endereço:</label><br>
        <input type="text" id="numero_endereco" name="numero_endereco" required><br><br>

        <label for="cep">CEP:</label><br>
        <input type="text" id="cep" name="cep" required><br><br>

        <label for="numero_contato">Número Contato:</label><br>
        <input type="text" id="numero_contato" name="numero_contato" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Cadastrar Fornecedor">
    </form>
</body>
</html>
