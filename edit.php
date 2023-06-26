<!DOCTYPE html> <html lang='en-GB'> 
  <head> 
    <title>Edit Task</title> 
	<link rel="stylesheet" href="css/form_style.css">
  </head> 
  <body> 
	<?php require 'authentication.php';?>
	<h1>Update Task</h1>
	
	<?php
		$id = $_GET["id"];
		
		require 'dbconn.php';
		$pdo = new PDO($dsn,$db_username,$db_password,$opt); 
		$sql = $pdo->query("SELECT * FROM task WHERE id = $id");
		$row = $sql->fetch();
		$pdo = null;
	?>
	
	<form action="edit_action.php" method="post">
		<input type="hidden" name="id" required value="<?php echo $row["id"]?>">
		<table>
		<tr>
			<td><label>Name:</label></td>
			<td><input type="text" name="name" required value="<?php echo $row["name"]?>"></td>
		</tr>
		<tr>
			<td><label>Details:</label></td>
			<td><textarea name="details" cols="30"> <?php echo $row["details"]?></textarea></td>
		</tr>
		<tr>
			<td><label>Due:</label></td>
			<td><input type="date" name="due" required value="<?php echo $row["due"]?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit"></td>
		</tr>
		</table>
	</form>
  </body> 
</html> 




	
		  