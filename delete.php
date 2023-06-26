<!DOCTYPE html> <html lang='en-GB'> 
  <head> 
    <title>Delete</title> 
  </head> 
  <body> 
	<?php
	
	require 'authentication.php';
	require 'dbconn.php';
	try { 
	 $pdo = new PDO($dsn,$db_username,$db_password,$opt); 
	 
	 $taskid = $_GET['id'];
	 
	 $sql = $pdo->query("SELECT id FROM user WHERE username ='".$_SESSION['username']."'");
	 $row = $sql->fetch();
	 $userid = $row['id'];
	 
	 
	 if($_SESSION['username'] == "admin"){
	     $sql = "DELETE FROM task WHERE id ='$taskid'";		 
	}else {
		 $sql = "DELETE FROM user_task WHERE user_id ='$userid' AND task_id = '$taskid'";
	};
	
	$pdo->exec($sql);  
	echo "
			<script>
			 document.location.href='home.php';
			</script>
		 ";
				 
	$pdo = null;
	}
	catch (PDOException $e) { 
		  exit("PDO Error: ".$e->getMessage()."<br>"); 
		} 
	?>
  </body> 
</html> 


