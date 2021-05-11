
<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];	
	$name = $_POST['name'];
	$artist=$_POST['artist'];
	$album =$_POST['album'];
	$duration = $_POST['duration'];
	$year = $_POST['year'];	
	
	// checking empty fields
	if(empty($name) || empty($duration) || empty($year))  {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
	
		if(empty($duration)) {
			echo "<font color='red'>duration field is empty.</font><br/>";
		}
		
		if(empty($year)) {
			echo "<font color='red'>year field is empty.</font><br/>";
		}
		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE song SET name='".$name."', artist='".$artist."', album='".$album."' ,duration=".$duration.", year_of_release=".$year." WHERE id=".$id);
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM song WHERE id=".$id);

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$artist=$res['artist'];
	$album =$res['album'];
	$duration = $res['duration'];
	$year = $res['year_of_release'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="view.php">View s</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<?php
				$sql = "SELECT name FROM artist;";

				$result = mysqli_query($mysqli,$sql);
				while($res = mysqli_fetch_array($result)) {
				echo '<label>Artist:';
				echo '<select name="artist">';
				echo '<option value="' .$artist. '">"' .$artist. '"</option>';

				$num_results = mysqli_num_rows($result);
				for ($i=0;$i<$num_results;$i++) {
					$row = mysqli_fetch_array($result);
					$name = $row['name'];
					echo '<option value="' .$name. '">' .$name. '</option>';
				}

				echo '</select>';
				echo '</label>';
			}
			?>
			</tr>
			<br>
			<tr> 
			<?php
			$sql = "SELECT name FROM album;";

			$result = mysqli_query($mysqli,$sql);
			while($res = mysqli_fetch_array($result)) {
				echo '<label>Album:';
				echo '<select name="album">';
				echo '<option value="' .$album. '">"' .$album. '"</option>';

				$num_results = mysqli_num_rows($result);
				for ($i=0;$i<$num_results;$i++) {
					$row = mysqli_fetch_array($result);
					$name = $row['name'];
					echo '<option value="' .$name. '">' .$name. '</option>';
				}

				echo '</select>';
				echo '</label>';
			}
			?>
			</tr>
			<tr> 
				<td>duration</td>
				<td><input type="text" name="duration" value="<?php echo $duration;?>"></td>
			</tr>
			<tr> 
				<td>year</td>
				<td><input type="text" name="year" value="<?php echo $year;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
