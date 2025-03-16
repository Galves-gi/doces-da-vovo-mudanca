<?php
session_start(); // Iniciar a sessão

// Verificar se os dados da sessão estão definidos
$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : '';

// Verificar se o formulário foi enviado com sucesso (flag)
$form_submitted = isset($_SESSION['form_submitted']) ? $_SESSION['form_submitted'] : false;

// Limpar os dados da sessão após usá-los
unset($_SESSION['nome'], $_SESSION['email'], $_SESSION['mensagem']);

// Limpar a flag de envio após exibição
if ($form_submitted) {
    unset($_SESSION['form_submitted']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        <img rc="/doces-da-vovo/assets/logo3.png" alt="logo doces da vovó">
        <ul class="menu">
            <li><a href="/doces-da-vovo/index.html">Início</a></li>
            <li><a href="/doces-da-vovo/#produto">Produto</a></li>
            <li><a href="/doces-da-vovo/pages/historia.html">Nossa História</a></li>
            <li><a href="/doces-da-vovo/pages/contato.html">Contato</a></li>
        </ul>
        <button onclick="trocarMenu()"><i id="icon" class="bi bi-list"></i></button>
    </header>

    <main class="container">

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
            <form action="../php/formulario.php" method="post" onsubmit="return validaCampos(event)">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email">

                <label for="mensagem">Mensagem</label>
                <textarea id="mensagem" name="mensagem" rows="4" cols="50" placeholder="Digite a sua mensagem aqui ...">
                </textarea>

                <button type="submit" id="enviarDados" class="form-btn">Enviar</button>
            </form>
        </section>

        <button class="btn-zap"><a href="https://wa.me/5531982606419"><i class="bi bi-whatsapp"></i></a></i></button>


        <?php if ($form_submitted): ?>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Dados Enviados</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></p>
                            <p><strong>E-mail:</strong> <?php echo htmlspecialchars($email); ?></p>
                            <p><strong>Mensagem:</strong> <?php echo nl2br(htmlspecialchars($mensagem)); ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Exibir o modal automaticamente
                $(document).ready(function() {
                    $('#exampleModal').modal('show');
                });
            </script>
        <?php endif; ?>
    </main>




    <footer><!--
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
-->

    </footer>

    <script rc="/doces-da-vovo/js/header.js"></script>
    <script rc="/doces-da-vovo/js/validacao.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


</body>

</html>