<?php

include("conexao.php");

<<<<<<< HEAD
if (isset($_POST['username']) || isset($_POST['fullname']) || isset($_POST['email']) || isset($_POST['password'])) {

=======
if(isset($_POST['username']) || isset($_POST['fullname']) || isset($_POST['email']) || isset($_POST['password'])) {
    
>>>>>>> 2ba88c1d19ce13ccd10b10f56cc6c5b377e6b198
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO `users` (`username`, `fullname`, `email`, `password`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $fullname, $email, $password);

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
    }

    // Fechar a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastrarUser.css">
    <title>Cadastro de Usuárioo</title>
</head>

<body>

    <div class="overlay"></div>

    <h2>CRIAR CONTA</h2>

    <form action="" method="POST" id="cadastroForm">
        <label for="nome">Nome de Usuário:</label>
        <input type="text" id="username" name="username" required>


        <label for="nome_completo">Nome Completo:</label>
        <input type="text" id="fullname" name="fullname" required>



        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>



        <label for="senha">Senha:</label>
        <input type="password" id="password" name="password" required>



        <input type="submit" value="Cadastrar">


=======
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form action="" method="POST" id="cadastroForm">
        <label for="nome">Nome de Usuário:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="nome_completo">Nome Completo:</label>
        <input type="text" id="fullname" name="fullname" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Cadastrar">
>>>>>>> 2ba88c1d19ce13ccd10b10f56cc6c5b377e6b198
    </form>

    <script>
        document.getElementById("cadastroForm").addEventListener("submit", function(event) {
<<<<<<< HEAD
            event.preventDefault();
=======
            event.preventDefault(); 
>>>>>>> 2ba88c1d19ce13ccd10b10f56cc6c5b377e6b198

            let formData = new FormData(this);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "cadastrarUser.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    window.location.href = "index.php";
                } else {
                    alert("Erro ao enviar formulário. Por favor, tente novamente.");
                }
            };
            xhr.send(formData);
        });
    </script>
</body>
<<<<<<< HEAD

=======
>>>>>>> 2ba88c1d19ce13ccd10b10f56cc6c5b377e6b198
</html>