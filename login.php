<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	
	<form  action="login-check.php" method="post" class="login">
		<h2>LOGIN</h2>
		<?php if (!empty($error_message)): ?>
			<p> <?php echo $error_message; ?> </p>
			<?php endif; ?>

		<label>User Name</label>
		<input type="text" name="username" placeholder="User Name"><br>

		<label>Password</label>
		<input type="password" name="password" placeholder="Password"><br>
		
		<button class="login-btn" type="submit">Login</button>

		<a href="signup.php" class="ca">Don't have an account? Sign Up</a>

	</form>
</body>

</html>
