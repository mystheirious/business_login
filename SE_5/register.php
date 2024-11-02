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
	<a href="login.php">Login page</a>
	<div class="register" style="border-style: solid; width: 30%; height: 0 auto; margin-top: 15px; padding-left: 20px; background-color: #F1EBDA; margin: 0 auto; text-align: center;">
	<h1>Kindly register a user here ⭑.ᐟ</h1>
	<?php if (isset($_SESSION['message'])) { ?>
		<h3 style="color: #930050;"><?php echo $_SESSION['message']; ?></h3>
	<?php } unset($_SESSION['message']); ?>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="username">Username</label>
			<input type="text" name="username" required>
		</p>
		<p>
			<label for="password">Password</label>
			<input type="password" name="password" required>
		</p>
		<p>
			<label for="confirmPassword">Confirm Password</label>
			<input type="password" name="confirm_password">
		</p>
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" required>
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" required>
		</p>
		<p>
			<label for="email">Email Address</label>
			<input type="email" name="email" required>
		</p>
		<p> <label for="contactNumber">Contact Number</label> 
			<input type="number" name="contactNumber" maxlength="11" required>
		</p>
		<p>
			<input type="submit" name="registerUserBtn" value="Register" style="width: 80px; height: 30px; padding: 5px; font-size:1em;">
		</p>
	</form>
	</div>
</body>
</html>