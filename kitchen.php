<?php 
	require_once 'includes/common/header.php';

	// if (!isset($_SESSION["chef_name"])) 
	// {
	// 	header("location: signin");
	// }
	
	echo $_SESSION["chef_name"];

	if (isset($_GET['msg'])) 
	{
		$msg = $_GET['msg'];
		echo  $msg;	
	}

	if (isset($_GET['ASI'])) 
	{
		$ASI = $_GET['ASI'];
		echo "<script>alert(".$ASI.")</script>";	
	}

	if (isset($_GET['ASU'])) 
	{
		$ASU = $_GET['ASU'];
		echo "<script>alert($ASU)</script>";
	}

 ?>











 <?php 
 require_once 'includes/common/footer.php';
  ?>