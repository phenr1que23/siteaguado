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

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM produtos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
            window.location.href = 'loja.php'; // Redireciona para a página da loja
        </script>";
    } else {
        echo "Erro ao deletar o produto: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "ID do produto não especificado.";
}

$conn->close();
?>
