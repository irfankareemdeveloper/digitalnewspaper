<?php
	include 'conn.php';

	$user_id	= $_REQUEST['user_id']; 
	$post_id=$_REQUEST['post_id'];
	$comment=$_REQUEST['comment'];
	$sql = "INSERT INTO post_comments (user_id,post_id, comment,date)
			VALUES ('$user_id','$post_id', '$comment', 'now()')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
	?>