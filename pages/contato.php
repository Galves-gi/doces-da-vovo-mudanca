<<<<<<< HEAD
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$erro = ""; // Variável para armazenar mensagens de erro
$sucesso = ""; // Variável para armazenar mensagem de sucesso

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Preparação para inserção no banco de dados
    $sql = "INSERT INTO tb_contato (nome, email, mensagem) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $mensagem);

    // Verifica se a inserção foi bem-sucedida
    if ($stmt->execute()) {
        // Mensagem de sucesso
        $sucesso = "Dados enviados com sucesso!";
    } else {
        // Caso haja erro, exibe uma mensagem de erro
        $erro = "Erro ao enviar os dados: " . $stmt->error;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Carattere&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Carattere&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/doces-da-vovo/css/header.css">
    <link rel="stylesheet" href="/doces-da-vovo/css/index.css">
    <link rel="stylesheet" href="/doces-da-vovo/css/contato.css">
    <link rel="shortcut icon" href="/doces-da-vovo/assets/logo3.png" type="image/x-icon">

    <title>Doces da Vovó - Contato</title>
</head>

<body>
    <header>
        <img src="/doces-da-vovo/assets/logo3.png" alt="logo doces da vovó">
        <ul class="menu">
            <li><a href="/doces-da-vovo/index.html">Início</a></li>
            <li><a href="/doces-da-vovo/#produto">Produto</a></li>
            <li><a href="/doces-da-vovo/pages/historia.html">Nossa História</a></li>
            <li><a href="/doces-da-vovo/pages/contato.html">Contato</a></li>
        </ul>
        <button onclick="trocarMenu()"><i id="icon" class="bi bi-list"></i></button>
    </header>

    <main>
        <h1 class="titulo">Visite a Doces da Vovó e experimente o sabor da tradição!</h1>

        <section class="mkt">
            <div class="mkt-box">
                <h4>Doces da Vovó - Belo Horizonte:</h4>
                <p>
                    Endereço: Rua Gonçalves Dias, 32 - Centro<br>
                    terças, quartas, quintas e sextas das 11h às 18h<br>
                    Sábados e feriados das 11h às 18h<br>
                    <span class="text-red">Segunda: Fechado</span>
                </p><br>
                <p>
                    <i class="bi bi-instagram"></i> Docesdavovo<br>
                    <i class="bi bi-whatsapp"></i>31 33333-4444<br>
                    <i class="bi bi-twitter-x"></i> Docesdavovo
                </p>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120030.78947189194!2d-44.17841154575364!3d-19.925998887631092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa699dcb6b54c55%3A0xec0d56f307897bd2!2sDoces%20de%20Portugal%20-%20Savassi%201!5e0!3m2!1spt-BR!2sbr!4v1741914349483!5m2!1spt-BR!2sbr"
                class="mkt-img" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>

        <section class="form">
            <h1 class="titulo">Entre em Contato</h1>
            <!-- Exibe mensagens de erro -->
            <p id="erro-msg" class="erro" style="display:none;"></p>

            <form id="formContato" method="post" action="contato.php">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email">

                <label for="mensagem">Mensagem</label>
                <textarea id="mensagem" name="mensagem" rows="4" cols="50" placeholder="Digite a sua mensagem aqui ..."></textarea>

                <button type="submit" id="enviarDados" class="form-btn">Enviar</button>
            </form>
        </section>

        <section class="display-flex-center margem">
            <?php
            // Exibe os dados enviados após o envio do formulário
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($sucesso)) {
                // Exibe os dados
                echo "<div class='dados-enviados'>";
                echo "<h2 class='titulo'>Dados Enviados:</h2>";
                echo "<p><strong>Nome:</strong> $nome</p>";
                echo "<p><strong>E-mail:</strong> $email</p>";
                echo "<p><strong>Mensagem:</strong> $mensagem</p>";
                echo "<button class='fechar-btn form-btn' onclick='fecharDados()'>Fechar</button>";
                echo "</div>";
            } else {
                // Exibe mensagem de erro se houver
                if (isset($erro)) {
                    echo "<p class='erro'>$erro</p>";
                }
            }
            ?>
        </section>

        <button class="btn-zap"><a href="https://wa.me/5531982606419"><i class="bi bi-whatsapp"></i></a></i></button>
    </main>

    <footer>
        <div class="footer-icon">
            <i class="bi bi-instagram"></i>
            <i class="bi bi-whatsapp"></i>
            <i class="bi bi-twitter-x"></i>
        </div>
        <ul class="footer-menu">
            <li><a href="index.html">Início</a></li>
            <li><a href="#produto">Produto</a></li>
            <li><a href="pages/historia.html">Nossa História</a></li>
            <li><a href="pages/contato.html">Contato</a></li>
        </ul>
        <h5>Todos os direitos reservados.</h5>
    </footer>

    <script src="/doces-da-vovo/js/header.js"></script>
    <script src="/doces-da-vovo/js/validar.js"></script>
