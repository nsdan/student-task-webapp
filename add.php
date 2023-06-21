<!DOCTYPE html> <html lang='en-GB'> 
  <head> 
    <title>PHP11 E</title> 
  </head> 
  <body> 
	<?php
	session_start();
		if (!isset($_SESSION['username'])){ 
		  header("Location: login.php"); 
		} 
	?>
	<h1>Form Menambahkan Data Meeting</h1>
	<form action="add_action.php" method="post">
		<label>Name: <input type="text" name="name"></label><br>
		<label>Details: <textarea name="details" cols="40"></textarea></label><br>
		<label>Due: <input type="date" name="due"></label><br>
		<input type="submit">
	</form>
  </body> 
</html> 




	
		  