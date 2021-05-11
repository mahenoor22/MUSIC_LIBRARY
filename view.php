
<?php
//including the database connection file
include_once("connection.php");

?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="fetch_songs.php">View Songs</a> | <a href="add_song.php">Add Song</a> | <a href="add_album.php">Add Album</a> | <a href="add_artist.php">Add Artist</a> </a>
	<br/><br/>
	<form action="fetch_songs.php" method="post">
	<input type="text" name="search">
	<select name="search_opt" id="search_opt">
		<option value="song">Search by song</option>
		<option value="artist">Search by artist</option>
		<option value="duration">Search by duration</option>
	</select>
	<input type="submit" name="submit" value="Search">
	</form>
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Name</td>
			<td>Album</td>
			<td>Artist</td>
			<td>duration</td>
			<td>year</td>
			<td>Update</td>
		</tr>
		<?php
		if(isset($_POST['submit'])){
			$search_opt=$_POST['search_opt'];
			$search=$_POST['search'];
			if ($search_opt=='song'){
				$result = mysqli_query($mysqli, "SELECT * FROM song where name='".$search."' ORDER BY id");
			}
			else if($search_opt=='artist'){
				$result = mysqli_query($mysqli, "SELECT * FROM song where artist='".$search."' ORDER BY id");
				
			}
			
			else if(($search_opt=='duration')){
				$result = mysqli_query($mysqli, "SELECT * FROM song where duration=".$search." ORDER BY id");
				
			}
		}
		else{
			
		$result = mysqli_query($mysqli, "SELECT * FROM song ORDER BY id");

		}
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['album']."</td>";	
			echo "<td>".$res['artist']."</td>";	
			echo "<td>".$res['duration']."</td>";
			echo "<td>".$res['year_of_release']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td></tr>";		
		}
		
		?>
	</table>	
</body>
</html>
