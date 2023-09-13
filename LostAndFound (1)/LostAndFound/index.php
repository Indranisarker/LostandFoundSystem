<?php 
include('db_connection.php');
session_start(); 
if (!isset($_SESSION['id'])) {
  # code...
  header('location:login.php');
}
//include('home.php');
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) { 
  case 'found':
    include('found.php');
   # code...
   break; 
  case 'lost':
    include('lost.php');
   # code...
   break;
   
   
  case 'claim':
    include('claim_list.php');
   # code...
   break;

  default :
  include('home.php');
}

?>