<?php
session_start();
if(!(isset($_SESSION['fid']) && !empty($_SESSION['fid']))) {
    header("location:../index.php");
}
?>