<?php

include 'class/helper.php';

if(has_session_active()){
    session_destroy();
}

header('location:index.php');
exit;
