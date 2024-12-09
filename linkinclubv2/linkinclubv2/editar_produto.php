<?php
ini_set("display_errors", 1);
ini_set("startup_display_errors", 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loja";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $imagem_url = $_POST["imagem_url"];

    $sql = "UPDATE produtos SET nome=?, descricao=?, preco=?, imagem_url=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsi", $nome, $descricao, $preco, $imagem_url, $id);

    if ($stmt->execute()) {
        echo "Produto atualizado com sucesso!";
        echo"<script>window.location.href = 'loja.php'</script>";
    } else {
        echo "Erro ao atualizar o produto: " . $conn->error;
    }

    $stmt->close();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM produtos WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();
    } else {
        die("Produto não encontrado.");
        echo"<script>window.location.href = 'loja.php'</script>";
    }
    $stmt->close();
} else {
    die("");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Editar Produto</title>
</head>
<body>
<div class="cabecalho-logo-space">
        <img class="cabecalho-logo" src="img/logoLinkinPark.png" alt="">
        <p class="cabecalho-titulo">LINKIN CLUB</p>
    </div>
    <div class="cabecalho-baixo"><h1>EDITAR PRODUTO</h1></div>
    <div class="form-editar">
        <form method="POST" action="editar_produto.php">
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
            <br>
            <label for="nome">NOME:</label>
            <br>
            <input class="input-add" type="text" name="nome" id="nome" value="<?php echo $produto['nome']; ?>" required>
            <br>
            <label for="descricao">DESCRIÇÃO:</label>
            <br>
            <textarea class="input-add" name="descricao" id="descricao" required><?php echo $produto['descricao']; ?></textarea>
            <br>
            <label for="preco">PREÇO:</label>
            <br>
            <input class="input-add" type="number" step="0.01" name="preco" id="preco" value="<?php echo $produto['preco']; ?>" required>
            <br>
            <label for="imagem_url">IMAGEM (URL):</label>
            <br>
            <input class="input-add" type="text" name="imagem_url" id="imagem_url" value="<?php echo $produto['imagem_url']; ?>" required>
            <br>
            <br>
            <input class="input-add" type="number" name="estoque" id="estoque" value="<?php echo $produto['estoque']; ?>" required>
            <br>
            <br>
            <br>
            <button class="submit-button" type="submit">Salvar Alterações</button>
        </form>
    </div>
    
</body>
</html>