<?php
    session_start();
    $_SESSION['add_id']=$_POST['index'];
    echo json_encode($_SESSION['add_id']);