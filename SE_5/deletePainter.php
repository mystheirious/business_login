<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
	body {
			font-family: "system-ui";
			background-color: #FDE0DF;
		}
	input {
			font-size: 1.5em;
			height: 40px;
			width: 200px;
			background-color: #FDE0DF;
		}
</style>
<body>
	<a href="index.php">Return to home</a>
	<h1>Are you sure you want to delete this painter?</h1>
	<?php $getAllInfoPainterByID = getAllInfoPainterByID($pdo, $_GET['painter_id']); ?>
	<div class="container" style="border-style: solid; height: 320px; background-color: #F1EBDA; padding-left: 15px">
		<h3>First Name: <?php echo $getAllInfoPainterByID['first_name']; ?></h3>
		<h3>Last Name: <?php echo $getAllInfoPainterByID['last_name']; ?></h3>
		<h3>Date of Birth: <?php echo $getAllInfoPainterByID['date_of_birth']; ?></h3>
		<h3>Art Style: <?php echo $getAllInfoPainterByID['art_style']; ?></h3>
		<h3>Live Painting Skill: <?php echo $getAllInfoPainterByID['live_painting_skill']; ?></h3>
		<h3>Date Added: <?php echo $getAllInfoPainterByID['date_added']; ?></h3>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?painter_id=<?php echo $_GET['painter_id']; ?>" method="POST">
				<input type="submit" name="deletePainterBtn" value="Delete" style="width: 80px; height: 30px; padding: 5px; font-size:1em;">
			</form>			
		</div>	
	</div>
</body>
</html>
