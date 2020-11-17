<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
	// include('conn.php');
   	// include('session.php');
    include('header.php');
?>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<?php 
	
	$post_id = $_REQUEST['userid'];

	$userid = $login_userid;
	$sql = "SELECT * FROM users where approve = 'Yes'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

	$count = mysqli_num_rows($result);
	if($count>0){

			 ?>

			<div class="container">
				<div class="row">
						<?php
						$sql = "SELECT * FROM post  where isactive = 'Yes' and post_id = '$post_id'";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							   while($row = $result->fetch_assoc()) {
							
							   	$post_title = $row['post_title'];
							   	$post_description = $row['post_description'];
							   	$post_excerpt   = $row['post_excerpt'];
							   	$post_image		= $row['post_image'];
						
							   	?>
							   	<div class="col-8">
							   		<div class="post_image">
							   			<img src="postimages/<?php echo $post_image; ?>" alt="post_image" class="img-flupost_id" width= "100%"/>
							   		</div> 

							   	</div>
							   	<div class="col-4">
							  
							   	</div>

							   	<div class="col-8">
							   		<div class="post_details">
							   			<div class="post_title">
							   				<h2> <?php echo $post_title; ?></h2>
							   			</div>
							   			<div class="post_excerpt">
							   				<h6> <?php echo $post_description; ?></h6>
							   			</div>
							   		</div> 
							   	</div>
							   	<div class="col-4">
							   	</div>
							   	<?php
							   }
					   	}		  

						?>
					
				</div>
			</div>
			<?php
		}
?>
<?php 

	$sql = "SELECT u.username, u.user_role, p.comment,p.date FROM `post_comments` p JOIN users u on p.user_id = u.user_id where p.post_id = '$post_id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '	<div class="title ml-5"> 
					<h1> Comments </h1>
				</div>';
		   while($row = $result->fetch_assoc()) {
		
		 	$post_description = $row['comment'];
		 	$username = $row['username'];
		 	$user_role = $row['user_role'];
		 	$post_date = $row['date'];
		
		
		?>

		<div class="container">
			<div class="row">
			
			</div>
			<div class="row">
				<div class="user_details mt-3"> 
				 <h4> Posted By :  <?php echo $username; ?> </h4>
				<div class="date">
					<?php echo $post_date ?>
				</div>
				<div class="post_description">
					<?php echo $post_description ?>
				</div>
				</div>
				
			</div>
		</div>


		<?php }
	} ?>

<form method="POST" name="comment_form" class="w-50 p-5">
  <div class="form-group">
    <label for="exampleInputusername">Comment</label>
    <input type="text" id="comment_decription" class="form-control" placeholder="Type Your Message">
    <input type="hidden" id="post_id" value="<?php echo $post_id ?>">
     <input type="hidden"  id="user_id" value="<?php echo $userid ?>">
  </div>
  <button type="button" id="update_button" name="update_button" class="btn btn-primary float-right">Post Comment</button>
  <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
</form>

<?php

?>
<script>
$(document).ready(function() {
	$('#update_button').on('click', function() {
		var user_id = $('#user_id').val();
		var post_id = $('#post_id').val();
		var comment = $('#comment_decription').val();
	
		if(comment!="" ){
			$.ajax({
				url: "save_comment.php",
				type: "POST",
				data: {
					user_id: user_id,
					post_id: post_id,
					comment: comment,
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('.comment_form').find('input:text').val('');
						$("#success").show();
						$('#success').html('Data added successfully !'); 						
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field!');
		}
	});
});
</script>

<?php		

 include('footer.php');
 ?>
      
 