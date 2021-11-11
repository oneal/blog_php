<?php 
    require_once 'header.php';
    
    if(!has_session_active()){
        header("location:index.php");
        exit;
    }
?>   
  
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-12">
            <h5>Nueva entrada</h5>
            <hr/>
            <?php include 'form_entry.php';?>
        </div>
        <div class="col-sm-3 col-12">
            <?php require_once 'aside.php';?>
        </div>
    </div>
</div>

<?php require_once 'footer.php';?>

