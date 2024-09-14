<?php
session_start();
if(!isset($_SESSION['Admin_NIM'])){
    header("location:Index.php");
}

?>