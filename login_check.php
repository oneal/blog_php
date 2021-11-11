<?php
session_start();

include 'class/helper.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['submit-login']){
        if(!empty($_POST['email']) and !empty($_POST['password'])){
            $email_id = mysqli_real_escape_string($conn,$_POST["email"]);
            $password = mysqli_real_escape_string($conn,$_POST["password"]);
            
            $login = get_user_email($email_id);

            if (mysqli_num_rows($login) > 0) {
                $login_row = mysqli_fetch_array($login);

                if (password_verify($password,$login_row['password'])) {
                    $user_name = $login_row['nombre'];
                    $user_id = $login_row['id'];
                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['user_id'] = $user_id;

                    $userID = $login_row['id'];
                    if (password_needs_rehash($login_row['password'], HASH , ['cost' => COST])) {
                        $newHash = password_hash($password, HASH, ['cost' => COST]);
                        $upqry = "UPDATE usuarios 
					  SET password = '$newHash' 
					  WHERE id = $userID";
                        
                        $upres = mysqli_query($conn,$upqry);
                    }
                    
                    header("location:index.php");
                    exit;
                } else {
                    $_SESSION['success'] = "La contraseña es correcta.";
                    header("location:index.php");
                    exit;
                }
            } else {

                $_SESSION['error'] = "email no correcto.";
                header("location: login");
            }
        }else{
            $_SESSION['error'] = "Debes introducir un email y una contraseña";
            header("location:index.php");
            exit;
        }
    }else{
        $_SESSION['error'] = "Se ha producido un error";
        header("location:index.php");
        exit;
    }
}
