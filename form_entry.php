<form action="<?php if(!isset($entry) and empty($entry)): ?>add_entry.php<?php else:?>update_entry.php<?php endif;?>" id="modify-entry" role="form" method="POST">
    <?php include 'error_form.php';?>
    <div class="mb-3">
        <label for="title-entry">Título</label>
        <input type="text" name="title-entry" name="title-entry" class="form-control" placeholder="Introduce el título de la entrada" value="<?= $title = (isset($entry) and !empty($entry)) ? $entry['titulo'] : '';?>"/>
    </div>
    <div class="mb-3">
        <label for="category-entry">Categoría</label>
        <select name="category-entry" name="category-entry" class="form-control">
            <option value="0">Selecciona una categoría</option>
            <?php 
                $categories_rs = get_all_categories(); 
                while($c = mysqli_fetch_assoc($categories_rs)):?>
                    <option value="<?php echo $c['id'];?>" 
                            <?php if(isset($entry) and $c['id'] === $entry['categoria_id']){
                                echo "selected";
                            }?>
                    ><?php echo $c['nombre'];?></option>
            <?php endwhile;?>
        </select>
    </div>
    <div class="mb-3">
        <label for="description-entry">Descripción</label>
        <textarea name="description-entry" name="description-entry" class="form-control" placeholder="Introduce la descripción de la entrada"><?= $description = (isset($entry) and !empty($entry)) ? $entry['descripcion'] : '';?></textarea>
    </div>
    <div class="mb-3">
        <input type="submit" name="submit-entry" id="submit-entry"  value="Guardar" class="btn btn-info btn-color btn-block"/>
        <a href="list-entries.php" class="btn btn-info" title="Volver al listado de entradas">Volver al listado de entradas</a>
        <?php if(isset($entry) and !empty($entry)): ?>
            <input type="hidden" id="id-entry" name="id-entry" value="<?= $entry['id'];?>"/>
        <?php endif;?>
    </div> 
</form>
