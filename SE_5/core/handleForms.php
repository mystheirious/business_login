<?php 
require_once 'dbConfig.php'; 
require_once 'models.php';
require_once 'validate.php';

if (isset($_POST['insertPainterBtn'])) {
	$currentUserID = getUserIDByUsername($pdo, $_SESSION['username']);
    $addedBy = $currentUserID;
	$query = insertPainter($pdo, $_POST['firstName'], $_POST['lastName'], $_POST['dateOfBirth'], $_POST['artStyle'], $_POST['livePaintingSkill'], $addedBy);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}
}


if (isset($_POST['editPainterBtn'])) {
	$currentUserID = getUserIDByUsername($pdo, $_SESSION['username']);
    $modifiedBy = $currentUserID;
	$query = updatePainter($pdo,$_POST['firstName'], 
		$_POST['lastName'], $_POST['dateOfBirth'], $_POST['artStyle'], $_POST['livePaintingSkill'], $_GET['painter_id'], $modifiedBy);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Edit failed";
	}
}


if (isset($_POST['deletePainterBtn'])) {
	$query = deletePainter($pdo, $_GET['painter_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}


if (isset($_POST['insertNewPaintingBtn'])) {
	$currentUserID = getUserIDByUsername($pdo, $_SESSION['username']);
    $addedBy = $currentUserID;
    $query = insertPainting($pdo, $_POST['paintingName'], $_POST['canvasSize'], $_POST['paintUsed'], $_GET['painter_id'], $_POST['price'], $addedBy);

    if ($query) {
        header("Location: ../viewpaintings.php?painter_id=" . $_GET['painter_id']);
    } else {
        echo "Insertion failed";
    }
}


if (isset($_POST['editPaintingBtn'])) {
	$currentUserID = getUserIDByUsername($pdo, $_SESSION['username']);
    $modifiedBy = $currentUserID;
    $query = updatePainting($pdo, $_POST['paintingName'], $_POST['canvasSize'], $_POST['paintUsed'], $_POST['price'], $_GET['painting_id'], $modifiedBy);

    if ($query) {
        header("Location: ../viewpaintings.php?painter_id=" . $_GET['painter_id']);
    } else {
        echo "Update failed";
    }
}


if (isset($_POST['deletePaintingBtn'])) {
	$query = deletePainting($pdo, $_GET['painting_id']);

	if ($query) {
		header("Location: ../viewpaintings.php?painter_id=" .$_GET['painter_id']);
	}
	else {
		echo "Deletion failed";
	}
}


if (isset($_POST['registerUserBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $contact_number = $_POST['contactNumber'];

	if (!empty($username) && !empty($password) && !empty($confirm_password) 
		&& !empty($first_name) && !empty($last_name) && !empty($email) && !empty($contact_number)) {

		if ($password == $confirm_password) {

			if (validatePassword($password)) {
				$insertQuery = insertNewUser($pdo, $username, sha1($password), $first_name, $last_name, $email, $contact_number);

				if ($insertQuery) {
					header("Location: ../login.php");
				}
				else {
					header("Location: ../register.php");
				}
			}

			else {
				$_SESSION['message'] = "Password should be more than 8 characters and should contain both uppercase, lowercase, and numbers.";
				header("Location: ../register.php");
			}
		}

		else {
			$_SESSION['message'] = "Please check if both passwords are similar.";
			header("Location: ../register.php");
		}
	
	}

	else {
		$_SESSION['message'] = "Please make sure the input fields 
		are not empty for registration.";
		header("Location: ../register.php");
	}
}


if (isset($_POST['loginUserBtn'])) {
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	if (!empty($username) && !empty($password)) {
		$loginQuery = loginUser($pdo, $username, $password);
		if ($loginQuery) {
			header("Location: ../index.php");
			exit();
		}
		else {
			header("Location: ../login.php");
			exit();
		}
	}
	else {
		$_SESSION['message'] = "Please make sure the input fields 
		are not empty for the login.";
		header("Location: ../login.php");
	}
}
if (isset($_GET['logoutAUser'])) {
	unset($_SESSION['username']);
	header('Location: ../login.php');
}


?>



