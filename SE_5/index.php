<?php  
require_once 'core/dbConfig.php';
require_once 'core/models.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
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
		.separator {
			border: none;
			height: 1px;
			background-color: darkgray;
			margin: 20px 0;
		}
		input {
			font-size: 1.2em;
			height: 40px;
			width: 200px;
			background-color: #F1EBDA;
		}
		select {
			background-color: #F1EBDA;
		}
	</style>
</head>
<body>
	<?php if (isset($_SESSION['message'])) { ?>
		<h3 style="color: #930050;"><?php echo sanitize_output($_SESSION['message']); ?></h3>
	<?php } unset($_SESSION['message']); ?>

	<hr class="separator">
	<?php if (isset($_SESSION['username'])) { ?>
		<h2>Hello there, <?php echo sanitize_output($_SESSION['username']); ?>!</h2>
		<a href="core/handleForms.php?logoutAUser=1">Logout</a>
		<a>⟡</a>
		<a href="allusers.php">View all users</a>
	<?php } else { echo "<h1>No user logged in</h1>"; } ?>

	<hr class="separator">
	<div class="index" style="width: 70%; margin: 0 auto; padding: 5px; text-align: center;">
		<h1>⁺₊✧ Welcome to the Painting Booth! Kindly fill this out to add a painter ✧₊⁺</h1>
		<form action="core/handleForms.php" method="POST">
			<p>
				<label for="firstName">First Name</label> 
				<input type="text" name="firstName" value="<?php echo isset($_POST['firstName']) ? sanitize_output($_POST['firstName']) : ''; ?>" required>
			</p>
			<p>
				<label for="lastName">Last Name</label> 
				<input type="text" name="lastName" value="<?php echo isset($_POST['lastName']) ? sanitize_output($_POST['lastName']) : ''; ?>" required>
			</p>
			<p>
				<label for="dateOfBirth">Date of Birth</label> 
				<input type="date" name="dateOfBirth" value="<?php echo isset($_POST['dateOfBirth']) ? sanitize_output($_POST['dateOfBirth']) : ''; ?>" required>
			</p>
			<p>
			    <label for="artStyle">Art Style</label> 
			    <select name="artStyle" id="artStyle" required>
			        <option value="">Select art style</option>
			        <option value="Abstract">Abstract</option>
			        <option value="Expressionism">Expressionism</option>		        
			        <option value="Realism">Realism</option>
			        <option value="Impressionism">Impressionism</option>
			        <option value="Painterly">Painterly</option>
			        <option value="Pop Art">Pop Art</option>
			    </select>
			</p>
			<p>
			    <label for="livePaintingSkill">Live Painting Skill (0-5):</label>
			    <select name="livePaintingSkill" id="livePaintingSkill" required>
			        <option value="">Select skill level</option>
			        <option value="1">1</option>
			        <option value="2">2</option>
			        <option value="3">3</option>
			        <option value="4">4</option>
			        <option value="5">5</option>
			    </select>
			</p>
			<p>
			    <input type="submit" name="insertPainterBtn" style="width: 80px; height: 30px; padding: 5px; font-size:1em;">
			</p>
		</form>
	</div>

	<?php $getAllPainters = getAllPainters($pdo); ?>
	<?php foreach ($getAllPainters as $row) { ?>
	<div class="container" style="border-style: solid; width: 40%; height: 360px; margin-top: 15px; padding-left: 20px; background-color: #F1EBDA; margin: 0 auto; margin-bottom: 15px;">
		<h3>Painter's ID: <?php echo sanitize_output($row['painter_id']); ?></h3>
		<h3>First Name: <?php echo sanitize_output($row['first_name']); ?></h3>
		<h3>Last Name: <?php echo sanitize_output($row['last_name']); ?></h3>
		<h3>Date Of Birth: <?php echo sanitize_output($row['date_of_birth']); ?></h3>
		<h3>Art Style: <?php echo sanitize_output($row['art_style']); ?></h3>
		<h3>Live Painting Skill: <?php echo sanitize_output($row['live_painting_skill']); ?></h3>
		<h3>Date Added: <?php echo sanitize_output($row['date_added']); ?></h3>

		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewpaintings.php?painter_id=<?php echo sanitize_output($row['painter_id']); ?>">View paintings</a>
			<a>⟡</a>
			<a href="editPainter.php?painter_id=<?php echo sanitize_output($row['painter_id']); ?>">Edit</a>
			<a>⟡</a>
			<a href="deletePainter.php?painter_id=<?php echo sanitize_output($row['painter_id']); ?>">Delete</a>
			<a>⟡</a>
			<a href="activitypainter.php?painter_id=<?php echo sanitize_output($row['painter_id']); ?>">Activity details</a>
		</div>
	</div> 
	<?php } ?>
</body>
</html> 