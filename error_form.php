<?php if(isset($_SESSION['success']) and !empty($_SESSION['success'])):?>
    <p class="alert alert-success"><?= $_SESSION['success'];?></p>
    <?php unset($_SESSION['success']);?>
<?php endif;?>
<?php if(isset($_SESSION['error']) and !empty($_SESSION['error'])):?>
    <p class="alert alert-danger"><?= $_SESSION['error'];?></p>
    <?php unset($_SESSION['error']);?>
<?php endif;?>

