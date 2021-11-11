<?php
include 'class/helper.php';

if(!has_session_active()){
    header('location:index.php');
    exit;
}


if(isset($_GET['id_cat']) and !empty($_GET['id_cat'])){
    $category_id = $_GET['id_cat'];
    
    $category_rs = get_category($category_id);
    if(mysqli_num_rows($category_rs)>0){   
        $delete = delete_category($category_id);
        if($delete){
            header('location:list-category.php');
            exit;
        }else{
            header('location:list-category.php');
            $_SESSION['error'] = "Esta categoria no existe";
            exit;
        }
    }else{
        header('location:list-category.php');
        $_SESSION['error'] = "Esta categoria no existe";
        exit;
    }
}else{
    header('location:list-category.php');
    exit;
}
