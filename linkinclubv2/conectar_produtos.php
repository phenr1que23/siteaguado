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

$sql = "SELECT id, nome, descricao, preco, imagem_url FROM produtos";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

    $produtos = array();
    while($row = $result->fetch_assoc()) {
        $produtos[] = $row;  
    }
} else {
    $produtos = []; 
}


$conn->close();

return $produtos;
?>
