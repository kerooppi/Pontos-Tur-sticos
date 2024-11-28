<?php
    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $senha = $_POST["senha"];
    }

    if (!empty($email) && !empty($senha)) {
        // aqui fica lógica de testar se o usuario e a senha estão corretos 
        $conn = mysqli_connect("127.0.0.1", "root", "aluno", "pontos");
            
        if (!$conn){
            die("Não foi possível conectar ao banco de dados");
        }
        $email = "teste@exemplo.com";

        // Valida e sanitiza o e-mail
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            // consulta sql para testar se o usuário e senha correspondem a uma entrada no bd
            $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

            // executa a query
            $resultado = mysqli_query($conn, $sql);

            if (mysqli_num_rows($resultado) == 1){
                session_start();
                $_SESSION["email"] = $email;
                // faz o redirecionamento de página
                header("location: pontos.php");
            } else {
                echo ("Usuário ou senha incorretos");
            }
        } else {
            echo ("Preencha o usuario e a senha corretamente");
        }               
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Criar conta</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="style.css" rel="stylesheet" />
        <link href="site.css" rel="stylesheet" />
    </head>
<section class="page-section" id="contact">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Login</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" action="login.php" method="POST">
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" name="email" type="email" placeholder="nome@exemplo.com" data-sb-validations="required,email" />
                        <label for="email">Digite seu email:</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">Email obrigatório.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">O formato do email não é válido.</div>
                    </div>
                    <!-- Message input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="message" name="senha" type="text" placeholder="Enter your message here..."></input>
                        <label for="message">Digite sua senha:</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Senha obrigatória.</div>
                    </div>
                  
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                        
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->

                    <!-- Submit Button-->
                    <button class="btn btn-primary btn-xl" name="submit" id="submitButton" type="submit">Entrar</button>
                    <a href="criarconta.html"><button class="btn btn-primary btn-xl disabled" id="criarConta" type="button">Criar conta</button></a>
                    <div class="esqueceu">
                        <a href="esqueci.html">Esqueceu sua senha?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
