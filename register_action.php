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
			  echo "<script>
						alert('username sudah terdaftar!');
					  </script>";
		  }else {
			  if( $password !== $password2 ) {
				echo "<script>
						alert('konfirmasi password tidak sesuai!');
					  </script>";
			  }else{
				$password = password_hash($password, PASSWORD_DEFAULT);
				$sql = $pdo->query("INSERT INTO user VALUES('', '$username', '$password')");
				$row = $sql->fetch();
				header("Location: login.php");
			  }			  
		  }
		  
		  echo "registrasi gagal";
		  $pdo = NULL; 
		} 
		catch (PDOException $e) { 
		  exit("PDO Error: ".$e->getMessage()."<br>"); 
		} 
	?> 
</html> 


	
		  