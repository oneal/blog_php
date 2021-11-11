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
            <h5>Listado usuarios</h5>
            <?php include 'class/error_form.php';?>
            <?php 
                $user_rs = get_all_users();
                if(mysqli_num_rows($user_rs)>0):
                    while($user = mysqli_fetch_assoc($user_rs)):?>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <?= $user['nombre'];?> <?= $user['apellidos'];?>
                            </div>
                            <div class="col-12 col-sm-4">
                                <?= $user['email'];?>
                            </div>
                            <div class="col-12 col-sm-4">
                                <?= $user['fecha'];?>
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
