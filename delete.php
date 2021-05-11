
<?php
//including the database connection file
include("connection.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM song WHERE id=$id");

//redirecting to the display page (view.php in our case)
header("Location:view.php");
?>

