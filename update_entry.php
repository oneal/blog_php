<?php
include 'class/helper.php';

if(!has_session_active()){
    header('location:index.php');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['submit-entry']){
        if(!empty($_POST['title-entry']) and !empty($_POST['description-entry']) and $_POST['category-entry'] !== "0"){
            $title = $_POST['title-entry'];
            $description = $_POST['description-entry'];
            $category_id = $_POST['category-entry'];
            $usuario_id = $_SESSION['user_id'];
            $entry_id = $_POST['id-entry'];
            
            $title_slug = generar_texto_amigable($title);
        
            $entry_name_exist_check = get_entry_slug($title_slug,$entry_id);

            if (mysqli_num_rows($entry_name_exist_check) > 0) {
                header('Location: edit-entry.php?id_ent='.$entry_id);
                $_SESSION['error'] = "Esta entrada ya existe";
                exit;
            }
            
            $info_entry = array(
                'titulo' => addslashes($title),
                'descripcion' => addslashes($description),
                'categoria_id' => $category_id,
                'usuario_id' => $usuario_id,
                'slug' => $title_slug,
            );
            $insert = update_entry($entry_id,$info_entry);
     
            if($insert){
                header('location:edit-entry.php?id_ent='.$entry_id);
                $_SESSION['success'] = "Entrada modificada";
                exit;
            }else{
                header('location:edit-entry.php?id_ent='.$entry_id);
                $_SESSION['error'] = "Se ha producido un error";
                exit;
            }
        }else{
            header('location:edit-entry.php?id_ent='.$entry_id);
            $_SESSION['error'] = "Tienes que rellenar todos los campos";
            exit;
        }
    }else{
        header('location:edit-entry.php?id_ent='.$entry_id);
        $_SESSION['error'] = "Se ha producido un error";
        exit;
    }
}

