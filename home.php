<!DOCTYPE html> <html lang='en-GB'> 
  <head> 
    <title>Home</title> 
	<link rel="stylesheet" href="styles.css">
  </head> 
  <body> 
    <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-brand">
      <h3>Student Task Webapp</h3>
    </div>
    <ul>
      <li>About</li>
	  <li><a href="add.php">Add Task</a></li>
      <li><a href="logout.php">Log out</a></li>
    </ul>
  </div>
 
	<?php 
		session_start();
		
		if (!isset($_SESSION['username'])){ 
		  header("Location: login.php"); 
		} 
		
		require 'dbconn.php';
		
		try { 
		  $pdo = new PDO($dsn,$db_username,$db_password,$opt); 
		  echo "<h2>Task List</h2>\n"; 
		  $stmt = $pdo->query("select * from task order by id");
	?>
		<form action="">  
			Name: <input type="text" id="txt1" onkeyup="showHint(this.value)"> 
		</form> 
		 
		<p>Suggestions: <span id="txtHint"></span></p> 
		
		<table border="1">
			<tr>
				<th> Id </th>
				<th> Name </th>
				<th> Details </th>
				<th> Due </th>
				<th> Action </th>
			</tr>
	<?php
		  foreach($stmt as $row) { 
	?>
			<tr>
				<td><?php echo $row["id"];?></td>
				<td><?php echo $row["name"];?></td>
				<td><?php echo $row["details"];?></td>
				<td><?php echo $row["due"];?></td>
				<td><a href="<?php echo 'edit.php?id=', $row['id'];?>"><img src='edit.png' style='width:30px;height:30px;'></a>
					<a href="<?php echo 'delete.php?slot=', $row['id'];?>"><img src='remove.png' style='width:30px;height:30px;'></a> 
				</td>
			</tr>
		</table>
			
	<?php	  
		  } 
			
		  
		  $pdo = NULL; 
		} 
		catch (PDOException $e) { 
		  exit("PDO Error: ".$e->getMessage()."<br>"); 
		} 
	?> 
		<script src="php11F_suggestion.js"></script> 
  </body> 
</html> 
	
		  