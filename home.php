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
		
		<input type="text" id="keyword" onkeyup="showHint(this.value)"> 
		
		<div id="tableTask">
		<table>
			<tr>
			  <th>Id</th>
			  <th>Name</th>
			  <th>Details</th>
			  <th>Due</th>
			  <th>Action</th>
			</tr>
			<tbody>
			
			  <?php while ($row = $stmt->fetch()) { 
			  ?>
			  <tr>
			  <td><?php echo $row["id"]; ?></td>
			  <td><?php echo $row["name"]; ?></td>
			  <td><?php echo $row["details"]; ?></td>
			  <td><?php echo $row["due"]; ?></td>
				<!--Menambahkan icon-->
				  <td>
					<a href='form_update.php?id=<?= $row['id'] ?>'><img width='30em' height='30em' src='edit.png'></a>
					<a href='form_delete.php?id=<?= $row['id'] ?>'><img width='30em' height='30em' src='remove.png'></a></td>
				  </td>
			  </tr>	
	
      <?php 
      } 
        
	  $pdo = NULL;
	}
	catch (PDOException $e) {   
	exit("PDO Error: ".$e->getMessage()."<br>");
	}?>
	  </tbody>
	</table>
	</div>
		<script src="liveSearch.js"></script> 
  </body> 
</html> 
	
		  