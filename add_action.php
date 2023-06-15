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

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pbw09";

	try {
	  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	  // set the PDO error mode to exception
	  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
	 $slot = $_REQUEST['slot'];
	 $name = $_REQUEST['name'];
	 $email = $_REQUEST['email'];
	 
	 $sql = "INSERT INTO meetings (Slot, Name, Email)
			VALUES (". $slot .",'". $name ."', '". $email."' )";
	  
	  // use exec() because no results are returned
	  $conn->exec($sql);
	  echo "
		<script>
		 alert('Berhasil ditambahkan');
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

