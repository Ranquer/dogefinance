<?php 
include("conexion.php");

if(isset($_POST['up_date'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM user WHERE email='$email' and password='$password'";
        $res = mysqli_query($con, $query);
        if (!$res){
            die("query failed");
        }
        $row = mysqli_num_rows($res);

        
        if($row == 0){
            header("Location: ../index.php");
            $_SESSION['message_erro'] = 'Correo o contraseña incorrecto por favor inténtelo de nuevo';
        }
        else{ 
            $row =  mysqli_fetch_assoc($res);
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['password'] = $row['password'];
            //echo '<script type="text/javascript"> alert('.$row["id"].')</script>';
            header("Location: ../desk.php");
        }
        //mysqli_free_result($res);
        //mysqli_close($con);

    }
?>