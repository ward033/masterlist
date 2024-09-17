<?php
session_start();
if (!isset($_SESSION['sess_id'])){
    header('location: login.php');
}else{
    $user = $_SESSION['sess_id'];
}