<?php
include '../config/dbcon.php';
include 'includes/header.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id = $_POST['id'];

	if (!empty($id)) {
		$query = "delete from categories where id = $id";
		$result = mysqli_query($connection, $query);

		if ($result) {
			echo "Deleted successfully";
		} else {
			echo "Failed to delete";
		}

		mysqli_close($connection);
	} else {
		echo "ID is missing";
	}
}

include 'includes/footer.php';


?>