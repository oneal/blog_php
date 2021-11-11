<?php
include 'class/helper.php';

if(!has_session_active()){
    header('location:index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['submit-cat']){
        if(!empty($_POST['name-cat'])){
            $category_name = $_POST['name-cat'];
            $category_id = $_POST['id-cat'];
            
            $category_slug = generar_texto_amigable($category_name);
        
            $category_name_exist_check = get_category_slug($category_slug,$category_id);
            
            if (mysqli_num_rows($category_name_exist_check) > 0) {
                header('location:edit-category.php?id_cat='.$category_id);
                $_SESSION['error'] = "Esta categoría ya existe";
                exit;
            }
            
            $info_category = array(
                'nombre' => $category_name,
                'slug' => $category_slug
            );
            $insert = update_category($category_id,$info_category);
            
            if($insert){
                header('location:edit-category.php?id_cat='.$category_id);
                $_SESSION['success'] = "Categoría modificada";
                exit;
            }else{
                header('location:edit-category.php?id_cat='.$category_id);
                $_SESSION['error'] = "Se ha producido un error";
                exit;
            }
        }else{
            header('location:edit-category.php?id_cat='.$category_id);
            $_SESSION['error'] = "Introduce un nombre para la categoría";
            exit;
        }
    }else{
        header('location:edit-category.php?id_cat='.$category_id);
        $_SESSION['error'] = "Se ha producido un error";
        exit;
    }
}

