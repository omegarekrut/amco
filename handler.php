<?php
include('connection.php');
include('functions.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
print_r( $_POST );
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string( $conn , $_POST['email'] );
    $nome = mysqli_real_escape_string( $conn , $_POST['name'] );
    $cognome = mysqli_real_escape_string( $conn , $_POST['cognome'] );
    $password = $_POST['password'];

    if( strtolower($password) != "triennale"){
        $errorMsg = "La password inserita non è corretta";
        header('Location: index.php?msg='.$errorMsg);
        exit;
    }

    $sql = "SELECT * FROM users where email like '$email'";
    $result = $conn->query($sql);
    if( $result->num_rows > 0 ){
        $user = mysqli_fetch_object( $result );
        loginWithIdUser( $user->id_user );
        header("Location: description.php");
        exit;
    }else{
        $sql = "INSERT INTO users ( nome , cognome , email , privacy ) VALUES( '$nome' , '$cognome' , '$email' , '1' )";
        $result = $conn->query($sql);
        $id_user = $conn->insert_id;
        loginWithIdUser( $id_user );
        header("Location: description.php");
        exit;
    }
}

elseif( isset($_POST['id_user']) ){
    $id_user = $_POST['id_user'];
    loginWithIdUser( $id_user );
    header("Location: description.php");
    exit;
}
?>