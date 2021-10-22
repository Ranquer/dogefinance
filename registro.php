<?php include("./includes/header.php"); ?>
<title><?php echo basename(__FILE__, ".php"); ?></title>
</head>
<link rel="stylesheet" href="/includes/regis.css" ?>
<div class="container-fluid">
        <div class="men">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); } ?>
            <div>
                <img src="/src/Dogefinance.png" class="img" alt="Stonks">
                <h5>DogeFinance</h5>
            </div>
            <form action="/includes/register_user.php" method="POST" class="form">
                <div class="form-group">
                    <input type="username" name="username" class="form-control" placeholder="Nombre de usuario:" required autofocus>
                </div>
                <br>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Correo electrónico:" required aria-describedby="emailHelp">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" required placeholder="Contraseña:">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="confirm_password" class="form-control" required placeholder="Confirmar contraseña:">
                </div>
                <br>
                <button type="submit" class="sub form-control" name="save_user">Registrarte</button>
                <br>
                <br>
                <p>¿Ya tienes una cuenta?</p>
                <a href="/index.php" style="color:black;">Iniciar Sesión</a>
            </form>
        </div>
</div>

<?php include("./includes/footer.php") ?>