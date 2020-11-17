<?php
include_once 'conn.php';
include_once 'header_admin.php';


$sql = "DELETE FROM post WHERE post_id='" . $_GET["userid"] . "'";

	if (mysqli_query($conn, $sql))
	 {
	    echo "Post deleted successfully";
	} 
	else 
	{
	    echo "Error deleting record: " . mysqli_error($conn);
	}
mysqli_close($conn);
include_once 'footer.php';
?>