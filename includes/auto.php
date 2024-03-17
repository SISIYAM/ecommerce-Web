<?php
// Auto Log Out
if((time() - $_SESSION['current_time']) > 86400  ){
	header('location:includes/auto-logout.php');
  }
?>