<?php
include '../functions/myfunctions.php';

if (isset($_SESSION['auth'])) {
	if ($_SESSION['role_as']!=1) {
		redirect("../index.php","you're not authorized to access");
		
	}
}else{
	redirect("../login.php","login to continue");
	
}











?>