<!DOCTYPE html> <html lang='en-GB'> 
  <head> 
    <title>PHP11 G action</title> 
  </head> 
  <body> 
	<?php
	
	require 'authentication.php';
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
		 document.location.href='home.php';
		</script>
	  ";
	  
	
	$pdo = null;
	?>
  </body> 
</html> 

