<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
	body {
			font-family: "system-ui";
			background-color: #FDE0DF;
		}
	input {
			font-size: 1.2em;
			height: 40px;
			width: 200px;
			background-color: #FDE0DF;
		}
	table, th, td {
			border:1px solid black;
	}
	</style>
</head>
<body>
	<?php if (isset($_SESSION['message'])) { ?>
		<h3 style="color: #930050;"><?php echo sanitize_output($_SESSION['message']); ?></h3>
	<?php } unset($_SESSION['message']); ?>
	<div class="login" style="border:1px solid black; background-color: #F1EBDA; width: 70%; margin: 0 auto; padding: 20px; text-align: center;">
		<h1>⁺₊✧ Welcome to the Painting Booth! Login here to access the system ✧₊⁺</h1>
		<form action="core/handleForms.php" method="POST">
			<p>
				<label for="username">Username</label>
				<input type="text" name="username">
			</p>
			<p>
				<label for="username">Password</label>
				<input type="password" name="password">
			</p>
			<p>
				<input type="submit" name="loginUserBtn" value="Login" style="width: 80px; height: 30px; padding: 5px; font-size:1em;">
			</p>
		</form>
		<p>Don't have an account? You may register <a href="register.php">here</a></p>
	</div>
</body>
</html>