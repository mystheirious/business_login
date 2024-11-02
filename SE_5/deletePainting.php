<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
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
	<a href="viewpaintings.php?painter_id=<?php echo sanitize_output($_GET['painter_id']); ?>">
	View the paintings</a>
	<?php $getPainting = getPainting($pdo, $_GET['painting_id']); ?>
	<h1>Are you sure you want to delete this painting?</h1>
	<div class="container" style="border-style: solid; height: 320px; background-color: #F1EBDA; padding-left: 15px;">
			<h3>Painting Name: <?php echo $getPainting['painting_name'] ?></h3>
			<h3>Canvas Size: <?php echo $getPainting['canvas_size'] ?></h3>
			<h3>Paint Used: <?php echo $getPainting['paint_used'] ?></h3>
			<h3>Painter: <?php echo $getPainting['painter'] ?></h3>
			<h3>Price: <?php echo $getPainting['price'] ?></h3>
			<h3>Date Added: <?php echo $getPainting['date_added']; ?></h3>
			<div class="deleteBtn" style="float: right; margin-right: 10px;">

			<form action="core/handleForms.php?painting_id=<?php echo $_GET['painting_id']; ?>&painter_id=<?php echo $_GET['painter_id']; ?>" method="POST">
				<input type="submit" name="deletePaintingBtn" value="Delete" style="width: 80px; height: 30px; padding: 5px; font-size:1em;">
			</form>			
		</div>	
	</div>
</body>
</html>
