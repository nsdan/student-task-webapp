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
		  echo "<h2>Task List ". $_SESSION['username'] ."</h2>\n"; 
		 
		 
		 $sql = $pdo->query("SELECT id FROM user WHERE username ='".$_SESSION['username']."'");
		 $row = $sql->fetch();
		 
		 $sql= $pdo->query("SELECT task_id FROM user_task WHERE user_id ='".$row["id"]."'");
		 $row = $sql->fetchAll();
		 
		 $task = [];
		 foreach($row as $x) {
			array_push($task, $x['task_id']);
		}
					
		 $stmt= $pdo->query("SELECT * FROM task WHERE id IN (" . implode(',', $task) . ")");
	?>
		
		<input type="text" id="keyword" onkeyup="showHint(this.value)"> 
		<div id="tableTask"> 
		<?php
			if($stmt->rowCount() === 0){
				echo "Data not found";
		  } else {
		 ?>

		<table>
			<tr>
			  <th>No</th>
			  <th>Name</th>
			  <th>Details</th>
			  <th>Due</th>
			  <th>Action</th>
			</tr>
			<tbody>
			
			  <?php 
				$num=0;
				while ($row = $stmt->fetch()) { 
			  ?>
			  <tr>
			  <td><?php $num++; echo $num; ?></td>
			  <td><?php echo $row["name"]; ?></td>
			  <td><?php echo $row["details"]; ?></td>
			  <td><?php echo $row["due"]; ?></td>
				<!--Menambahkan icon-->
				  <td>
					<a href='edit.php?id=<?= $row['id'] ?>'><img width='30em' height='30em' src='edit.png'></a>
					<a href='delete.php?id=<?= $row['id'] ?>'><img width='30em' height='30em' src='remove.png'></a></td>
				  </td>
			  </tr>	
	
      <?php } ?>
			</tbody>
		</table>
<?php } 
	  echo '</div>';

	  $pdo = NULL;
	}
	catch (PDOException $e) {   
	exit("PDO Error: ".$e->getMessage()."<br>");
	}?>

		<script src="liveSearch.js"></script> 
  </body> 
</html> 
	
		  