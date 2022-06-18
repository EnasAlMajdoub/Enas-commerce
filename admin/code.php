<?php
session_start();
include '../config/dbcon.php';
include '../functions/myfunctions.php';
if (isset($_POST['add_category_btn'])) {
	 $name=$_POST['name'];
	 $image = str_replace('../', '', $upload_path);

	 //send image
	   $file_name = $_FILES['image']['name'];
		$file_tmp = $_FILES['image']['tmp_name'];
		$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
		$file_new_name = strval(time() + rand(1, 1000000000)) . ".$file_ext";
		$upload_path = '../uploads/' . $file_new_name;
		
	$category_query="INSERT INTO categories (name,image)
	VALUES('$name','$file_new_name')";
	$category_query_run= mysqli_query($connection,$category_query);
	if ($category_query_run) {
		move_uploaded_file($file_tmp, $upload_path);
		redirect("add-category.php","added successfully");
	}else{
		redirect("add-category.php","sth errorrrr...");

	}

}elseif (isset($_POST['update_category_btn'])) {
	$id= $_POST['id'];
	$name=$_POST['name'];
	 $new_image = str_replace('../', '', $upload_path);
	 $old_image=$_POST['old_image'];

	 if ($new_image != "") {
	 	//$update_filename= $new_image;
	 	//rename image
	 	$file_ext = strtolower(pathinfo($new_image, PATHINFO_EXTENSION));
		$update_filename = strval(time() + rand(1, 1000000000)) . ".$file_ext";
	 }else{
	 	$update_filename= $old_image;
	 }

	 $update_query="UPDATE categories SET name='$name', image='$update_filename' WHERE id='$id' ";
	 $update_query_run= mysqli_query($connection,$update_query);

	 if ($update_query_run) {
	 	if (str_replace('../', '', $upload_path) != "") {
	 		move_uploaded_file($file_tmp, $upload_path.'/'.$update_filename);
	 		if (file_exists("../uploads/".$old_image)) {
	 			unlink( "../uploads/".$old_image );
	 		}
	 	}
	 	redirect("edit-category.php?id=$id","category updated");
	 }else{
	 	redirect("edit-category.php?id=$id","Error, check it!");
	 }
}elseif (isset($_POST['delete_btn'])) {
	$id = $connection->real_escape_string($_POST['id']);
	$category_query="SELECT * FROM categories WHERE id=$id";
	$category_query_run= mysqli_query($connection,$category_query);
	$category_data= mysqli_fetch_array($category_query_run);
	$image=$category_data['image'];
	$delete_query="DELETE FROM categories WHERE id=$id";
	$delete_query_run= mysqli_query($connection,$delete_query);

	if ($delete_query_run) {
		if (file_exists("../uploads/".$image)) {
	 			unlink( "../uploads/".$image );
	 		}
		redirect("category.php","deleted successfully");

	}else{
		redirect("category.php","deleted failed");
	}
}elseif (isset($_POST['add_store_btn'])) {
	$category_id=$_POST['category_id'];
	$name=$_POST['name'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile'];
	$image=$_FILES['image']['name'];
	$path="../uploads";
	$image_ext= pathinfo($image,PATHINFO_EXTENSION);
	$filename= time().'.'.$image_ext;

	if (!empty($category_id)&& !empty($name)&& !empty($address)&& !empty($mobile)&&
           !empty($image)) {
		$store_query= "INSERT INTO stores (category_id,name,address,mobile,image)VALUES 
	('$category_id','$name','$address','$mobile','$filename')";
	$store_query_run= mysqli_query($connection,$store_query);
	 //check add store
	if ($store_query_run) {
		move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
		redirect("add-store.php","added successfully");
	}else{
		redirect("add-store.php","added failed");
	}

	}else{
		redirect("add-store.php","failed");
	}
}elseif (isset($_POST['update_store_btn'])) {
	$store_id=$_POST['store_id'];
	$category_id=$_POST['category_id'];
	$name=$_POST['name'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile'];
	
	$path="../uploads";
	

	$new_image=$_FILES['image']['name'];
	$old_image=$_POST['old_image'];

	if ($new_image != "") {
		$image_ext= pathinfo($new_image,PATHINFO_EXTENSION);
	$update_filename= time().'.'.$image_ext;

	}else{
		$update_filename=$old_image;
	}
	$update_stores_query="UPDATE stores SET name='$name', address='$address', mobile='$mobile', image='$update_filename'
	WHERE id='$store_id'  ";
	$update_stores_query_run= mysqli_query($connection,$update_stores_query);
	if ($update_stores_query_run) {
		if ($_FILES['image']['name']!="") {
			move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
			if (file_exists("../uploads/".$old_image)) {
				unlink("../uploads/".$old_image);
			}
		}
		redirect("edit-stores.php?id=$store_id","stores updated successfully");
	}else{
		redirect("edit-stores.php?id=$store_id","stores updated failed");
	}
	

}elseif (isset($_POST['delete_store_btn'])) {
	$store_id= $connection->real_escape_string($_POST['store_id']);
	$store_query="SELECT * FROM stores WHERE id='$store_id'";
	$store_query_run= mysqli_query($connection,$store_query);
	$store_data= mysqli_fetch_array($store_query_run);
	$image= $store_data['image'];
	$delete_store= "DELETE FROM stores WHERE id='$store_id'";
	$delete_query_run= mysqli_query($connection,$delete_query);
	if ($delete_query_run) {
		if (file_exists("../uploads",$image)) {
			unlink("../uploads/".$image);
		}
		redirect("stores.php","deleted successfully");
		echo 200; //success
	}else{
		redirect("stores.php","deleted failed");
		echo 500; //server error

	}
}elseif (isset($_POST['delete_categ_btn'])) {
	$id= $connection->real_escape_string($_POST['id']);
	$query="SELECT * FROM categories WHERE id='$id'";
	$query_run= mysqli_query($connection,$query);
	$store_data= mysqli_fetch_array($query_run);
	$image= $store_data['image'];
	$delete_query= "DELETE FROM categories WHERE id='$id'";
	$delete_query_run= mysqli_query($connection,$delete_query);
	if ($delete_query_run) {
		if (file_exists("../uploads",$image)) {
			unlink("../uploads/".$image);
		}
		//redirect("stores.php","deleted successfully");
		echo 200; //success
	}else{
		//redirect("stores.php","deleted failed");
		echo 500; //server error

	}
}


else{
	header('Location: ../index.php');
}







?>



		



		