<?php

class Fornecedor {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function cadastrarFornecedor($razao_social, $cnpj, $numero_contato, $email) {
        try {
            // Verifica se já existe um fornecedor com o mesmo CNPJ
            $stmt_check = $this->conn->prepare("SELECT * FROM fornecedores WHERE cnpj = ?");
            $stmt_check->execute([$cnpj]);
            $result_check = $stmt_check->fetch(PDO::FETCH_ASSOC);

            if ($result_check) {
                return "Já existe um fornecedor registrado com o mesmo CNPJ.";
            } else {
                // Prepara a consulta SQL para inserir os dados na tabela fornecedores
                $stmt = $this->conn->prepare("INSERT INTO fornecedores (razao_social, cnpj, numero_contato, email) VALUES (?, ?, ?, ?)");
                $stmt->execute([$razao_social, $cnpj, $numero_contato, $email]);

                // Verifica se a inserção foi bem-sucedida
                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return "Erro ao cadastrar o fornecedor.";
                }
            }
        } catch (PDOException $e) {
            return "Erro ao executar a operação: " . $e->getMessage();
        }
    }
}

// Verifica se os dados do formulário foram enviados via POST
if (isset($_POST["razao_social"]) && isset($_POST['cnpj']) && isset($_POST["numero_contato"]) && isset($_POST["email"])) {
    $razao_social = $_POST["razao_social"];
    $cnpj = $_POST["cnpj"];
    $numero_contato = $_POST["numero_contato"];
    $email = $_POST["email"];

    // Instancia a classe Fornecedor
    $fornecedor = new Fornecedor($conn);

    // Chama o método para cadastrar o fornecedor
    $result = $fornecedor->cadastrarFornecedor($razao_social, $cnpj, $numero_contato, $email);

    // Verifica o resultado da operação e exibe mensagens adequadas
    if ($result === true) {
        header("Location: home.php");
        exit(); // Termina o script após redirecionar
    } else {
        echo "<script>alert('" . $result . "');</script>";
    }
}
?>
