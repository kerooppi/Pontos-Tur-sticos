<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pontos Turísticos</title>
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
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">Pontos Turísticos de Rolante</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">Pontos Turísticos, Hotéis e Restaurantes</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">Sobre</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="login.html">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <h1 class="masthead-heading text-uppercase mb-0">Bem Vindo!</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
        </div>
    </header>
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Pontos Turísticos</h2>

            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <?php
                // Conexão com o banco de dados
                $servername = "localhost";
                $username = "root"; // Substitua pelo seu nome de usuário do banco de dados
                $password = "aluno"; // Substitua pela sua senha do banco de dados
                $dbname = "pontos"; // Substitua pelo nome do seu banco de dados

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verificar conexão
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Buscar dados
                $sql = "SELECT * FROM pontos_turisticos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result ->fetch_assoc()) {
                ?>
                    <div class="col-md-8 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal<?php echo $row['id']; ?>">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="data:image/jpeg;base64,<?php echo base64_encode($row['imagem']); ?>" alt="<?php echo $row['nome']; ?>" />
                        </div>
                    </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">Sobre</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row">
                <div class="col-lg-4 ms-auto"><p class="lead">Somos um grupo de alunos independente com o objetivo de atrair um maior número de turistas para a cidade de Rolante, localizada no Rio Grande do Sul, que possui diversas atrações pouco conhecidas.</p></div>
                <div class="col-lg-4 me-auto"><p class="lead">Ao criar sua conta, você pode registrar uma avaliação de diferentes pontos turísticos, hoteis e restaurantes locais, com o intuito de colaborar com a experiência de outras pessoas no futuro.</p></div>
            </div>
        </div>
    </section>
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Contatos</h4>
                    <p class="lead mb-0">
                        Email: comunicacao@rolante.ifrs.edu.br
                        <br />
                        Telefone: (51) 3547-9600
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Redes Sociais</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; Pontos Turísticos de Rolante 2024</small></div>
    </div>
    <!-- Portfolio Modals-->
    <?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root"; // Substitua pelo seu nome de usuário do banco de dados
$password = "aluno"; // Substitua pela sua senha do banco de dados
$dbname = "pontos"; // Substitua pelo nome do seu banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Buscar dados dos pontos turísticos
$sql = "SELECT * FROM pontos_turisticos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
       

        <!-- Modal para exibir detalhes do ponto turístico -->
        <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="portfolioModal<?php echo $row['id']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0 "><?php echo $row['nome']; ?></h2>
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <img class="img-fluid rounded mb-5" src="data:image/jpeg;base64,<?php echo base64_encode($row['imagem']); ?>" alt="<?php echo $row['nome']; ?>" />
                                    <p class="mb-4"><?php echo $row['descricao']; ?></p>
                                    <p>Endereço: <strong><?php echo $row['endereco']; ?></strong> Telefone: <strong><?php echo $row['telefone']; ?></strong></p>
                                    
                                    <!-- Exibir Comentários -->
                                    <h3>Comentários:</h3>
                                    <ul style="list-style-type: none; padding: 0;">
                                        <?php
                                        // Buscar comentários para este ponto turístico
                                        $comentarios_sql = "SELECT * FROM comentarios WHERE ponto_turistico_id = " . $row['id'];
                                        $comentarios_result = $conn->query($comentarios_sql);

                                        if ($comentarios_result->num_rows > 0) {
                                            while ($comentario = $comentarios_result->fetch_assoc()) {
                                                echo "<li><strong>" . htmlspecialchars($comentario['autor']) . ":</strong> " . htmlspecialchars($comentario['comentario']) . "</li>";
                                            }
                                        } else {
                                            echo "<li>Não há comentários para este ponto turístico.</li>";
                                        }
                                        ?>
                                    </ul>

                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Fechar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
$conn->close();
?>
    ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="java.js"></script>
    <!-- SB Forms JS -->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
