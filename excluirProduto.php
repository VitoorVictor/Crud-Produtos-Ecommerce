<?php
include("conexao.php");
include("bloqueio");

// Verifique se o ID do produto foi recebido
if (isset($_POST['productId'])) {
    // Inclua o arquivo de conexão com o banco de dados
    // Prepare e execute a consulta para excluir o produto
    $productId = $_POST['productId'];
    $sql = "DELETE FROM produtos WHERE id = $productId";

    if ($conn->query($sql) === TRUE) {
        echo "Produto excluído com sucesso";
    } else {
        echo "Erro ao excluir o produto: " . $conn->error;
    }

    // Feche a conexão com o banco de dados
    $conn->close();
} else {
    echo "ID do produto não recebido";
}
