<!DOCTYPE html> <html lang='en-GB'> 
  <head> 
    <title>PHP11 G</title> 
  </head> 
  <body> 
	<?php
	session_start();
		if (!isset($_SESSION['username'])){ 
		  header("Location: login.php"); 
		} 
	?>
	<h1>Form Update Task</h1>
	
	<?php
		$id = $_GET["id"];
		
		require 'selectById.php'
	?>
	
	<form action="edit_action.php" method="post">
		<label>Id: <input type="text" name="id" required value="<?php echo $row["id"]?>"> </label><br>
		<label>Name: <input type="text" name="name" required value="<?php echo $row["name"]?>"></label><br>
		<label>Details: <textarea name="details" cols="40"> <?php echo $row["details"]?></textarea></label><br>
		<label>Due: <input type="date" name="due" required value="<?php echo $row["due"]?>"></label><br>
		<input type="submit">
	</form>
  </body> 
</html> 




	
		  