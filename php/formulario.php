<?php
session_start(); // Iniciar a sessão

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$conn->set_charset("utf8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mensagem = mysqli_real_escape_string($conn, $_POST['mensagem']);

    $sql = "INSERT INTO tb_contato (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";

    if ($conn->query($sql) === TRUE) {
        // Armazenar os dados na sessão
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['mensagem'] = $mensagem;

        // Armazenar flag de envio com sucesso
        $_SESSION['form_submitted'] = true;
    } else {
        // Se houver erro, armazena a mensagem de erro na sessão
        $_SESSION['mensagem'] = "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Redireciona para a página de contato após o processamento
    header("Location: ../pages/contato.php");
    exit();
}

$conn->close();
