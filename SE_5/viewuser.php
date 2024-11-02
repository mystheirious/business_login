<?php 
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 

if (!isset($_SESSION['username'])) {
	header("Location: login.php");
}

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
	</style>
</head>
<body>
	<a href="allusers.php">Back</a>
	<div class="info" style="border:1px solid black; margin-top: 8px; background-color: #F1EBDA;">
		<?php $getUserByID = getUserByID($pdo, $_GET['user_id']); ?>
		<h1>Username: <?php echo $getUserByID['username']; ?></h1>
		<h1>First Name: <?php echo $getUserByID['first_name']; ?></h1>
		<h1>Last Name: <?php echo $getUserByID['last_name']; ?></h1>
		<h1>Date Joined: <?php echo $getUserByID['date_added']; ?></h1>
		<h1>Email Address: <?php echo $getUserByID['email']; ?></h1>
		<h1>Contact Number: <?php echo $getUserByID['contact_number']; ?></h1>
	</div>
</body>
</html>
