<!DOCTYPE html>
<html lang="en-GB">
<head>
  <title>Login</title>
  <link rel="stylesheet" href="css/form_style.css">
</head>
<body>
  <h1>Nilist</h1>
  <form action="login_action.php" method="post">
    <table>
		<?php if (isset($_GET['success'])) { ?>
	   <tr>
		<td colspan="2"> 
			<p class="success"><?php echo $_GET['success']; ?></p>
		</td>
	  </tr>
	  <?php } ?>
	   <?php if (isset($_GET['error'])) { ?>
	   <tr>
		<td colspan="2"> 
			<p class="error"><?php echo $_GET['error']; ?></p>
		</td>
	  </tr>
	  <?php } ?>
      <tr>
        <td><label>Username:</label></td>
        <td><input type="text" name="username"></td>
      </tr>
      <tr>
        <td><label>Password:</label></td>
        <td><input type="password" name="password"></td>
      </tr>
      <tr>
        <td><input type="submit" value="Login"></td>
        <td>  
			
		</td>
      </tr>
    </table>
  </form>
  <div class="register-link">
	 <p>Don't have an account?<a href="index.php"> Sign up</a>.</p>
  </div>

</body>
</html>



