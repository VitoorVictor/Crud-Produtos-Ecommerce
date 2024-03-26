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

?>
