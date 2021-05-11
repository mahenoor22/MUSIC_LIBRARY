
<?php
//including the database connection file
include("connection.php");

//getting id of the data from url
$name = $_POST['artist'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM artist WHERE name='".$name."'");
//redirecting to the artist page
header("Location:add_artist.php");
?>

