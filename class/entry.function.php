<?php

function insert_entry($info_entry){
    
    global $conn;
    
    $fields = implode(',',array_keys($info_entry));
    $values = implode(',',array_values($info_entry));
    
    $qry = "INSERT INTO entradas (".$fields.") VALUES (".$values.")";
    $res = mysqli_query($conn,$qry);
    $LID = mysqli_insert_id($conn);
    return $LID;
}

function get_all_entries($arg){
    
    global $conn;
    
    $sql = "SELECT e.*,u.nombre as nombre_usuario,u.apellidos as apellidos_ususario, c.nombre as nombre_categoria "
            . "FROM entradas as e INNER JOIN categorias as c ON e.categoria_id = c.id "
            . "INNER JOIN usuarios as u ON e.usuario_id=u.id "
            . "WHERE e.usuario_id = ".$arg." ORDER BY e.titulo ASC";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function get_entry($arg){
    
    global $conn;
    
    $sql = "SELECT * FROM entradas WHERE id = ".$arg;
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function get_last_entries($limit){
    
    global $conn;
    
    $sql = "SELECT e.*,u.nombre as nombre_usuario,u.apellidos as apellidos_ususario, c.nombre as nombre_categoria "
            . "FROM entradas as e INNER JOIN categorias as c ON e.categoria_id = c.id "
            . "INNER JOIN usuarios as u ON e.usuario_id=u.id "
            . "ORDER BY e.fecha ASC LIMIT ".$limit;
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function get_all_entries_category($arg){
    global $conn;
    
    $sql = "SELECT e.*,u.nombre as nombre_usuario,u.apellidos as apellidos_ususario, c.nombre as nombre_categoria "
            . "FROM entradas as e INNER JOIN categorias as c ON e.categoria_id = c.id "
            . "INNER JOIN usuarios as u ON e.usuario_id=u.id "
            . "WHERE e.categoria_id = ".$arg." ORDER BY e.fecha ASC";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function get_entry_slug($entry_slug,$arg=0){
    
    global $conn;
    
    $sql = "SELECT * FROM entradas WHERE slug='" . $entry_slug . "'";
    if($arg>0){
        $sql.=" and id!=".$arg;
    }
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function delete_entry($arg){
    
    global $conn;
    
    $sql = "DELETE FROM entradas WHERE id = " . $arg;
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function update_entry($arg,$info_entry){
    
    global $conn;
    
    $fields = array_keys($info_entry);
    $values = array_values($info_entry);
    
    for($j=0;$j<count($fields);$j++){
        $update.= $fields[$j]." = '".$values[$j]."',";
    };
    $update = rtrim($update,',');
    
    $sql = "UPDATE entradas SET ".$update." WHERE id = " . $arg;
    $rs = mysqli_query($conn, $sql);
    return $rs;
}