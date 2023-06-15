<!DOCTYPE html>
<html lang="en-GB">
<head>
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      margin: 0;
      padding: 0;
    }
    
    form {
      width: 300px;
      margin: 200px auto 0px;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }
    
    table {
      width: 100%;
    }
    
    label {
      font-weight: bold;
    }
    
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 10px;
    }
    
    input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
    }
    
    input[type="submit"]:hover {
      background-color: #45a049;
    }
	
	.register-link {
      text-align: center;
	  font-size:11px;
    }
  </style>
</head>
<body>
  <form action="login_action.php" method="post">
    <table>
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
	 <p>Don't have an account?<a href="register.php"> Sign up</a>.</p>
  </div>

</body>
</html>



