<form action="<?php if(!isset($category) and empty($category)): ?>add_category.php<?php else:?>update_category.php<?php endif;?>" id="add-category" role="form" method="POST">
    <?php include 'error_form.php';?>
    <div class="mb-3">
        <label for="name-cat">Nombre categoría</label>
        <input type="text" name="name-cat" name="name-cat" class="form-control" placeholder="Introduce el nombre de la categoría" value="<?= $name = (isset($category) and !empty($category)) ? $category['nombre'] : '';?>"/>
    </div>
    <div class="mb-3">
        <input type="submit" name="submit-cat" id="submit-cat"  value="Guardar" class="btn btn-info btn-color btn-block"/>
        <a href="list-category.php" class="btn btn-info" title="Volver al listado de categorías">Volver al listado de categorias</a>
        <?php if(isset($category) and !empty($category)): ?>
            <input type="hidden" id="id-cat" name="id-cat" value="<?= $category['id'];?>"/>
        <?php endif;?>
    </div> 
</form>
