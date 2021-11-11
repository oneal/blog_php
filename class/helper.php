<?php

include 'db.php';

include 'users.function.php';

include 'category.function.php';

include 'entry.function.php';

function validation_email($email){
    $reg = "#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i";
    return preg_match($reg, $email);
}

function has_session_active(){
    if(isset($_SESSION['user_id']) and !empty($_SESSION['user_id'])){
        return true;
    }else{
        return false;
    }
}

function generar_texto_amigable($cadena, $delimiter = '-'){
    $slug = strtolower(trim(preg_replace('~[^0-9a-z]+~i', $delimiter, html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($cadena, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), $delimiter));
    return $slug;
}