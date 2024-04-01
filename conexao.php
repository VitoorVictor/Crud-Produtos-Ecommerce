<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "ecommerce"; 


$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($conn->connect_errno) {
    die("Conexão falhou: " . $conn->connect_errno);
} else {
}

<<<<<<< HEAD
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
}
=======
?>
>>>>>>> 2ba88c1d19ce13ccd10b10f56cc6c5b377e6b198
