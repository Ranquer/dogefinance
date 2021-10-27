<?php include("./includes/header.php");?>
<title><?php echo basename(__FILE__, ".php"); ?></title>
<link rel="stylesheet" href="./includes/style.css">
</head>

<body>

    <div class="container-fluid">
        <div class="col-10">
        </div>
        <div id="men">
            <?php if (isset($_SESSION['message_erro'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $_SESSION['message_erro'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset(); } ?>
            <a href="./Inicio.php" id="link-doge">
                <div>
                    <img src="./src/Doge nav.png" class="img" alt="Stonks">
                    <h5>DogeFinance</h5>
                </div>
            </a>
            <form action="./includes/login.php" method="POST" class="form">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp"
                        placeholder="Correo Electrónico:" required autofocus>
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña:" required>
                </div>
                <br>
                <button type="submit" class="sub form-control" name="log_in">Iniciar Sección</button>
                <br>
                <p>¿No tienes una cuenta?</p>
                <a href="./Registro.php" style="color:black;">Registrarte</a>
            </form>
        </div>
    </div>

    <?php include("./includes/footer.php") ?>