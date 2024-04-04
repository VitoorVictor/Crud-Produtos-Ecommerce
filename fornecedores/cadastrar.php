<?php

require("vendor/autoload.php");

use \App\Entity\Fornecedor;

if(isset($_POST["razao_social"], $_POST["CNPJ"], $_POST["email"], $_POST["contato"])){
   
    $obFornecedor = new Fornecedor(); // Corrected variable name and added parentheses
    $obFornecedor->razao_social = $_POST["razao_social"];
    $obFornecedor->CNPJ = $_POST["CNPJ"];
    $obFornecedor->email = $_POST["email"];
    $obFornecedor->contato = $_POST["contato"];

    $obFornecedor->

}

include("includes/header.php");
include("includes/formulario.php");
include("includes/footer.php");

?>
