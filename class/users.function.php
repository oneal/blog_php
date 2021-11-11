<?php

function insert_user($info_user){
    
    global $conn;
    
    $fields = implode(',',array_keys($info_user));
    $values = implode(',',array_values($info_user));
    
    $qry = "INSERT INTO usuarios (".$fields.") VALUES (".$values.")";
    $res = mysqli_query($conn,$qry);
    $LID = mysqli_insert_id($conn);
    return $LID;
}

function get_user_email($arg){
    
    global $conn;
    
    $sql = "SELECT * FROM usuarios WHERE email = '".$arg."'";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function get_all_users(){
    
    global $conn;
    
    $sql = "SELECT * FROM usuarios";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}


