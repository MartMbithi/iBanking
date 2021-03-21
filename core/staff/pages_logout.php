<?php
    session_start();
    unset($_SESSION['staff_id']);
    session_destroy();

    header("Location: pages_staff_index.php");
    exit;
