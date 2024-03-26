<?php

include("bloqueio.php");

if(!isset($_SESSION)) {
    session_start();
}
  
if(isset($_POST['logout']) ){
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
</head>
<body>
    Bem vindo ao home! <?php echo $_SESSION['username']; ?>
    <form action="" method="POST"> 
        <input type="submit" name="logout">
    </form>
    
</body>
</html>