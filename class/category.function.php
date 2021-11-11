<?php

function insert_category($info_category){
    
    global $conn;
    
    $fields = implode(',',array_keys($info_category));
    $values = implode(',',array_values($info_category));
    
    $qry = "INSERT INTO categorias (".$fields.") VALUES (".$values.")";
    $res = mysqli_query($conn,$qry);
    $LID = mysqli_insert_id($conn);
    return $LID;
}

function get_all_categories(){
    
    global $conn;
    
    $sql = "SELECT * FROM categorias ORDER BY nombre ASC";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function get_category($arg){
    
    global $conn;
    
    $sql = "SELECT * FROM categorias WHERE id = ".$arg;
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function get_category_slug($category_slug,$arg=0){
    
    global $conn;
    
    $sql = "SELECT * FROM categorias WHERE slug='" . $category_slug . "'";
    if($arg>0){
        $sql.=" and id!=".$arg;
    }
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function delete_category($arg){
    
    global $conn;
    
    $sql = "DELETE FROM categorias WHERE id = " . $arg;
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function update_category($arg,$info_category){
    
    global $conn;
    
    $fields = array_keys($info_category);
    $values = array_values($info_category);
    
    for($j=0;$j<count($fields);$j++){
        $update.= $fields[$j]." = '".$values[$j]."',";
    };
    $update = rtrim($update,',');
    
    $sql = "UPDATE categorias SET ".$update." WHERE id = " . $arg;
    $rs = mysqli_query($conn, $sql);
    return $rs;
}