
<?php

include_once("conexao.php");

if (isset($_POST["razao_social"]) && isset($_POST['cnpj']) && isset($_POST['nome_fantasia']) && isset($_POST['rua']) && isset($_POST["bairro"]) && isset($_POST['numero_endereco']) && isset($_POST['cep']) && isset($_POST["numero_contato"]) && isset($_POST["email"])) {

    // Recupera os dados do formulário
    $razao_social = $_POST["razao_social"];
    $cnpj = $_POST["cnpj"];
    $nome_fantasia = $_POST["nome_fantasia"];
    $rua = $_POST["rua"];
    $bairro = $_POST["bairro"];
    $numero_endereco = $_POST["numero_endereco"];
    $cep = $_POST["cep"];
    $numero_contato = $_POST["numero_contato"];
    $email = $_POST["email"];

    $sql_check = "SELECT * FROM fornecedores WHERE cnpj = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $cnpj);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    
    if ($result_check->num_rows > 0) {
        echo "<script>alert('Já existe um produto registrado com o mesmo código de operacão.');</script>";
    }

    // Prepara a consulta SQL para inserir os dados na tabela fornecedores
    $sql = "INSERT INTO fornecedores (razao_social, cnpj, nome_fantasia, rua, bairro, numero_endereco, cep, numero_contato, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $razao_social, $cnpj, $nome_fantasia, $rua, $bairro, $numero_endereco, $cep, $numero_contato, $email);

    $stmt->execute();
    // Executa a consulta preparada
    if ($stmt->affected_rows > 0) {
        echo "";
        header("Location: home.php");
    } else {
        echo "<script>alert('Erro ao cadastrar o fornecedor.');</script>" . $stmt->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} 
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
