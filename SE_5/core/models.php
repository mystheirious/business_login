<?php  
require_once 'dbConfig.php';

function insertPainter($pdo, $first_name, $last_name, 
	$date_of_birth, $art_style, $live_painting_skill, $added_by) {

	$sql = "INSERT INTO painters (first_name, last_name, 
		date_of_birth, art_style, live_painting_skill, added_by) VALUES(?,?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $date_of_birth, $art_style, $live_painting_skill, $added_by]);

	if ($executeQuery) {
		return true;
	}
}


function updatePainter($pdo, $first_name, $last_name, $date_of_birth, $art_style, $live_painting_skill, $painter_id, $modified_by) {

	$sql = "UPDATE painters
				SET first_name = ?,
					last_name = ?,
					date_of_birth = ?, 
					art_style = ?,
					live_painting_skill = ?,
					modified_by = ?
				WHERE painter_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $date_of_birth, $art_style, $live_painting_skill, $modified_by, $painter_id]);
	
	if ($executeQuery) {
		return true;
	}

}


function deletePainter($pdo, $painter_id) {
	$deletePainting = "DELETE FROM paintings WHERE painter_id = ?";
	$deleteStmt = $pdo->prepare($deletePainting);
	$executeDeleteQuery = $deleteStmt->execute([$painter_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM painters WHERE painter_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$painter_id]);

		if ($executeQuery) {
			return true;
		}
	}	
}


function getAllPainters($pdo) {
	$sql = "SELECT * FROM painters";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}


function getAllInfoPainterByID($pdo, $painter_id) {
	$sql = "SELECT * FROM painters WHERE painter_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$painter_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}


function getPaintingsByPainter($pdo, $painter_id) {
    $sql = "SELECT 
                paintings.painting_id AS painting_id,
                paintings.painting_name AS painting_name,
                paintings.canvas_size AS canvas_size,
                paintings.paint_used AS paint_used,
                paintings.date_added AS date_added,
                CONCAT(painters.first_name,' ',painters.last_name) AS painter,
                paintings.price AS price,
                paintings.added_by AS added_by,
                paintings.modified_by AS modified_by,
                paintings.last_updated AS last_updated
            FROM paintings
            JOIN painters ON paintings.painter_id = painters.painter_id
            WHERE paintings.painter_id = ?";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$painter_id]);
    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}


function insertPainting($pdo, $painting_name, $canvas_size, $paint_used, $painter_id, $price, $added_by) {
    $sql = "INSERT INTO paintings (painting_name, canvas_size, paint_used, painter_id, price, added_by) VALUES(?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$painting_name, $canvas_size, $paint_used, $painter_id, $price, $added_by]);
    return $executeQuery;
}


function getPainting($pdo, $painting_id) {
	$sql = "SELECT 
				paintings.painting_id AS painting_id,
				paintings.painting_name AS painting_name,
				paintings.canvas_size AS canvas_size,
				paintings.paint_used AS paint_used,
				CONCAT(painters.first_name,' ',painters.last_name) AS painter,
				paintings.price AS price,
				paintings.date_added AS date_added,
				paintings.added_by AS added_by,
                paintings.modified_by AS modified_by,
                paintings.last_updated AS last_updated
			FROM paintings
			JOIN painters ON paintings.painter_id = painters.painter_id
			WHERE paintings.painting_id  = ? 
			GROUP BY paintings.painting_name";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$painting_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}


function updatePainting($pdo, $painting_name, $canvas_size, $paint_used, $price, $painting_id, $modified_by) {
    $sql = "UPDATE paintings
            SET painting_name = ?,
                canvas_size = ?,
                paint_used = ?,
                price = ?,
                modified_by = ?
            WHERE painting_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$painting_name, $canvas_size, $paint_used, $price, $modified_by, $painting_id]);
    return $executeQuery;
}


function deletePainting($pdo, $painting_id) {
	$sql = "DELETE FROM paintings WHERE painting_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$painting_id]);
	if ($executeQuery) {
		return true;
	}
}


function getPainterByID($pdo, $painter_id) {
    $sql = "SELECT * FROM painters WHERE painter_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$painter_id]);

    if ($executeQuery) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return [];
}


function getPaintingByID($pdo, $painting_id) {
	$sql = "SELECT 
				paintings.painting_id AS painting_id,
				paintings.painting_name AS painting_name,
				paintings.canvas_size AS canvas_size,
				paintings.paint_used AS paint_used,
				CONCAT(painters.first_name,' ',painters.last_name) AS painter,
				paintings.price AS price,
				paintings.date_added AS date_added,
				paintings.added_by AS added_by,
                paintings.modified_by AS modified_by,
                paintings.last_updated AS last_updated
			FROM paintings
			JOIN painters ON paintings.painter_id = painters.painter_id
			WHERE paintings.painting_id  = ? 
			GROUP BY paintings.painting_name";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$painting_id]);
	if ($executeQuery) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return [];
}


function insertNewUser($pdo, $username, $password, $first_name, $last_name, $email, $contact_number) {
	$checkUserSql = "SELECT * FROM user_passwords WHERE username = ?";
	$checkUserSqlStmt = $pdo->prepare($checkUserSql);
	$checkUserSqlStmt->execute([$username]);

	if ($checkUserSqlStmt->rowCount() == 0) {
		$sql = "INSERT INTO user_passwords (username,password,first_name,last_name,email,contact_number) VALUES(?,?,?,?,?,?)";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$username, $password, $first_name, $last_name, $email, $contact_number]);

		if ($executeQuery) {
			$_SESSION['message'] = "User successfully inserted!";
			return true;
		}
		else {
			$_SESSION['message'] = "An error occured from the query.";
		}

	}
	else {
		$_SESSION['message'] = "User already exists.";
	}
}


function getUserIDByUsername($pdo, $username) {
	$sql = "SELECT user_id FROM user_passwords WHERE username =?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$username]); 
	$row = $stmt->fetch();
	return $row ? $row['user_id'] : null;
}


function loginUser($pdo, $username, $password) {
	$sql = "SELECT * FROM user_passwords WHERE username=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$username]); 

	if ($stmt->rowCount() == 1) {
		$userInfoRow = $stmt->fetch();
		$usernameFromDB = $userInfoRow['username']; 
		$passwordFromDB = $userInfoRow['password'];

		if ($password == $passwordFromDB) {
			$_SESSION['username'] = $usernameFromDB;
			$_SESSION['message'] = "Login successful!";
			return true;
		}

		else {
			$_SESSION['message'] = "Password is invalid, but user exists.";
		}
	}

	
	if ($stmt->rowCount() == 0) {
		$_SESSION['message'] = "Username doesn't exist from the database. You may consider registration first.";
	}
}


function getAllUsers($pdo) {
	$sql = "SELECT * FROM user_passwords";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}

}


function getUserByID($pdo, $user_id) {
	$sql = "SELECT * FROM user_passwords WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$user_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}


function sanitize_output($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}


?>