<html>

<?php $mysqli = new mysqli('localhost', 'root', '','assignment') or die(mysqli_error($mysqli));

$regid = $_POST['regid'];

$results = $mysqli->query("SELECT * from city WHERE RegionID = $regid") or die($mysqli->error);

?>
<option value="">Choose</option>

		<?php while ($row = $results->fetch_assoc()): ?>

<option value="<?php echo $row['City']?>"><?php echo $row['City']?>

</option>

<?php endwhile; ?>


</html>