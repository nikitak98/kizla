<?php 
require ('steamauth/steamauth.php');
if(!isset($_SESSION['steamid'])) {
  require ('loggedout.php');} 
else {
  require ('loggedin.php');}
?>