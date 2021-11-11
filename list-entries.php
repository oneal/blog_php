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
            <h5>Listado entradas</h5>
            <a href="new-entry.php" title="Añadir entrada">Nueva entrada</a>
            <hr/>
            <?php include 'class/error_form.php';?>
            <?php 
                $user_id = $_SESSION['user_id'];
                $entries_rs = get_all_entries($user_id);
                if(mysqli_num_rows($entries_rs)>0):
                    while($entry = mysqli_fetch_assoc($entries_rs)):?>
                        <div class="row">
                            <div class="col-12 col-sm-3">
                                <?= $entry['titulo'];?>
                            </div>
                            <div class="col-12 col-sm-3">
                                <?= $entry['nombre_categoria'];?>
                            </div>
                            <div class="col-12 col-sm-3">
                                <?= $entry['fecha'];?>
                            </div>
                            <div class="col-12 col-sm-3 text-right">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="edit-entry.php?id_ent=<?= $entry['id'];?>" title="Editar entrada"><i class="bi bi-pencil-square"></i></a>
                                    <a href="delete-entry.php?id_ent=<?= $entry['id'];?>" title="Borrar entrada"><i class="bi bi-trash-fill"></i></a>
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
