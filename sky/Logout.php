<?php 

session_start();

$_SESSION = array();

if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-86400, '/');
}

session_destroy();
echo '<script>window.location.href = "index.php?action=logout";</script>';


// session_start();

// session_unset();

// session_destroy();

// header("Location: ../index.php");