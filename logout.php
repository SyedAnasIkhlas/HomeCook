<?php 
	session_start();

	//logout
	session_destroy();
	header("location:../homecook");
 ?>