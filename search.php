<?php
include 'header.php';
$query = $_GET['query'];


$sql = "SELECT * FROM post WHERE post_title LIKE '%$query%' or post_description LIKE '%$query%' or post_excerpt LIKE '%$query%' ";

$result = $conn->query($sql);

 if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

		$post_title  = $row["post_title"]; 
		$post_description =  $row["post_description"]; 
 		$post_excerpt = $row["post_excerpt"]; 
		 
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="title">';
		echo $post_title;
		echo '</div>';
		echo '<div class="post_excerpt">';
		echo $post_excerpt;
		echo '</div>';
	 	echo '<div class="readmore">';
	 	echo '<a href="single.php?userid=',$row["post_id"],'"> Read More </a>';
	 	echo '</div>'; 
	 }
}
$conn->close();
require_once 'footer.php';

?>
