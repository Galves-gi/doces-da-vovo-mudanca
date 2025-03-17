<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Contato</title>
    <style>
        .form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .titulo {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-btn:hover {
            background-color: #45a049;
        }

        .erro {
            color: red;
            font-weight: bold;
        }

        .dados-enviados {
            margin-top: 20px;
            padding: 10px;
            background-color: #e7f5e7;
            border: 1px solid #b8e0b9;
            border-radius: 5px;
        }

        .fechar-btn {
            margin-top: 10px;
            padding: 8px 15px;
            background-color: #ff5c5c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .fechar-btn:hover {
            background-color: #ff4747;
        }
    </style>
</head>

<body>

    <section class="form">
        <h1 class="titulo">Entre em Contato</h1>

        <!-- Exibe mensagens de erro com JavaScript -->
        <p id="erro-msg" class="erro" style="display:none;"></p>

        <form id="formContato" action="" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">

            <label for="mensagem">Mensagem</label>
            <textarea id="mensagem" name="mensagem" rows="4" cols="50" placeholder="Digite a sua mensagem aqui ..."></textarea>

            <button type="submit" id="enviarDados" class="form-btn">Enviar</button>
        </form>

        <?php
        // Exibe os dados enviados após o envio do formulário
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<div class='dados-enviados'>";
            echo "<h2>Dados Enviados:</h2>";
            echo "<p><strong>Nome:</strong> $nome</p>";
            echo "<p><strong>E-mail:</strong> $email</p>";
            echo "<p><strong>Mensagem:</strong> $mensagem</p>";
            echo "<button class='fechar-btn' onclick='fecharDados()'>Fechar</button>";
            echo "</div>";
        }
        ?>

    </section>

    <!-- Link para o arquivo JavaScript externo -->
    <script src="/doces-da-vovo/js/validar.js"></script>

</body>

</html>