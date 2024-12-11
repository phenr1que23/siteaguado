<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="script/script.js"></script>
    <title>Linkin Club</title>
    <script src="script.js"></script>
    
</head>
<body>

<audio src="audio/numb.mp3" autoplay loop>
    <source src="audio/numb.mp3" type="audio/mp3">
</audio>
    <div class="cabecalho-logo-space">
        <img class="cabecalho-logo" src="img/logoLinkinPark.png" alt="">
        <p class="cabecalho-titulo">LINKIN CLUB</p>
    </div>
        <nav class="cabecalho-nav">
            <a href="index.html" class="cabecalho-nav-links">Início</a>
            <a href="sobre_a_banda.html" class="cabecalho-nav-links">Sobre a Banda</a>
            <a href="loja.php" class="cabecalho-nav-links">Loja</a>
        </nav>
        <br>
        <div class="botoes">
            <a class="botoes-estilo" href="insert.php">Adicionar Produtos</a>
        </div>
    
    <section class="produtos">
        <?php

            include('conectar_produtos.php');
        ?>
    <?php
    ini_set("display_errors",1);
    ini_set("startup_display_errors",1);
    error_reporting(E_ALL);

    //ACESSO BANCO
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "loja";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
    }

    $sql = "SELECT id, nome, descricao, preco, imagem_url FROM produtos";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
            
    while($row = $result->fetch_assoc()) {
        echo "<div class='produto'>";
        echo "<img src='" . $row['imagem_url'] . "' alt='" . $row['nome'] . "'>";
        echo "<h2>" . $row['nome'] . "</h2>";
        echo "<p>" . $row['descricao'] . "</p>";
        echo "<p>Preço: R$ " . $row['preco'] . "</p>";
        echo "<a href='pix.html'><button>Adicionar ao carrinho</button></a>";
        echo "<br>";
        echo "<br>";
        echo "<button  onclick=\"window.location.href='editar_produto.php?id=" . $row
        ['id'] . "'\">Editar</button>";
        echo "<br>";
        echo "<br>";
        echo "<button onclick=\"if(confirm('Tem certeza que deseja deletar este produto?')) window.location.href='deletar_produto.php?id=" . $row['id'] . "'\">Deletar</button>";
        echo "</div>";
    }
    } else {
    echo "Nenhum produto encontrado.";
    }

    $conn->close();
    ?>
    </section>
    
    </body>
</html>
