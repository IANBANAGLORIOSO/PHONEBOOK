<?php

session_start();
$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));

$id='';
$update = false;
$firstname ="";
$lastname="";
$address="";


if(isset($_POST['save'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$address = $_POST['address'];
	
	
	$mysqli->query("INSERT INTO data (firstname,lastname,address) VALUES ('$firstname','$lastname','$address')") or
			die($mysqli->error);
	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";
	
	
	header("location:index2.php");
}
if(isset($_GET['delete'])){
	$id =$_GET['delete'];
	$mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());
	
	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";
	
	header("location:index2.php");
	
	
}
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update =true;
	$result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error);
	if(@count($result)==1){
		$row=$result->fetch_array();
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$address = $row['address'];
		
	}
}
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$address = $_POST['address'];
	
	$mysqli->query("UPDATE data SET firstname='$firstname',lastname='$lastname',address='$address' WHERE id=$id") or die($mysqli->error);
	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";
	
	header('location:index2.php');
}


?>