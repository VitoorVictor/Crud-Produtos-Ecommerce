<?php

include ("bloqueio.php");
include ("conexao.php");

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
}

// Query para selecionar os produtos da tabela produtos
$sql = "SELECT nome_produto, descricao, preco, img_path FROM produtos";
$result = $conn->query($sql);

// Verifica se há algum resultado retornado pela consulta

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styleHome.css">
    <script src="scriptSideBar.js" defer></script>


</head>

<body>

    <header>
        <nav>
            <div class="nameCrud">
                <button class="openbtn" onclick="openNav()"><i class="fa-solid fa-bars"></i>GRÃFINO GRÃOS</button>
            </div>
            <div class="iconsCrud">
                <ul>
                    <li id="userSair">
                        <?php echo "Olá, " . ($_SESSION["username"]); ?>
                        <i class="fa-solid fa-user"></i>
                    </li>
                    <li>
                        <form action="" method="POST"><input type="submit" class="logout-btn " name="logout"
                                value="Sair"></form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Barra lateral -->
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="home.php">HOME</a>
        <a href="cadastrar.php">CADASTRAR</a>
        <a href="cesta.php">CESTA</a>
    </div>

    <main style="display: flex; flex-direction: column; align-items: center;">
        <?php
        $count = 0; // Inicializa o contador
        if ($result->num_rows > 0) {
            // Exibe os produtos
            echo '<div class="row">'; // Abre a primeira linha
            while ($row = $result->fetch_assoc()) {
                // Início do card
                echo '<div class="card" style="width: 15rem;">';

                // Exibe a imagem do produto
                echo '<img src="' . $row["img_path"] . '" class="card-img-top" height="240px" alt="' . $row["nome_produto"] . '">';

                echo '<div class="card-body">';

                // Exibe o nome do produto
                echo '<h5 class="card-title">' . $row["nome_produto"] . '</h5>';

                // Exibe a descrição do produto
                echo '<p class="card-text">' . $row["descricao"] . '</p>';

                // Exibe o preço do produto
                echo '<p>R$ ' . number_format($row["preco"], 2, ',', '.') . '</p>';

                // Exibe o preço do produto
                echo '<a href="#" class="btn btn-primary">Adicionar a Cesta</a>';

                // Fim do card
                echo '</div>';

                echo '</div>';
                $count++; // Incrementa o contador
                // Verifica se é o quarto produto da linha
                if ($count % 6 == 0 && $count != $result->num_rows) {
                    echo '</div><div class="row">'; // Fecha a linha atual e abre uma nova
                }
            }
            echo '</div>'; // Fecha a última linha
        } else {
            echo "Nenhum produto encontrado.";
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
        ?>
    </main>
</body>

</html>




<!--<section class="produtos">
            <h2>Nossos Produtos</h2>
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        </section>