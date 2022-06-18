<?php
session_start();
if (isset($_SESSION['auth'])) {
	unset($_SESSION['auth']);
	unset($_SESSION['auth_user']);

	$_SESSION['message']="logout successfully";
}

header('Location: index.php');








?>