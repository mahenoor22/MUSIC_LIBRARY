
<?php
//including the database connection file
include("connection.php");

//getting id of the data from url
$name = $_POST['album'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM album WHERE name='".$name."'");
if($result){
            
			echo "<font color='green'>Data added successfully.";
        }else{
            echo mysqli_error($mysqli);
        }
//redirecting to the display page (view.php in our case)
header("Location:add_album.php");
?>

