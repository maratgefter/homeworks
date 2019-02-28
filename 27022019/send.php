<?php
    session_start();
    $_SESSION['time1'] = time();
    header('Location: session.php')        
?>
