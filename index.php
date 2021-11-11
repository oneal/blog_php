<?php require_once 'header.php';?>   
  
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-12">
            <div id="content-main">
                <h1>Últimas entradas</h1>
                <hr/>
                <?php $last_entries_rss = get_last_entries(10);?>
                <?php while($last_entry = mysqli_fetch_assoc($last_entries_rss)):?>
                    <article class="entries">
                        <h2><?= $last_entry['titulo'];?></h2>
                        <p><em>Propietario: <?= $last_entry['nombre_usuario'];?> - <?= $last_entry['fecha'];?></em>
                        <p><?= substr($last_entry['descripcion'],0,200)."...";?></p>
                        <p><a href="post.php?id_ent=<?= $last_entry['id'];?>" class="btn btn-info btn-color" title="<?= $last_entry['titulo'];?>">ver más</a>
                    </article>
                    <hr/>
                <?php endwhile;?>    
            </div>
        </div>
        <div class="col-sm-3 col-12">
            <?php require_once 'aside.php';?>
        </div>
    </div>
</div>

<?php require_once 'footer.php';?>