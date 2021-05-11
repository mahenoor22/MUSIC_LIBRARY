
<html>
<head>
	<title>Add Album</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="add_song.php">Add Song</a> | <a href="add_artist.php">Add Artist</a> | <a href="fetch_songs.php">View Songs</a>
	<br/><br/>

	<form action="add_album.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	<form action="delete_artist.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
			
			<?php
			include_once("connection.php");
			$sql = "SELECT name FROM album;";

			$result = mysqli_query($mysqli,$sql);
			while($res = mysqli_fetch_array($result)) {
				echo '<label>Album:';
				echo '<select name="album">';
				echo '<option value="">Select</option>';

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
			<td><input type="submit" name="Delete_rtist" value="Delete Artist"></td>
		</table>
	</form>
</body>
</html>


<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		}
		else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO album VALUES(NULL,'".$name."')");
		
		//display success message
		if($result){
            
			echo "<font color='green'>Data added successfully.";
        }else{
            echo mysqli_error($mysqli);
        }
		echo "<br/><a href='fetch_songs.php'>View Result</a>";
	}
}
?>
</body>
</html>
