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

    $stmt = $conn->prepare("DELETE FROM cesta WHERE id_usuario = ? AND id_produto = ?");
    $stmt->bind_param("ii", $userId, $productId);

    if ($stmt->execute()) {
        echo "Produto removido da cesta com sucesso!";
    } else {
        echo "Erro ao remover o produto da cesta: " . $stmt->error;
    }
    $stmt->close();
}
