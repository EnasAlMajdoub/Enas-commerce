<?php
//for users
session_start();
include 'config/dbcon.php';

function getAll($table){
	global $connection;
   $query="SELECT * FROM $table";
   return $query_run= mysqli_query($connection,$query);
}

function getByID($table,$id){
	global $connection;
$query="SELECT * FROM $table WHERE id='$id' ";
return $query_run= mysqli_query($connection,$query);
}

function getByName($table,$name){
	global $connection;
$query="SELECT * FROM $table WHERE name='$name' LIMIT 1 ";
return $query_run= mysqli_query($connection,$query);
}

function getStoreByCategory($category_id){
	global $connection;
$query="SELECT * FROM stores WHERE category_id='$category_id' ";
return $query_run= mysqli_query($connection,$query);

}



function redirect($url,$message){
	$_SESSION['message']=$message;
	header('Location:'.$url);
	exit(0);

}



?>