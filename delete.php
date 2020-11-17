<?php
include_once 'conn.php';
include_once 'header.php';


$sql = "DELETE FROM users WHERE user_id='" . $_GET["userid"] . "'";

	if (mysqli_query($conn, $sql))
	 {
	    echo "Record deleted successfully";
	} 
	else 
	{
	    echo "Error deleting record: " . mysqli_error($conn);
	}
mysqli_close($conn);
include_once 'footer.php';

?>