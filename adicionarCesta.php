<?php
include("bloqueio.php");
include("conexao.php");

if (!isset($_SESSION)) {
    session_start();
}

    // Verifica se o ID do produto foi enviado via POST
if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    $userId = $_SESSION['id'];

                    // Verifica se o produto já está na cesta
            $check_sql = "SELECT * FROM cesta WHERE id_usuario = '$userId' AND id_produto = '$productId'";
            $check_result = $conn->query($check_sql);
            
    if ($check_result->num_rows > 0) {
                echo "Este produto já está na sua cesta.";
            } else {
                // Insere o produto na tabela cesta se não estiver na cesta
                $insert_sql = "INSERT INTO cesta (id_usuario, id_produto) VALUES ('$userId', '$productId')";

                if ($conn->query($insert_sql) === TRUE) {
                    echo "Produto adicionado à cesta com sucesso!";
                } else {
                    echo "Erro ao adicionar o produto à cesta: " . $conn->error;
        }
    }
} else {
    echo "ID do produto não recebido.";
}
?>
