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

    <main class="container" style="display: flex; flex-direction: column; align-items: center;">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col">';
                    echo '<div class="card" style="width: 15rem;">';
                    echo '<img src="' . $row["img_path"] . '" class="card-img-top" height="240px" alt="' . $row["nome_produto"] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["nome_produto"] . '</h5>';
                    echo '<p class="card-text">' . $row["descricao"] . '</p>';
                    echo '<p>R$ ' . number_format($row["preco"], 2, ',', '.') . '</p>';
                    echo '<a href="#" class="btn btn-primary">Adicionar a Cesta</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col">';
                echo '<p>Nenhum produto encontrado.</p>';
                echo '</div>';
            }
            ?>
        </div>
    </main>
</body>

</html>




