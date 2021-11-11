<?php require_once 'header.php';?> 
<div class="container">
    <div class="row">
        <div class="col-sm-3 col-3"></div>
        <div class="col-sm-6 col-6">
            <div id="register" class="block-aside">
                <h3>Registrate</h3>
                <form action="register_check.php" method="POST">
                    <?= include 'error_form.php'?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Introduce tu nombre"/>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Apellidos</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Introduce tus apellidos"/>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Introduce tu email"/>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" name="password" class="form-control" placeholder="Introduce tu password"/>
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="submit-register" id="submit-register" value="Registrar" class="btn btn-info btn-color"/>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-3 col-3"></div>
    </div>
</div>
<?php require_once 'footer.php';?>
