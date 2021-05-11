<html>
<head>
	<title>Add Artist</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="add_artist.php">Add Artist</a> | <a href="add_album.php">Add Album</a> | <a href="fetch_songs.php">View Songs</a>
	<br/><br/>

	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<br>
			<tr>
			<?php
			include_once("connection.php");

			$sql = "SELECT name FROM artist;";

			$result = mysqli_query($mysqli,$sql);
			while($res = mysqli_fetch_array($result)) {
				echo '<label>Artist:';
				echo '<select name="artist">';
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
			<br>
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
			<tr> 
				<td>Duration</td>
				<td><input type="text" name="duration"></td>
			</tr>
			<tr> 
				<td>year</td>
				<td><input type="text" name="year"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

