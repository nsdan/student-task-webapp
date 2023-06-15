<!DOCTYPE html> <html lang='en-GB'> 
  <head> 
    <title>PHP11 H</title> 
  </head> 
  <body> 
	<?php
	
	session_start();
		if (!isset($_SESSION['username'])){ 
		  header("Location: php11D.php"); 
		} 

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pbw09";

	  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	  // set the PDO error mode to exception
	  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
	 $slot = $_GET['slot'];
	 
	 $sql = "DELETE FROM meetings WHERE slot ='$slot'";
		
	  $conn->exec($sql);
	  
	  echo "
		<script>
		 alert('Berhasil dihapus');
		 document.location.href='php11F.php';
		</script>
	  ";
	 
	$conn = null;
	?>
  </body> 
</html> 


