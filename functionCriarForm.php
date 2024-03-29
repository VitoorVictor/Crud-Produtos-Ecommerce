<?php
function generateProductForm($result) {
    // Início do formulário
    echo '<form action="" method="POST" enctype="multipart/form-data">';
    echo '<label for="codigo_operacao">Código de Operação:</label><br>';
    echo '<input type="text" id="codigo_operacao" name="codigo_operacao" required><br><br>';
    echo '<label for="nome">Nome:</label><br>';
    echo '<input type="text" id="nome" name="nome" required><br><br>';
    echo '<label for="descricao">Descricao:</label><br>';
    echo '<input type="text" id="descricao" name="descricao" required><br><br>';
    echo '<label for="fornecedor">Fornecedor:</label><br>';
    echo '<select id="fornecedor" name="fornecedor" required>';
    echo '<option value="" disabled selected>Selecione um fornecedor</option>';

    // Loop através dos resultados da consulta para criar opções para cada fornecedor
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["nome_fantasia"] . '">' . $row["nome_fantasia"] . '</option>';
    }

    echo '</select><br><br>';
    echo '<label for="preco">Preço:</label><br>';
    echo '<input type="number" id="preco" name="preco" step="0.01" required><br><br>';
    echo '<label for="file">Selecione o arquivo:</label><br>';
    echo '<input type="file" id="file" name="file" required><br><br>';
    echo '<label for="preview">Veja a preview da imagem:</label><br>';
    echo '<img id="preview" src="#" alt="Preview da Imagem" class="hidden" height="90px"><br><br>';
    echo '<input type="submit" value="Enviar">';
    echo '</form>';
}
