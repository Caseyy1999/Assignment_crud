<?php 
session_start();
$mysqli = new mysqli('localhost', 'root', '','assignment') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
	$firstname = '';
	$middlename ='';
	$lastname = '';
	$birthday = '';
	$address1 = '';
	$address2 = '';
	$region = '';
	$city = '';
		
if(isset($_POST['enter'])) {
	$today = date("Y-m-d");
	
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$lastname = $_POST['lastname'];
	$reg = $_POST['region'];
	$city = $_POST['city'];
	$results = $mysqli->query("SELECT * FROM region WHERE ID='$reg'") or die($mysqli->error);
 	if (count(array($results))==1) {

 		$row = $results->fetch_array();
 		$reg = $row['Region']; }
 		

	$birthday = date("Y-m-d", strtotime($_POST['birthday']));
	$getage = date_diff(date_create($_POST['birthday']),date_create($today));
	$age = $getage->format('%y');

	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];

	$_SESSION['message'] = "Record Inserted Successfully!";
	$_SESSION['message_type'] = "success";

	$mysqli->query("INSERT INTO profile (Firstname, Middlename, Lastname, Address1, Address2, Birthday, Age, Region, City) VALUES ('$firstname', '$middlename', '$lastname', '$address1', '$address2','$birthday', $age, '$reg', '$city')") or die($mysqli->error);

	header("location: index.php");
}

if (isset($_GET['delete'])) {

	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM profile WHERE ID='$id'") or die($mysqli->error);
	$_SESSION['message'] = "Record Deleted Successfully!";
	$_SESSION['message_type'] = "danger";
	header("location: index.php");
 }

 if(isset($_GET['view'])) {

 	$id = $_GET['view'];
 	$update = true;
 	$results = $mysqli->query("SELECT * FROM profile WHERE ID='$id'") or die($mysqli->error);
 	if (count(array($results))==1) {

 		$row = $results->fetch_array();
 		$id = $row['ID'];
 		$firstname = $row['Firstname'];
		$middlename = $row['Middlename'];
		$lastname = $row['Lastname'];
		$birthday = $row['Birthday'];
		$address1 = $row['Address1'];
		$address2 = $row['Address2'];
		$region = $row['Region'];
		$city = $row['City'];
 	}

 }

 if(isset($_POST['update'])) {
	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$lastname = $_POST['lastname'];
	$birthday = $_POST['birthday'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$region = $_POST['region'];
	$city = $_POST['city'];

	$today = date("Y-m-d");
	$birthday = date("Y-m-d", strtotime($_POST['birthday']));
	$getage = date_diff(date_create($_POST['birthday']),date_create($today));
	$age = $getage->format('%y');

	$checking = is_numeric($region);
	if($checking==1)
	{
		$results = $mysqli->query("SELECT * FROM region WHERE ID='$region'") or die($mysqli->error);
 	if (count(array($results))==1) {

 		$row = $results->fetch_array();
 		$region = $row['Region']; 

 		}
	}

	$_SESSION['message'] = "Record Updated Successfully!";
	$_SESSION['message_type'] = "warning";

	$mysqli->query("UPDATE profile SET Firstname = '$firstname', Middlename ='$middlename', Lastname = '$lastname', Address1 = '$address1', Address2 = '$address2', Birthday = '$birthday', Age = $age, Region = '$region', City = '$city' WHERE ID = '$id' ") or die($mysqli->error);

	header("location: index.php");
}

?>