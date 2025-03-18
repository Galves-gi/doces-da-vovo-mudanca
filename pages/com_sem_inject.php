sem inject
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
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Inserção no banco de dados sem validação ou preparação
    $sql = "INSERT INTO tb_contato (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";

    // Verifica se a inserção foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        $sucesso = "Dados enviados com sucesso!";
    } else {
        $erro = "Erro ao enviar os dados: " . $conn->error;
    }
}

$conn->close();
?>




com inject

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$erro = "";
$sucesso = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta e sanitiza os dados
    $nome = htmlspecialchars(trim($_POST['nome']), ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
    $mensagem = htmlspecialchars(trim($_POST['mensagem']), ENT_QUOTES, 'UTF-8');

    // Se não houver erro, prepara e executa a inserção no banco
    if (empty($erro)) {
        $stmt = $conn->prepare("INSERT INTO tb_contato (nome, email, mensagem) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $email, $mensagem);

        // Executa a consulta
        if ($stmt->execute()) {
            $sucesso = "Dados enviados com sucesso!";
        } else {
            $erro = "Erro ao enviar os dados!";
        }

        $stmt->close();
    }
}

$conn->close();
?>