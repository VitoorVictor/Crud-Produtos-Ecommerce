<?php
if (isset($_POST["codigo_operacao"]) && isset($_POST['nome']) && isset($_POST['fornecedor']) && isset($_POST['preco']) && isset($_FILES["file"])) {
    $codigo_operacao = $_POST["codigo_operacao"];
    $nome = $_POST["nome"];
    $fornecedor = $_POST["fornecedor"];
    $preco = $_POST["preco"];
    $file = $_FILES["file"];

    // Verificar se já existe um registro com o mesmo código de operação
    $sql_check = "SELECT * FROM produtos WHERE codigo_operacao = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $codigo_operacao);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    
    if ($result_check->num_rows > 0) {
        echo "<script>alert('Já existe um produto registrado com o mesmo código de operacão.');</script>";
    } else {
        if ($file["error"]) {
            die("Falha no processo de enviar o arquivo");
        }
        if ($file["size"] > 2097152) {
            die("Arquivo muito grande. Max: 2MB");
        }
        $pasta = "arquivos/";
        $id_unico = uniqid();
        $nameFile = $id_unico . $file["name"];
        $extensao = strtolower(pathinfo($nameFile, PATHINFO_EXTENSION));
        
        
        if ($extensao != "jpg" && $extensao != "png") {
            die("Formato de arquivo inválido");
        }
        $path = $pasta . $nameFile;

        $saved = move_uploaded_file($file["tmp_name"], $path);

        if ($saved) {
            // Prepara a consulta SQL para inserir o novo produto
            $sql_insert = "INSERT INTO produtos (codigo_operacao, nome_produto, preco, fornecedor, img_path) VALUES (?, ?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("sssss", $codigo_operacao, $nome, $preco, $fornecedor, $path);
            
            // Executa a instrução preparada para inserir o novo produto
            $stmt_insert->execute();

            // Verifica se a inserção foi bem-sucedida
            if ($stmt_insert->affected_rows > 0) {
                echo "";
            } else {
                echo "<script>alert('Ocorreu um erro ao cadastrar o produto.');</script>";
            }

            // Fecha a instrução preparada
            $stmt_insert->close();
        } else {
            echo "<p>Falha ao enviar o arquivo.</p>";
        }
    }
}