<?php 
session_start();
session_destroy();
header('location:index.php?page=1&ipp=15');
?>