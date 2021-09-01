<?php include("./includes/header.php");?>

<div class="container-fluid">
    <div class="d-flex columns align-items-center">
        <div class="col-10">
            <img src="./src/Dogefinance.png" class="img-fluid img-thumbnail" alt="Stonks">
        </div>
        <div class="col-2 card card-body">
        <?php if (isset($_SESSION['message_erro'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message_erro'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); } ?>
            <form action="/includes/login.php" method="POST">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Correo Electrónico:" required autofocus>
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña:" required>
                </div>
                <br>
                <button type="submit" class="w-100 btn btn-secondary" name="log_in">Iniciar Sección</button>

                
                <br>
                <br>
                <p>¿No tienes una cuenta?</p>
                <a href="/registro.php" style="color:black;">Registrarte</a>
            </form>
        </div>
    </div>
</div>

<?php include("./includes/footer.php") ?>