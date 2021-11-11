<!DOCTYPE html>
<?php include ('class/helper.php');?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Blog de videojuegos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
        <link href="assets/css/styles.css" rel="stylesheet" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="logo">
                        <a href="index.php">
                            <img src="assets/img/logo-Blogger.jpg" title="blog" alt="blog" style="max-width: 120px"/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <nav id="nav">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Inicio</a>
                            </li>
                            <?php 
                                $category_rs = get_all_categories();
                                if(mysqli_num_rows($category_rs)>0):
                                    while($category = mysqli_fetch_assoc($category_rs)):?>
                                        <li class="nav-item">
                                            <a href="list-post.php?id_cat=<?= $category['id'];?>" class="nav-link"><?= $category['nombre'];?></a>
                                        </li>
                                    <?php endwhile; 
                                endif;
                            ?>
                            <li class="nav-item">
                                <a href="sobre-mi.php" class="nav-link">Sobre mi</a>
                            </li>
                            <li class="nav-item">
                                <a href="contacto.php" class="nav-link">Contacto</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>        
    </header>    

