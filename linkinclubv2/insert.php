<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
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
    <form method="POST">
        <label>Id</label>
        <input type="text" name="id">
        <label>Nome</label>
        <input type="text" name="nome">
        <label>Descrição</label>
        <input type="text" name="descricao">
        <label>Preço</label>
        <input type="text" name="preco">
        <label>Imagem</label>
        <input type="text" name="imagem">
        <label>Categoria</label>
        <input type="text" name="categoria">
        <label>Estoque</label>
        <input type="text" name="estoque">
        <button type="submit" name="salvar_produto">Salvar produto</button>
    </form>
    
    
</body>
</html>