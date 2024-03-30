<?php

include ("bloqueio.php");
include ("conexao.php");
include ("removerCesta.php");

if (!isset($_SESSION)) {
    session_start();
}

//SELECT u.id,u.username,nome_produto,descricao,preco,img_path FROM cesta as c INNER JOIN produtos as p ON p.id = c.id_produto INNER JOIN users as u ON c.id_usuario = u.id WHERE u.id = 1;
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
    <link rel="stylesheet" href="styleCesta.css">
    <script src="scriptSideBar.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <style>
        .search-bar {
            display: flex;
            align-items: center;
            margin-left: 10px;
            /* Margem esquerda */
            margin-right: 10px;
            /* Margem direita */
        }

        .search-input {
            flex-grow: 1;
            /* Ocupa todo o espaço disponível */
            margin-left: 10px;
            /* Espaço entre o ícone e o campo de pesquisa */
        }
    </style>
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
    <div class="search-bar">
        <i class="fas fa-search search-icon"></i> <!-- Ícone de pesquisa -->
        <input type="text" class="search-input form-control" placeholder="Pesquisar...">
    </div>
    <main>

        <div class="container">
            <div class="row">
                <?php
                

                $userId = $_SESSION['id']; // Supondo que o ID do usuário esteja armazenado na sessão
                $sql = ("SELECT p.id,nome_produto,descricao,preco,img_path FROM cesta as c INNER JOIN produtos as p ON p.id = c.id_produto INNER JOIN users as u ON c.id_usuario = u.id WHERE u.id = $userId ;");

                $result = $conn->query($sql);


                // Verifica se a consulta retornou resultados
                if ($result->num_rows > 0) {
                    // Itera sobre os resultados
                    while ($linha = $result->fetch_assoc()) {
                        // Armazena cada valor em uma variável
                        $nome_produto = $linha['nome_produto'];
                        $descricao = $linha['descricao'];
                        $preco = $linha['preco'];
                        $img_path = $linha['img_path'];
                        $idProduto = $linha['id'];
                        echo '<div class="col-md-12">';
                        echo '<div class="card-container" style="padding: 20px;">';
                        echo '<div class="myCard" style="width: 100%;background-color: rgb(209, 209, 209);border-radius: 7px;padding: 1rem; margin: 10px;justify-content: space-between;display: flex;flex-direction: row;">';
                        echo '<img src="' . $img_path . '" alt="" style="margin-right: 1rem;height: auto;max-width: 100px;align-self: center;">';
                        echo '<div class="myContainer" style="display: flex;flex-direction: column;flex-grow: 1;">';
                        echo '<h2 style="font-size: 16px;margin: 0;">' . $nome_produto . '</h2>';
                        echo '<p> ' . $descricao . '</p>';
                        echo '</div>';
                        echo '<div class="removeBtn" style="display: flex;flex-direction: column;align-items: flex-end;justify-content: space-between;">';
                        echo '<div class="price" style="color: red;">';
                        echo '<h2 style="font-size: 16px;margin: 0;">R$' . $preco . '</h2>';
                        echo '</div>';
                        echo '<a href="#" class="btn btn-danger btn-remove-from-basket" data-product-id="' . $idProduto . '">Remover da Cesta</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "Nenhum resultado encontrado.";
                } $conn->close();
                ?>
            </div>
        </div>
    </main>
    <script>
    $(document).ready(function () {
        $('.btn-remove-from-basket').click(function (e) {
            e.preventDefault();
            let productId = $(this).data('product-id'); // Obtém o ID do produto do atributo data-product-id

            // Envia a solicitação AJAX
            $.ajax({
                type: 'POST',
                url: 'removerCesta.php', // Rota no lado do servidor para remover da cesta
                data: { productId: productId }, // Envia o ID do produto
                success: function (response) {
                    location.reload(); // Recarrega a página para atualizar a cesta
                },
                error: function (xhr, status, error) {
                    console.error(error); // Exibe erros no console
                }
            });
        });
    });
</script>
</body>

</html>