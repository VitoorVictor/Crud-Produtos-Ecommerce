<?php
include("conexao.php");

// Verifique se o ID do produto foi recebido
if (isset($_POST['id'])) {
    // Prevenir injeção SQL
    $productId = mysqli_real_escape_string($conn, $_POST['id']);
    
    // Prepare e execute a consulta para excluir o produto
    $sql = "DELETE FROM produtos WHERE id = $productId";

    if ($conn->query($sql) === TRUE) {
        echo "Produto excluído com sucesso";
    } else {
        echo "Erro ao excluir o produto: " . $conn->error;
    }
} else {
    echo "ID do produto não recebido";
}

// Feche a conexão com o banco de dados
$conn->close();
?>
