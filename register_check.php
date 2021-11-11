<?php

include 'class/helper.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['submit-register']) {
        if(!empty($_POST['name']) and !empty($_POST['lastname']) and !empty($_POST['email']) and !empty($_POST['password'])) {
            
            if(validation_email($_POST["email"])){
                $email_id = $_POST["email"];
            }else{
                $_SESSION['error'] = "Email no válido";
                header('Location: index.php');
                exit();
            }
            
            $user_rs = get_user_email($email_id);
            
            if(mysqli_num_rows($user_rs)==0){
                $password_hash = password_hash($_POST['password'],HASH,['cost' => COST]);

                $info_user = array(
                    'nombre' => "'".$_POST['name']."'",
                    'apellidos' => "'".$_POST['lastname']."'",
                    'email' => "'".$email_id."'",
                    'password' => "'".$password_hash."'",
                    'fecha' => "'".date('Y-m-d',time())."'"
                );

                $id_user = insert_user($info_user);

                if($id_user){
                    $_SESSION['success'] = "Te has registrado correctamente";
                    header("location:register.php");
                    exit; 
                }else{
                    $_SESSION['error'] = "Se ha producido un error";
                    header("location:register.php");
                    exit;
                }
            }else{
                $_SESSION['error'] = "Este usuario ya existe";
                header('Location: register.php');
                exit();
            }
        }else{
            $_SESSION['error'] = "Todos los campos son obligatorios";
            header("location:register.php");
            exit;
        }
    }else{
        $_SESSION['error'] = "Se ha producido un error";
        header("location:register.php");
        exit;
    }
}
