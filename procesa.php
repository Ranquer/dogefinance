<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
    $servername1 = "localhost";
    $username1 = "myadmin";
    $password1 = "password";
    $dbname1 = "bd_dogefinance";   
    $mysqli= new mysqli($servername1,$username1,$password1,$dbname1) or die (mysqli_error($mysqli));
    $con2 = mysqli_connect($servername1, $username1, $password1, $dbname1);

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
?>
<?php
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
if (isset($_GET['delete'])){
    $symbol_id= $_GET['delete'];
    $mysqli->query("DELETE FROM user_stocks WHERE symbol='".$symbol_id."' AND user_id = '" .$_SESSION['id']. "'") or die ($mysqli->error);
    $_SESSION['message']= "El registro ha sido eliminado correctamente!";
    $_SESSION['msg_type']="danger";
    header("location: Perfil.php");
}
?>
<?php
if (isset($_GET['agregar'])){
    $symbol_id= $_GET['agregar'];
    //echo $_SESSION['id'];
    $id_usuario= intval($_SESSION['id']);
    $mysqli->query("INSERT INTO user_stocks (symbol, user_id) values ('".$symbol_id."','". $id_usuario."')") or die ($mysqli->error);
    $_SESSION['message']= "El registro ha sido agregado correctamente!";
    $_SESSION['msg_type']="success";
    header("location: Escritorio.php");
}
?>