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
	table, th, td {
			border:1px solid black;
			background-color: #F1EBDA;
		}
</style>
<body>
	<a href="index.php">Back</a>
	<table style="width:100%; margin-top: 50px; text-align: center;">
    <tr>
        <th>Added By User ID</th>
        <th>Date Added</th>
        <th>Modified By User ID</th>
        <th>Last Updated</th>
    </tr>
    <?php $getPainterByID = getPainterByID($pdo, $_GET['painter_id']); ?>
    <?php foreach ($getPainterByID as $row) { ?>
    <tr>
        <td><?php echo $row['added_by']; ?></td>
        <td><?php echo $row['date_added']; ?></td>
        <td><?php echo $row['modified_by']; ?></td>
        <td><?php echo $row['last_updated']; ?></td>
    </tr>
    <?php } ?>
</table>
	
</body>
</html>