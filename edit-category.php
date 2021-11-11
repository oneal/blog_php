<?php 
    require_once 'header.php';
    
    if(!has_session_active()){
        header("location:index.php");
        exit;
    }
    
    if(isset($_GET['id_cat']) and !empty($_GET['id_cat'])){
        $category_id = $_GET['id_cat'];
        $categor_rs = get_category($category_id);
        $category = mysqli_fetch_assoc($categor_rs);
    }else{
        header('location:list-category.php');
        exit;
    }
?>   
  
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-12">
            <h5>Editar categoría</h5>
            <hr/>
            <?php include 'form_category.php';?>
        </div>
        <div class="col-sm-3 col-12">
            <?php require_once 'aside.php';?>
        </div>
    </div>
</div>

<?php require_once 'footer.php';?>