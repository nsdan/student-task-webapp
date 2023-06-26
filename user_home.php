<!DOCTYPE html> <html lang='en-GB'> 
  <head> 
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<title>Home</title> 
  </head> 
  
  <body> 
  <div class="side-menu">
    <div class="brand">
      <h1>Nilist</h1>
    </div>
    <ul>
	  <li>Task</li>
	  <li>User</li>
      <li>Log out</li>
    </ul>
  </div>
  <div class="container">
	<div class="header">
		<div class="nav">
			<div class="search">
				<input type="text" id="keyword" onkeyup="showHint(this.value)" placeholder="Search..">
				<button type="submit"><img src="search.png" alt=""></button>
			</div>
			<div class="user">
				<a href="#" class="btn">Add new</a>
				<div class="img-case">
					<img src="user.png" alt="">
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="tasktable">
				<?php 
		session_start();
		
		if (!isset($_SESSION['username'])){ 
		  header("Location: login.php"); 
		} 
		
		require 'dbconn.php';
		
		try { 
		  $pdo = new PDO($dsn,$db_username,$db_password,$opt); 
		 
		 $sql = $pdo->query("SELECT id FROM user WHERE username ='".$_SESSION['username']."'");
		 $row = $sql->fetch();
		 
		 $sql= $pdo->query("SELECT task_id FROM user_task WHERE user_id ='".$row["id"]."'"); 
		 $task = [];
		 
		 if($sql->rowCount() != 0){
			 $row = $sql->fetchAll();
			 foreach($row as $x) {
				array_push($task, $x['task_id']);
			}
			
			$sql= $pdo->query("SELECT COUNT(*) as count FROM information_schema.VIEWS WHERE TABLE_SCHEMA = '$db_database' AND TABLE_NAME = 'utaskview'");
			$row = $sql->fetch();
			 
			 if($row['count'] == 0){
					$pdo->query("CREATE VIEW utaskview AS SELECT * FROM task WHERE id IN (" . implode(',', $task) . ")");
			  } else {
					$pdo->query("ALTER VIEW utaskview AS SELECT * FROM task WHERE id IN (" . implode(',', $task) . ")");
			  }

			 $stmt= $pdo->query("SELECT * FROM utaskview");
			 
		 } else {
			echo "Tidak ada Tugas";
			exit();
		 }
	
	?>
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
					<a class="button" href='delete.php?id=<?= $row['id'] ?>'>Mark As Done</a>
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
			
		</div>
	</div>
  </div>
  </body> 
</html> 
	
		  