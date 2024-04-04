<?php
if (isset($_POST["razao_social"]) && isset($_POST['cnpj'])  && isset($_POST["numero_contato"]) && isset($_POST["email"])) {

    // Recupera os dados do formulário
    $razao_social = $_POST["razao_social"];
    $cnpj = $_POST["cnpj"];
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
    $sql = "INSERT INTO fornecedores (razao_social, cnpj, numero_contato, email) VALUES ( ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $razao_social, $cnpj, $numero_contato, $email);

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