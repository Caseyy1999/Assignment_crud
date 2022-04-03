<!DOCTYPE html>
<html>
<head>
	<title>assignment</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
		
	</script>
</head>

<style type="text/css">
	.my-custom-scrollbar {
position: relative;
height: 200px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>
	
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
<script>
	function getcity(val){
		$.ajax({
			type:"POST",
			url: "getcity.php",
			data: 'regid='+val, 
			success: function(data){

				$("#city-list").html(data);
			}

		})

	}
</script>

<body>

<?php require_once 'act.php'; ?>

<?php $mysqli = new mysqli('localhost', 'root', '','assignment') or die(mysqli_error($mysqli));

$results = $mysqli->query("SELECT * from profile") or die($mysqli->error);

$res = $mysqli->query("SELECT * from region") or die($mysqli->error);
?>



<?php if(isset($_SESSION['message'])): ?>
	<div class="alert alert-<?=$_SESSION['message_type']?> ">
		<?php echo $_SESSION['message'];
		unset($_SESSION['message']);
		?>
	</div>

<?php endif ?>
<div style="text-align: center; background-color: #008000; ">
	<h3> Student Profile</h3>
</div>
<div class="row justify-content-center">

	<form action="act.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="row align-items-start">
		<div class="col" style="margin-right: 1%; >

		<div class="form-group">
			<label>First Name</label>
			<input type="textbox" name="firstname" class="form-control" value="<?php echo $firstname; ?>" placeholder="Enter First Name">

		</div>
		<div class="form-group">
			<label>Middle Name</label>
			<input type="textbox" name="middlename" class="form-control" value="<?php echo $middlename; ?>" placeholder="Enter Middle Name">

		</div>
		 <div class="col" style="margin-right: 1%;>

		<div class="form-group">
			<label>Last Name</label>
			<input type="textbox" name="lastname" class="form-control" value="<?php echo $lastname; ?>" placeholder="Enter Last Name">


		</div>
	</div>
		<div class="form-group">
			<label>Birthday</label>
			<input type="date" name="birthday" class="form-control" value="<?php echo $birthday; ?>">
	</div>
		<div class="form-group">
			<label>Address1</label>
			<input type="textbox" name="address1" class="form-control" value="<?php echo $address1; ?>" placeholder="Enter Address">
		</div>
		<div class="form-group">
			<label>Address2</label>
			<input type="textbox" name="address2" class="form-control" value="<?php echo $address2; ?>" placeholder="Enter Address">

		</div>
		<div class="form-group">
			<label>Region</label>
			<select name="region" id="region-list" class="form-control" onchange="getcity(this.value);" value = "<?php echo $region ;?>">

				<option  value= "<?php if(!empty($region)) {echo $region;} ?>">
					 <?php if(!empty($region)) {echo $region;} ?>
				</option>				
				<?php while ($row = $res->fetch_assoc()): ?>

					<option value="<?php echo $row['ID']?>" > <?php echo $row['Region'] ?> </option>

			<?php endwhile; ?>

			</select>
		</div>
		<div class="form-group">
			<label>City</label>
			<select name="city" id="city-list" class="form-control"  value = "<?php echo $city ;?>"> 

				<option  value= "<?php if(!empty($city)) {echo $city;} ?>">
					<?php if(!empty($city)) {echo $city;} ?>
			</select>
		</div>

		<div class="form-group" style="text-align: center;">
			<?php if ($update==true): ?>
				<button  type="Submit" name="update" class="btn btn-warning"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
  			<path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z"/>
			</svg> Update</button>

			<?php else: ?>
				<button  type="Submit" name="enter" class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-check" viewBox="0 0 16 16">
 			 <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
 			 <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
			</svg> Submit</button>
			<?php endif ?>
			
		</div>
			

</form>
</div>

<div class="container"></div>
	<div class="row justify-content-center"></div>
	
	<table class= "table table-bordered table-hover table-wrapper-scroll-y my-custom-scrollbar " style="background-color: white-grey; border: groove; padding: 2px; width: 75%; margin-left: 15%;">

		<thead style="background-color: #008000; text-align: center;">
			<tr>
				<th>STUDENT ID</th>
				<th>FIRST NAME</th>
				<th>MIDDLE NAME</th>
				<th>LAST NAME</th>
				<th>BIRTHDAY</th>
				<th>AGE</th>
				<th>REGION</th>
				<th>CITY</th>
				<th>ADDRESS 1</th>
				<th>ADDRESS 2</th>
				<th>Option</th>
			</tr>	
		</thead>
		
		<?php while ($row = $results->fetch_assoc()): ?>
			<tr>
			<td><?php echo $row['ID'];  ?>
			</td>
				<td><?php echo $row['Firstname']; ?>
			</td>
				<td><?php echo $row['Middlename']; ?>
			</td>
				<td><?php echo $row['Lastname'];  ?>
			</td>
				<td><?php echo $row['Birthday'];  ?>
			</td>
				<td><?php echo $row['Age'];  ?>
			</td>
				<td><?php echo $row['Region'];  ?>
			</td>
				<td><?php echo $row['City'];  ?>
			</td>
				<td><?php echo $row['Address1'];  ?>
			</td>
				<td><?php echo $row['Address2'];  ?>
			</td>
			<td> <a href="index.php?view=<?php echo $row['ID'];?>" class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
 			 <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
			  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
			</svg></a>

				<a onclick="return confirm('Confirm Deletion?')" href="act.php?delete=<?php echo $row['ID'];?>" class="btn btn-danger"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  				<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
				</svg></a></td>
			</tr>

		<?php endwhile; ?>

		</table>

	</table>
</body>
</html>