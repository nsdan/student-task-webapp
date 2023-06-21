<!DOCTYPE html> <html lang='en-GB'> 
  <head> 
    <title>PHP09 E action</title> 
  </head> 
  <body> 
	<?php

	session_start();
		if (!isset($_SESSION['username'])){ 
		  header("Location: login.php"); 
		} 

	require 'dbconn.php';

	try {
	 $pdo = new PDO($dsn,$db_username,$db_password,$opt); 
	  
	 $id = $_REQUEST['id'];
	 $name = $_REQUEST['name'];
	 $details = $_REQUEST['details'];
	 $due = $_REQUEST['due'];
	 
	 $sql = "INSERT INTO task (name, details, due)
			VALUES ('". $name ."', '". $details."', '". $due."')";
	  
	  $pdo->exec($sql);
	  echo "
		<script>
		 document.location.href='home.php';
		</script>
	  ";
	} catch(PDOException $e) {
	  echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;
	?>
  </body> 
</html> 

