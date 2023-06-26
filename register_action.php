<!DOCTYPE html> 
<html lang='en-GB'> 
  <head> 
    <title>register_action</title> 
  </head> 
  <body> 
	<?php 
		session_start();

		require 'dbconn.php';
		
		$username = $_POST["username"];
		$password = $_POST["password"];
		$password2 = $_POST["password2"];
		
		try { 
		  $pdo = new PDO($dsn,$db_username,$db_password,$opt); 
		  
		  $sql = $pdo->query("select * from user where username='$username'");
		  $row = $sql->fetch();
		  
		  if($row){
			  header("Location: index.php?error=Username already taken");
		  }else {
			  if( $password !== $password2 ) {
				header("Location: index.php?error=Confirmation password invalid");
			  }else{
				$password = password_hash($password, PASSWORD_DEFAULT);
				
				# Reset AUTO_INCREMENT
				$sql= $pdo->query("SELECT MAX(id) FROM user");
				$row = $sql->fetch();
				$maxid = $row['MAX(id)'];
				
				$sql= $pdo->query("ALTER TABLE user AUTO_INCREMENT = " . ($maxid + 1));
				
				# Insert User
				$adduser = $pdo->query("INSERT INTO user VALUES('', '$username', '$password')");
				
				$getid = $pdo->query("SELECT id FROM user WHERE username = '$username'");
				$row = $getid->fetch();
				
				$addrole = $pdo->query("INSERT INTO user_role VALUES('','".$row["id"]."', '2')");
				
				header("Location: login.php?success=Regristration successful");
				exit();
			  }			  
		  }
		  
		  $pdo = NULL; 
		} 
		catch (PDOException $e) { 
		  exit("PDO Error: ".$e->getMessage()."<br>"); 
		} 
	?> 
</html> 


	
		  