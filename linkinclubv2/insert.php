<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir produtos</title>
    <link rel="stylesheet" href="css/style.css">
    
<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = new mysqli("localhost", "root", "", "loja");
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $imagem_url = $_POST["imagem_url"];
    $categoria = $_POST["categoria"];
    $estoque = $_POST["estoque"];
    $sql = "INSERT INTO produtos (id, nome, descricao, preco, imagem_url, categoria, estoque) VALUES ('$id', '$nome', '$descricao', '$preco', '$imagem_url', '$categoria', '$estoque')";
    if ($conn->query($sql) === TRUE) {
        header("Location: loja.php");
        exit(0);
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
</head>
<body>
    <div class="cabecalho-logo-space">
        <img class="cabecalho-logo" src="img/logoLinkinPark.png" alt="">
        <p class="cabecalho-titulo">LINKIN CLUB</p>
    </div>
    <br>
    <div class="form-adicionar">
        <form method="POST">
            <label>ID</label>
            <br>
            <input class="input-add" type="text" name="id">
            <br>
            <label>NOME</label>
            <br>
            <input class="input-add" type="text" name="nome">
            <br>
            <br>
            <label>DESCRIÇÃO</label>
            <br>
            <textarea class="input-add" name="descricao" id="descricao" required></textarea>
            <br>
            <label>PREÇO</label>
            <br>
            <input class="input-add" type="number" step="0.01" name="preco" id="preco">
            <br>
            <label>IMAGEM</label>
            <br>
            <input class="input-add" type="text" name="imagem">
            <br>
            <label>CATEGORIA</label>
            <br>
            <input class="input-add" type="text" name="categoria">
            <br>
            <label>ESTOQUE</label>
            <br>
            <input class="input-add" type="number" name="estoque" id="estoque">
            <br>
            <br>
            <br>
            <button class="submit-button" type="submit" name="salvar_produto">SALVAR PRODUTO</button>
            <br>
            <br>
            <br>
            <div class="voltar-button">
                <a class="button-a" href="loja.php">VOLTAR</a>
            </div>
        </form>
    </div>
 
    
    
</body>
</html>