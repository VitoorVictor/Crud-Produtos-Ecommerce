<?php
require_once("conexao.php");

class RemoverCesta {
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConnection();
    }

    public function removerProduto($userId, $productId) {
        try {
            // Prepara a consulta SQL
            $stmt = $this->conn->prepare("DELETE FROM cesta WHERE id_usuario = :userId AND id_produto = :productId");

            // Associa os parâmetros
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);

            // Executa a consulta
            $stmt->execute();

            // Verifica se a consulta foi executada com sucesso
            if ($stmt->rowCount() > 0) {
                return "Produto removido da cesta com sucesso!";
            } else {
                return "O produto não foi encontrado na cesta.";
            }
        } catch (PDOException $e) {
            return "Erro ao remover o produto da cesta: " . $e->getMessage();
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productId'])) {
    session_start();

    $removerCesta = new RemoverCesta();
    $userId = $_SESSION['id'];
    $productId = $_POST['productId'];
    echo $removerCesta->removerProduto($userId, $productId);

    // Fecha a conexão (opcional, pois a conexão será fechada automaticamente quando o objeto for destruído)
    // $removerCesta->closeConnection();
}
?>
