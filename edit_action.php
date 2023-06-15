<!DOCTYPE html> <html lang='en-GB'> 
  <head> 
    <title>PHP11 G action</title> 
  </head> 
  <body> 
	<?php
	
	session_start();
		if (!isset($_SESSION['username'])){ 
		  header("Location: php11D.php"); 
		} 
		
	require 'dbconn.php';

	 $pdo = new PDO($dsn,$db_username,$db_password,$opt); 

	 
	 $id = $_REQUEST['id'];
	 $name = $_REQUEST['name'];
	 $details = $_REQUEST['details'];
	 $due = $_REQUEST['due'];
	 
	 $sql = "UPDATE task SET name='$name', details='$details' WHERE id = '$id'";
		
	 $pdo->exec($sql);
	  
	  echo "
		<script>
		 alert('Berhasil diupdate');
		 document.location.href='home.php';
		</script>
	  ";
	  
	
	$pdo = null;
	?>
  </body> 
</html> 

