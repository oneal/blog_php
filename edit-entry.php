<?php 
    require_once 'header.php';
    
    if(!has_session_active()){
        header("location:index.php");
        exit;
    }
    
    if(isset($_GET['id_ent']) and !empty($_GET['id_ent'])){
        $entry_id = $_GET['id_ent'];
        $entry_rs = get_entry($entry_id);
        $entry = mysqli_fetch_assoc($entry_rs);
    }else{
        header('location:list-category.php');
        exit;
    }
?>   
  
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-12">
            <h5>Editar entrada</h5>
            <hr/>
            <?php include 'form_entry.php';?>
        </div>
        <div class="col-sm-3 col-12">
            <?php require_once 'aside.php';?>
        </div>
    </div>
</div>

<?php require_once 'footer.php';?>