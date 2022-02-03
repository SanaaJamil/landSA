<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "Welcome, " . $_SESSION['ID'] . "!";
}
else {
    echo "Please log in first to see this page.";
        header('Location: login.php');
}
?>