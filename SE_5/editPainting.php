<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
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
	<a href="viewpaintings.php?painter_id=<?php echo sanitize_output($_GET['painter_id']); ?>">
	View the paintings</a>
	<div class="edit" style="border:1px solid black; background-color: #F1EBDA; width: 25%; margin: 0 auto; padding: 20px; text-align: center;">
		<h1>Modify painting details ⭑.ᐟ</h1>
		<?php $getPainting = getPainting($pdo, $_GET['painting_id']); ?>
		<form action="core/handleForms.php?painting_id=<?php echo sanitize_output($_GET['painting_id']); ?>&painter_id=<?php echo sanitize_output($_GET['painter_id']); ?>" method="POST">
			<p>
				<label for="paintingName">Painting Name</label> 
				<input type="text" name="paintingName" value="<?php echo sanitize_output($getPainting['painting_name']); ?>">
			</p>
			<p>
				<label for="canvasSize">Canvas Size</label> 
				<input type="text" name="canvasSize" value="<?php echo sanitize_output($getPainting['canvas_size']); ?>">
			</p>
			<p>
				<label for="paintUsed">Type of Paint</label> 
				<input type="text" name="paintUsed" value="<?php echo sanitize_output($getPainting['paint_used']); ?>">
			</p>
			<p>
				<label for="price">Price (PHP)</label> 
				<input type="text" name="price" value="<?php echo sanitize_output($getPainting['price']); ?>">
			</p>
			<p>
				<input type="submit" name="editPaintingBtn" value="Edit" style="width: 80px; height: 30px; padding: 5px; font-size:1em;">
			</p>
		</form>
	</div>
</body>
</html>