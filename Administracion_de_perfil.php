<?php include("./includes/header.php") ?>
<title><?php echo basename(__FILE__, ".php"); ?></title>
<link rel="stylesheet" href="/includes/styles.css">
</head>
<?php include("./includes/nav.php") ?>




<?php session_start();
$enter = $_SESSION['id'];
if ($enter == null || $enter == ''){
    $_SESSION['message_erro'] = 'Por favor inicie sesión';
    header("Location: ./index.php");
    die();
}
else{

}
?>


<?php
        if(isset($_POST['actualizar'])){
            $con2 = $con;
            $passActual = $con2->real_escape_string($_POST['passActual']);
            $passNueva1 = $con2->real_escape_string($_POST['passNueva1']);
            $passNueva2 = $con2->real_escape_string($_POST['passNueva2']);
            $idpass = $_SESSION['id'];
            $sqlA = $con2->query("SELECT password FROM user WHERE id = '$idpass'");
            $rowA = $sqlA->fetch_array();
            if($rowA['password'] == $passActual){
                if($passNueva1 == $passNueva2){
                     $update = $con2->query("UPDATE user SET password = '$passNueva1' WHERE id = '$idpass'");
                     if($update){
                         echo "Contraseña Actualizada, ";
                                }
                            }
                            //else{
                              //      echo "Las 2 contraseñas no coinciden";
                              //  }

                            }
                            //else{
                                    //echo "Tu contraseña actual no coincide";
                                //}
                }
    ?>

<?php

        if(isset($_POST['actualizar'])){
            $con3 = $con;
            $nuevoNombre = $con2->real_escape_string($_POST['usuario']);
            if($nuevoNombre == null || $nuevoNombre == ''){
                $nuevoNombre = $_SESSION['userName'];
            }
            else{
                $sqlB = $con2->query("UPDATE user SET userName = '$nuevoNombre' WHERE id = '$idpass'");
            }
            if($sqlB){
                echo "Se actualizaron los datos, ";
            }
        }
    ?>

<?php
        if(isset($_POST['actualizar'])){
            $con4 = $con;
            $nuevoEmail = $con2->real_escape_string($_POST['email']);
            if($nuevoEmail == null || $nuevoEmail == ''){
                $nuevoEmail = $_SESSION['email'];
            }
            else{
                $sqlC = $con4->query("UPDATE user SET email = '$nuevoEmail' WHERE id = '$idpass'");
            }
            if($sqlC){
                //echo "Email Actualizado";
            }
        }

    ?>

<div class="container">
    <br>
    <!-- Main content -->
    <section class="container-fluid">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-decoration: none; color: inherit;">
                            Datos del Usuario
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                    data-parent="#accordionExample">
                    <div class="card-body">
                        <!-- Main row -->
                        <div class="row">
                            <!-- Left col -->
                            <div class="col-md-5">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Datos del Usuario</h3>
                                    </div>
                                    <form role="form" method="post" action="" enctype="multipart/form-data">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"
                                                    style="font-weight: bold;">Usuario</label>
                                                <input type="text" name="usuario" class="form-control"
                                                    value="<?php echo $_SESSION['userName'] ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" style="font-weight: bold;">Email</label>
                                                <input type="text" name="email" class="form-control"
                                                    placeholder="<?php echo $_SESSION['email'] ?>" disabled>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo" style="text-decoration: none; color: inherit;">
                                Modificar Datos de Usuario
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <!-- Main row -->
                            <div class="row">
                                <!-- Left col -->
                                <div class="col-md-5">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Modificar Datos del usuario</h3>
                                        </div>
                                        <form role="form" method="post" action="" enctype="multipart/form-data">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" style="font-weight: bold;">Nuevo
                                                        Nombre de Usuario</label>
                                                    <input type="text" name="usuario" class="form-control"
                                                        placeholder="Nombre de Usuario" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" style="font-weight: bold;">Nuevo
                                                        Email</label>
                                                    <input type="text" name="email" class="form-control"
                                                        placeholder="Email" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"
                                                        style="font-weight: bold;">Contraseña</label>
                                                    <div class="btn-group dropright" method="post">
                                                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Modificar Contraseña
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <!-- Dropdown menu links -->
                                                            <div class="e-title">Contraseña Actual</div>
                                                            <div class="e-input"><input type="password"
                                                                    name="passActual" autocomplete="off"> </div>

                                                            <div class="e-title">Contraseña Nueva</div>
                                                            <div class="e-input"><input type="password"
                                                                    name="passNueva1" autocomplete="off"> </div>

                                                            <div class="e-title">Confirmar Contraseña</div>
                                                            <div class="e-input"><input type="password"
                                                                    name="passNueva2" autocomplete="off"> </div>
                                                            <!--
                    <br>
                    <button type="submit" name="actualizar" class="btn btn-primary">Actualizar Contraseña</button>
                    -->
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>

                                                    <div class="box-footer">
                                                        <button type="submit" name="actualizar"
                                                            class="btn btn-primary">Actualizar datos</button>
                                                    </div>
                                        </form>
                                    </div>
                                    <!-- /.box -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include("./includes/footer.php") ?>