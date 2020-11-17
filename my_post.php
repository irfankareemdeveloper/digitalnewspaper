<?php
	// include('conn.php');
   	// include('session.php');
    include('header.php');
?>

<?php 
	$sql = "SELECT * FROM users where approve = 'Yes'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
	
	$count = mysqli_num_rows($result);
	if($count>0){

 ?>

<div class="container">
	<div class="row mt-3">
			<?php
			$sql = "SELECT * FROM post  where author = '$login_userid'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				   while($row = $result->fetch_assoc()) {
			
				   	$post_title = $row['post_title'];
				   	$post_description = $row['post_description'];
				   	$post_excerpt   = $row['post_excerpt'];
				   	$post_image		= $row['post_image'];
				   

				   	?>

				   	<div class="col-4">
				   		<div class="post_image">
				   			<img src="postimages/<?php echo $post_image; ?>" alt="post_image" class="img-fluid"/>
				   		</div> 

				   	</div>

				   	<div class="col-8">
				   		<div class="post_details">
				   			<div class="post_title">
				   				<h2> <?php echo $post_title; ?></h2>
				   			</div>
				   			<div class="post_excerpt">
				   				<h6> <?php echo $post_excerpt; ?></h6>
				   			</div>
				   		</div> 
				   		<div class="readmore"><a href="single.php?userid=<?php echo $row["post_id"]; ?>"> Read More </a> 	
				   			<a  href="edit_post_user.php?userid=<?php echo $row["post_id"]; ?>">Edit </a>
							<a  href="delete_post.php?userid=<?php echo $row["post_id"]; ?>">Delete </a> 
						</div>


				   	</div>

				   	<?php
				  
				   }
		   	}		  

			?>
		
	</div>
</div>
<?php
}
else
{
	echo "Your Account is under Review We will back to you soon";
}

 include('footer.php');
 ?>
      

   