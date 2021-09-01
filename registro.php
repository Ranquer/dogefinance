<?php include("./includes/header.php"); ?>

<div class="container-fluid">
    <div class="d-flex columns align-items-center">
        <div class="col-10">
            <img src="./src/Dogefinance.png" class="img-fluid img-thumbnail" alt="Stonks">
        </div>
        <div class="col-2 card card-body">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); } ?>
            <form action="/includes/register_user.php" method="POST">
                <div class="form-group">
                    <input type="username" name="username" class="form-control" placeholder="Nomre de usuario:" required autofocus>
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
                <button type="submit" class="w-100 btn btn-secondary" name="save_user">Registrarte</button>
                <br>
                <br>
                <p>¿Ya tienes una cuenta?</p>
                <a href="/index.php" style="color:black;">Iniciar Sesión</a>
            </form>
        </div>
    </div>
</div>

<?php include("./includes/footer.php") ?>