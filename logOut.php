<?php
    session_start();
    session_destroy();
    // Redirect to the login page:
    echo header('Location: index.php');
?>    