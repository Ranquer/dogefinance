<?php
include("conexion.php");
if (isset($_POST['save_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $query = "SELECT * FROM user WHERE username ='$username'";
    $res = mysqli_query($con, $query);
    if ($res->num_rows == 0) {
        $query = "SELECT * FROM user WHERE email='$email'";
        $res = mysqli_query($con, $query);
        if ($res->num_rows == 0) {
            if ($password == $confirm_password) {
                $query = "INSERT INTO user(userName, password, email) VALUES ('$username', '$password', '$email')";
                $res = mysqli_query($con, $query);
                if (!$res) {
                    die("Error inesperado");
                }
                header("Location: ../index.php");
            } else {
                $_SESSION['message'] = 'Las contraseñas no son idénticas.';
                header("Location: ../registro.php");
            }
        } else {
            $_SESSION['message'] = 'El correo ya esta siendo usado.';
            header("Location: ../registro.php");
        }
    } else {
        $_SESSION['message'] = 'El usuario ya esta siendo utilizado.';
        header("Location: ../registro.php");
    }
}
