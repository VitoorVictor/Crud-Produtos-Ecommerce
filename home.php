<?php

include ("bloqueio.php");

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
}

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


</head>

<body>

    <header>
        <nav>
            <div class="nameCrud">
                <h2>SUPER CRUD</h2>
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="iconsCrud">
                <ul>
                    <li><i class="fa-solid fa-cart-shopping"></i></li>
                    <li id="userSair"><i class="fa-solid fa-user"></i>
                        <?php echo ($_SESSION["username"]); ?> </a>
                        <form action="" method="POST">
                            <input type="submit" name="logout" value="Sair">
                        </form>
                    </li>
                    <li><i class="fa-solid fa-gear"></i></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section class="produtos">
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
    </main>
</body>

</html>