<!DOCTYPE html> <html lang='en-GB'> 
  <head> 
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/styles.css">
	<title>Home</title> 
  </head> 
  
  <body> 
  
  <?php require 'authentication.php'; ?>
  <div class="side-menu">
    <div class="brand">
      <h1>Nilist</h1>
    </div>
    <ul>
	  <li><a href="home.php">Task</a></li>
	  <?php  if($_SESSION['username'] == "admin"){ ?>
		  <li><a href="add.php">Add Task</a></li>
	  <?php } ?>
    </ul>
  </div>
  <div class="container">
	<div class="header">
		<div class="nav">
			<div class="search">
				<input type="text" id="keyword" onkeyup="showHint(this.value)" placeholder="Search..">
				<button type="submit"><img src="icon/search.png" alt=""></button>
			</div>
			<div class="user">
				<a class="btn"><?php echo $_SESSION["username"];?></a>
				<div class="img-case">
					<ul>
						<li><a href=""><img src="icon/user.png" alt=""></a>
							<ul class="dropdown">
								<li><a href="logout.php">Logout </a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="tasktable">
		<?php 
			if (!isset($_SESSION['username'])){ 
			  header("Location: login.php"); 
			} 
			
			require 'dbconn.php';
			
			try { 
			 $pdo = new PDO($dsn,$db_username,$db_password,$opt); 
			 
			 if($_SESSION['username'] == "admin"){
				$stmt = $pdo->query("select * from task order by due");
			 } else {
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

					 $stmt= $pdo->query("SELECT * FROM utaskview order by due");
					 
				 } else {
					echo "Tidak ada Tugas";
					exit();
				 }
			 }
		?>
		
		<div id="tableTask"> 
			<?php
				if($stmt->rowCount() === 0){
					echo "Tidak Ada Tugas";
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
				  <td>
					<?php if($_SESSION['username'] == "admin"){ ?>
						  <a href="edit.php?id=<?= $row['id'] ?>"><img width="30em" height="30em" src="icon/edit.png"></a>
						  <a href="delete.php?id=<?= $row['id'] ?>"><img width="30em" height="30em" src="icon/remove.png"></a>
					<?php } else { ?>
						  <a class="btn-grn" href="delete.php?id=<?= $row['id'] ?>">Mark As Done</a>
					<?php } ?>
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
				}
			?>			
		</div>
	</div>
  </div>
  <script src="js/liveSearch.js"></script> 
  </body> 
</html> 
	
		  