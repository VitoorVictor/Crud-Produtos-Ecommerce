<?php
// Consulta SQL para selecionar os nomes dos fornecedores
$sql_query = "SELECT razao_social FROM fornecedores";

// Executar a consulta SQL
$result = $conn->query($sql_query);
?>