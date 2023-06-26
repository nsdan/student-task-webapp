<!DOCTYPE html> <html lang='en-GB'> 
  <head> 
    <title>Add Task</title> 
	<link rel="stylesheet" href="css/form_style.css">
  </head> 
  <body> 
	<?php require 'authentication.php'; ?>
	<h1>Add Task</h1>
	<form action="add_action.php" method="post">
	<table>
      <tr>
        <td><label>Name:</label></td>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <td><label>Details:</label></td>
        <td><textarea name="details" cols="20"></textarea></td>
      </tr>
	  <tr>
        <td><label>Due:</label></td>
        <td><input type="date" name="due"></td>
      </tr>
      <tr>
        <td><input type="submit" value="Submit"></td>
        <td>  	
		</td>
      </tr>
    </table>
	</form>
  </body> 
</html> 




	
		  