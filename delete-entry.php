<?php
include 'class/helper.php';

if(!has_session_active()){
    header('location:index.php');
    exit;
}

if(isset($_GET['id_ent']) and !empty($_GET['id_ent'])){
    $entry_id = $_GET['id_ent'];
    
    $entry_rs = get_entry($entry_id);
    if(mysqli_num_rows($entry_rs)>0){   
        $delete = delete_entry($entry_id);
        if($delete){
            header('location:list-entries.php');
            exit;
        }else{
            header('location:list-entries.php');
            $_SESSION['error'] = "Esta entrada no existe";
            exit;
        }
    }else{
        header('location:list-entries.php');
        $_SESSION['error'] = "Esta entrada no existe";
        exit;
    }
}else{
    header('location:list-entries.php');
    exit;
}
