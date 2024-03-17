<?php
// Auto Log Out
if((time() - $_SESSION['current_time']) > 3660*60  ){
	header('location:php/auto-logout.php');
  }
?>