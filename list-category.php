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
            <h5>Listado categorías</h5>
            <a href="new-category.php" title="Añadir categoria">Nueva categoría</a>
            <hr/>
            <?php include 'class/error_form.php';?>
            <?php 
                $categories_rs = get_all_categories();
                if(mysqli_num_rows($categories_rs)>0):
                    while($category = mysqli_fetch_assoc($categories_rs)):?>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <?php echo $category['nombre'];?>
                            </div>
                            <div class="col-12 col-sm-6 text-right">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="edit-category.php?id_cat=<?= $category['id'];?>" title="Editar categoría"><i class="bi bi-pencil-square"></i></a>
                                    <a href="delete-category.php?id_cat=<?= $category['id'];?>" title="Borrar categoría"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </div>
                        </div>
                        <hr/>
                    <?php endwhile;?>
            <?php else: ?>
                <h6>No existen entradas creadas</h6>
            <?php endif;?>
        </div>
        <div class="col-sm-3 col-12">
            <?php require_once 'aside.php';?>
        </div>
    </div>
</div>

<?php require_once 'footer.php';?>

