<?php
  include 'functions.php';
  
  if(isset($_GET['logout'])){
    session_destroy();
  	unset($_SESSION['user']);
  	header("location: login.php");
  }
 ?>
