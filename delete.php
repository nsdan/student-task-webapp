<!DOCTYPE html> <html lang='en-GB'> 
  <head> 
    <title>Delete</title> 
  </head> 
  <body> 
	<?php
	
	session_start();
		if (!isset($_SESSION['username'])){ 
		  header("Location: login.php"); 
		} 

	require 'dbconn.php';

	 $pdo = new PDO($dsn,$db_username,$db_password,$opt); 
	 
	 $id = $_GET['id'];
	 
	 $sql = "DELETE FROM task WHERE id ='$id'";
		
	  $pdo->exec($sql);
	  
	  echo "
		<script>
		 document.location.href='home.php';
		</script>
	  ";
	 
	$pdo = null;
	?>
  </body> 
</html> 


