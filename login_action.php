<!DOCTYPE html> <html lang='en-GB'> 
  <head> 
    <title>PHP11D_action</title> 
  </head> 
  <body> 
	<?php 
		session_start();

		require 'dbconn.php';
		
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		try { 
		  $pdo = new PDO($dsn,$db_username,$db_password,$opt); 
		  $sql = $pdo->query("select * from user where username='$username'");
		  $row = $sql->fetch();
		  
		  if($row){
			  if(password_verify($password, $row["password"])){
				  $_SESSION["username"] = $username;
				  header("Location: home.php");
				  exit();
			}
		  }
		 
		 header("Location: login.php?error=Username or Password invalid");

		  $pdo = NULL; 
		} 
		catch (PDOException $e) { 
		  exit("PDO Error: ".$e->getMessage()."<br>"); 
		} 
	?> 
</html> 


	
		  