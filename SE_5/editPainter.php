<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
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
			font-size: 1.5em;
			height: 40px;
			width: 200px;
			background-color: #FDE0DF;
		}
	</style>
</head>
<body>
	<a href="index.php">Return to home</a>
	<?php $getAllInfoPainterByID = getAllInfoPainterByID($pdo, $_GET['painter_id']); ?>
	<div class="edit" style="border:1px solid black; background-color: #F1EBDA; width: 25%; margin: 0 auto; padding: 20px; text-align: center;">
		<h1>Modify painter details ⭑.ᐟ</h1>
		<form action="core/handleForms.php?painter_id=<?php echo sanitize_output($_GET['painter_id']); ?>" method="POST">
			<p>
				<label for="firstName">First Name</label> 
				<input type="text" name="firstName" value="<?php echo sanitize_output($getAllInfoPainterByID['first_name']); ?>">
			</p>
			<p>
				<label for="lastName">Last Name</label> 
				<input type="text" name="lastName" value="<?php echo sanitize_output($getAllInfoPainterByID['last_name']); ?>">
			</p>
			<p>
				<label for="dateOfBirth">Date of Birth</label> 
				<input type="date" name="dateOfBirth" value="<?php echo sanitize_output($getAllInfoPainterByID['date_of_birth']); ?>">
			</p>
			<p>
				<label for="artStyle">Art Style</label> 
				<input type="text" name="artStyle" value="<?php echo sanitize_output($getAllInfoPainterByID['art_style']); ?>">
			</p>
			<p>
				<label for="livePaintingSkill">Live Painting Skill</label> 
				<input type="text" name="livePaintingSkill" value="<?php echo sanitize_output($getAllInfoPainterByID['live_painting_skill']); ?>">
			</p>
			<p>
				<input type="submit" name="editPainterBtn" value="Edit" style="width: 80px; height: 30px; padding: 5px; font-size:1em;">
			</p>
		</form>
	</div>
</body>
</html>
