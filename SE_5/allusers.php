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
			table, th, td {
			border:1px solid black;
		}
	</style>
</head>
<body>
	<a href="index.php">Back</a>
	<div class="users" style="border-style: solid; width: 45%; height: 0 auto; margin-top: 15px; background-color: #F1EBDA; margin: 0 auto; text-align: center; list-style-position: inside; font-size: 1.2em;">
	<h2>List of users in Painting Booth System ⭑.ᐟ</h2>
	<ul>
		<?php $getAllUsers = getAllUsers($pdo); ?>
		<?php foreach ($getAllUsers as $row) { ?>
			<li>
				<a href="viewuser.php?user_id=<?php echo $row['user_id']; ?>"><?php echo $row['username']; ?> ✧ user ID: <?php echo $row['user_id']; ?></a>
			</li>
		<?php } ?>
	</ul>
	</div>
</body>
</html>
