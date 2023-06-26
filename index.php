<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<link rel="stylesheet" href="css/form_style.css">
</head>
<body>

<h1>Nilist</h1>

<form action="register_action.php" method="post">
	<table>
		<?php if (isset($_GET['error'])) { ?>
		   <tr>
			<td colspan="2"> 
				<p class="error"><?php echo $_GET['error'];?></p>
			</td>
		  </tr>
	  <?php } ?>
		<tr>
			<td><label for="username">Username :</label></td>
			<td><input type="text" name="username" id="username" required></td>
		</tr>
		<tr>
			<td><label for="password">Password :</label></td>
			<td><input type="password" name="password" id="password" required></td>
		</tr>
		<tr>
			<td><label for="password2">Confirm password :</label></td>
			<td><input type="password" name="password2" id="password2" required></td>
		</tr>
		<tr>
			<td><input type="submit" value="Register"></td>
			<td></td>
         </tr>
	</table>
</form>
<div class="register-link">
	 <p>Already have an account?<a href="login.php"> Sign in</a>.</p>
  </div>

</body>
</html>