</body>

=======
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$erro = ""; // Variável para armazenar mensagens de erro
$sucesso = ""; // Variável para armazenar mensagem de sucesso

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Preparação para inserção no banco de dados
    $sql = "INSERT INTO tb_contato (nome, email, mensagem) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $mensagem);

    // Verifica se a inserção foi bem-sucedida
    if ($stmt->execute()) {
        // Mensagem de sucesso
        $sucesso = "Dados enviados com sucesso!";
    } else {
        // Caso haja erro, exibe uma mensagem de erro
        $erro = "Erro ao enviar os dados: " . $stmt->error;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Carattere&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Carattere&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/doces-da-vovo/css/header.css">
    <link rel="stylesheet" href="/doces-da-vovo/css/index.css">
    <link rel="stylesheet" href="/doces-da-vovo/css/contato.css">
    <link rel="shortcut icon" href="/doces-da-vovo/assets/logo3.png" type="image/x-icon">

    <title>Doces da Vovó - Contato</title>
</head>

<body>
    <header>
        <img src="/doces-da-vovo/assets/logo3.png" alt="logo doces da vovó">
        <ul class="menu">
            <li><a href="/doces-da-vovo/index.html">Início</a></li>
            <li><a href="/doces-da-vovo/#produto">Produto</a></li>
            <li><a href="/doces-da-vovo/pages/historia.html">Nossa História</a></li>
            <li><a href="/doces-da-vovo/pages/contato.html">Contato</a></li>
        </ul>
        <button onclick="trocarMenu()"><i id="icon" class="bi bi-list"></i></button>
    </header>

    <main>
        <h1 class="titulo">Visite a Doces da Vovó e experimente o sabor da tradição!</h1>

        <section class="mkt">
            <div class="mkt-box">
                <h4>Doces da Vovó - Belo Horizonte:</h4>
                <p>
                    Endereço: Rua Gonçalves Dias, 32 - Centro<br>
                    terças, quartas, quintas e sextas das 11h às 18h<br>
                    Sábados e feriados das 11h às 18h<br>
                    <span class="text-red">Segunda: Fechado</span>
                </p><br>
                <p>
                    <i class="bi bi-instagram"></i> Docesdavovo<br>
                    <i class="bi bi-whatsapp"></i>31 33333-4444<br>
                    <i class="bi bi-twitter-x"></i> Docesdavovo
                </p>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120030.78947189194!2d-44.17841154575364!3d-19.925998887631092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa699dcb6b54c55%3A0xec0d56f307897bd2!2sDoces%20de%20Portugal%20-%20Savassi%201!5e0!3m2!1spt-BR!2sbr!4v1741914349483!5m2!1spt-BR!2sbr"
                class="mkt-img" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>

        <section class="form">
            <h1 class="titulo">Entre em Contato</h1>
            <!-- Exibe mensagens de erro -->
            <p id="erro-msg" class="erro" style="display:none;"></p>

            <form id="formContato" method="post" action="contato.php">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email">

                <label for="mensagem">Mensagem</label>
                <textarea id="mensagem" name="mensagem" rows="4" cols="50" placeholder="Digite a sua mensagem aqui ..."></textarea>

                <button type="submit" id="enviarDados" class="form-btn">Enviar</button>
            </form>
        </section>

        <section class="display-flex-center margem">
            <?php
            // Exibe os dados enviados após o envio do formulário
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($sucesso)) {
                // Exibe os dados
                echo "<div class='dados-enviados'>";
                echo "<h2 class='titulo'>Dados Enviados:</h2>";
                echo "<p><strong>Nome:</strong> $nome</p>";
                echo "<p><strong>E-mail:</strong> $email</p>";
                echo "<p><strong>Mensagem:</strong> $mensagem</p>";
                echo "<button class='fechar-btn form-btn' onclick='fecharDados()'>Fechar</button>";
                echo "</div>";
            } else {
                // Exibe mensagem de erro se houver
                if (isset($erro)) {
                    echo "<p class='erro'>$erro</p>";
                }
            }
            ?>
        </section>

        <button class="btn-zap"><a href="https://wa.me/5531982606419"><i class="bi bi-whatsapp"></i></a></i></button>
    </main>

    <footer>
        <div class="footer-icon">
            <i class="bi bi-instagram"></i>
            <i class="bi bi-whatsapp"></i>
            <i class="bi bi-twitter-x"></i>
        </div>
        <ul class="footer-menu">
            <li><a href="index.html">Início</a></li>
            <li><a href="#produto">Produto</a></li>
            <li><a href="pages/historia.html">Nossa História</a></li>
            <li><a href="pages/contato.html">Contato</a></li>
        </ul>
        <h5>Todos os direitos reservados.</h5>
    </footer>

    <script src="/doces-da-vovo/js/header.js"></script>
    <script src="/doces-da-vovo/js/validar.js"></script>
</body>

>>>>>>> 0b11bc7d67288e1e8ce1717cc4484cc754543293
</html>