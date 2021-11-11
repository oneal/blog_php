<?php 
require_once 'header.php';

if(isset($_GET['id_ent']) and !empty($_GET['id_ent'])){
    $entry_id = $_GET['id_ent'];
}else{
    header('location:index.php');
    exit;
}
?>   
  
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-12">
            <?php 
                $entry_rs = get_entry($entry_id);
                $entry = mysqli_fetch_assoc($entry_rs);
            ?>
            <article class="entries">
                <h2><?= $entry['titulo'];?></h2>
                <p><em>Propietario: <?= $entry['nombre_usuario'];?> - <?= $entry['fecha'];?></em>
                <p><?= $entry['descripcion'];?></p>
            </article>
        </div>
        <div class="col-sm-3 col-12">
            <?php require_once 'aside.php';?>
        </div>
    </div>
</div>

<?php require_once 'footer.php';?>

