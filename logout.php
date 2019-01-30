<?php
    session_start();
	session_unset();
	session_destroy();
    unset($_SESSION['username']);
	echo " <script>alert('Berhasil Logout');location.href='login.php'</script>";
	
     exit();
	 
?>