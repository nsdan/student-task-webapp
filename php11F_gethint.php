<?php 
require 'dbconn.php';
try { 
	
  $pdo = new PDO($dsn,$db_username,$db_password,$opt); 
  //Code 6 
  $stmt = $pdo->query("SELECT * FROM meetings WHERE name LIKE '%".$_GET['keyword']."%'");
 
// lookup all hints if query result is not empty 	  
	$hint = ""; 
	if ($stmt) { 
	foreach($stmt as $row) { 
		if ($hint === "") { 
			$hint = $row["name"]; 
		} else { 
		$hint .= "," .$row["name"]; 
		} 
	}
	}

	// Output "no suggestion" if no hint was found or output correct values 
	echo $hint === "" ? "no suggestion" : $hint; 
	$pdo = NULL; 
} 
catch (PDOException $e) { 
  exit("PDO Error: ".$e->getMessage()."<br>"); 
} 
?> 