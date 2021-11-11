<div>
    <!--sidebar-->
    <aside id="sidebar">
        <div id="login" class="block-aside">
            <?php if(!has_session_active()):?>
                <h3>Identificate</h3>
                <form action="login_check.php" method="POST">
                    <?php include 'error_form.php'?>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Introduce tu email"/>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" name="password" class="form-control" placeholder="Introduce tu password"/>
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="submit-login" id="submit-login"  value="Entrar" class="btn btn-info btn-color btn-block"/>
                    </div> 

                    <div class="mb-3">
                        <a href="register.php" class="btn btn-info">Registrarte</a>
                    </div>     
                </form>
            <?php else:?>
                <h6>Hola, <?= $_SESSION['user_name'];?></h6>
                <nav class="nav flex-column">
                    <a class="nav-link" href="list-category.php">Categorias</a>
                    <a class="nav-link" href="list-entries.php">Entradas</a>
                    <a class="nav-link" href="list-users.php">Usuarios</a>
                    <a class="nav-link" href="logout.php">Cerrar sesión</a>
                </nav>
            <?php endif;?>
        </div>
    </aside>
</div>

