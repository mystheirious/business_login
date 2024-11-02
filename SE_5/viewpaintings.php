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
			font-size: 1.2em;
			height: 40px;
			width: 200px;
			background-color: #F1EBDA;
		}
		select {
			background-color: #F1EBDA;
		}
		table, th, td {
			border:1px solid black;
			background-color: #F1EBDA;
		}
	</style>
</head>
<body>
	<a href="index.php">Return to home</a>
	<?php $getAllInfoPainterByID = getAllInfoPainterByID($pdo, $_GET['painter_id']); ?>
	<h1>Painter ID: <?php echo sanitize_output($getAllInfoPainterByID['painter_id']); ?></h1>
	<h3>Add a new painting to <?php echo sanitize_output($getAllInfoPainterByID['first_name']); ?>'s collection ౨ৎ</h3>
	<form action="core/handleForms.php?painter_id=<?php echo sanitize_output($_GET['painter_id']); ?>" method="POST">
		<p>
			<label for="paintingName">Painting Name</label> 
			<input type="text" name="paintingName" required>
		</p>
		<p>
		    <label for="canvasSize">Canvas Size</label> 
		    <select name="canvasSize" id="canvasSize" required>
		        <option value="">Select canvas size</option>
		        <option value="8x10 inches">8 x 10 inches</option>
		        <option value="11x14 inches">11 x 14 inches</option>
		        <option value="16x20 inches">16 x 20 inches</option>
		    </select>
		</p>
		<p>
		    <label for="paintUsed">Type of Paint</label> 
		    <select name="paintUsed" id="paintUsed" required>
		        <option value="">Select paint type</option>
		        <option value="Acrylic Paint">Acrylic Paint</option>
		        <option value="Gouache Paint">Gouache Paint</option>
				<option value="Oil Paint">Oil Paint</option>
		        <option value="Pastel Paint">Pastel Paint</option>		        
		        <option value="Watercolor Paint">Watercolor Paint</option>
		    </select>
		</p>
		<p>
			<label for="price">Price (PHP)</label> 
			<input type="text" name="price">
		</p>
		<p>
			<input type="submit" name="insertNewPaintingBtn" style="width: 80px; height: 30px; padding: 5px; font-size:1em;" required>
		</p>
	</form>

	<table style="width:100%; margin-top: 50px; text-align: center;">
    <tr>
        <th>Painting ID</th>
        <th>Painting Name</th>
        <th>Canvas Size</th>
        <th>Paint Used</th>
        <th>Painter</th>
        <th>Price</th>
        <th>Date Added</th>
        <th>Action</th>
    </tr>
    <?php 
        $getPaintingsByPainter = getPaintingsByPainter($pdo, $_GET['painter_id']); 
        foreach ($getPaintingsByPainter as $row) { 
    ?>
    <tr>
        <td><?php echo sanitize_output($row['painting_id']); ?></td>	  	
        <td><?php echo sanitize_output($row['painting_name']); ?></td>	  	
        <td><?php echo sanitize_output($row['canvas_size']); ?></td>	  	
        <td><?php echo sanitize_output($row['paint_used']); ?></td>	  	
        <td><?php echo sanitize_output($row['painter']); ?></td>	  	
        <td><?php echo sanitize_output($row['price']); ?></td>	  
        <td><?php echo sanitize_output($row['date_added']); ?></td>
        <td>
            <a href="editPainting.php?painting_id=<?php echo sanitize_output($row['painting_id']); ?>&painter_id=<?php echo sanitize_output($_GET['painter_id']); ?>">Edit</a>
            <a>⟡</a>
            <a href="deletePainting.php?painting_id=<?php echo sanitize_output($row['painting_id']); ?>&painter_id=<?php echo sanitize_output($_GET['painter_id']); ?>">Delete</a>
            <a>⟡</a>
            <a href="activitypainting.php?painting_id=<?php echo sanitize_output($row['painting_id']); ?>&painter_id=<?php echo sanitize_output($_GET['painter_id']); ?>">Activity details</a>
        </td>	  	
    </tr>
    <?php } ?>
	</table>
</body>
</html>
