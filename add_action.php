<!DOCTYPE html> <html lang='en-GB'> 
  <head> 
    <title>PHP09 E action</title> 
  </head> 
  <body> 
	<?php
	
	require 'authentication.php';
	require 'dbconn.php';

	try {
	 $pdo = new PDO($dsn,$db_username,$db_password,$opt); 
	  
	 $name = $_REQUEST['name'];
	 $details = $_REQUEST['details'];
	 $due = $_REQUEST['due'];
	 
	 # Reset AUTO_INCREMENT
	 $sql= $pdo->query("SELECT MAX(id) FROM task");
	 $row = $sql->fetch();
	 $maxid = $row['MAX(id)'];
				
	 $sql= $pdo->query("ALTER TABLE task AUTO_INCREMENT = " . ($maxid + 1));
	 
	 # Insert Task
	 $pdo->query("INSERT INTO task VALUES ('','$name', '$details', '$due')");
	 
	 $getid = $pdo->query("SELECT id FROM task WHERE name = '$name'");
	 $taskid = $getid->fetch();
				
	 $getuserid = $pdo->query("SELECT id FROM user WHERE id <> 1");
	 $row = $getuserid->fetchAll();
	 
	 foreach($row as $user) {
		$pdo->query("INSERT INTO user_task VALUES('','".$user['id']."', '".$taskid["id"]."')");
	 }
	 
	  echo "
		<script>
		 document.location.href='home.php';
		</script>
	  ";
	  
	  $pdo = NULL; 
	} catch (PDOException $e) { 
		  exit("PDO Error: ".$e->getMessage()."<br>"); 
	} 
	?>
  </body> 
</html> 

