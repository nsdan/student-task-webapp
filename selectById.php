<!DOCTYPE html> <html lang='en-GB'> 
  <head> 
    <title>Select by Id</title> 
  </head> 
  <body> 
	<?php
	require 'dbconn.php';
		$pdo = new PDO($dsn,$db_username,$db_password,$opt); 
		$sql = $pdo->query("SELECT * FROM task WHERE id = $id");
		$row = $sql->fetch();

		$pdo = null;
	?>
  </body> 
</html> 

