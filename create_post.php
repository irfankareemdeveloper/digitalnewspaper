<?php
 require_once 'conn.php';
 include('session.php');
  include('header.php');

?>
<form method="post" action="create_post.php" enctype="multipart/form-data" class="w-50 p-5">
  <div class="form-group">
    <label for="exampleInputname1">title</label>
    <input type="text" name="post_title" class="form-control" placeholder="Enter Post Title">
  </div>
  <div class="form-group">
    <label for="exampleInputusername">Description</label>
    <input type="text" name="post_description" class="form-control" placeholder="Enter The Text Here">
  </div>
  <div class="form-group">
    <label for="exampleInputusername">Excerpt</label>
    <input type="text" name="post_excerpt" class="form-control"  placeholder="Enter The Short Description">
  </div>
	<div class="form-group">
    <label for="exampleInputusername">Upload Post Image</label>
    <input type="file" name="post_image" id="post_image">
  </div>

  <button type="submit" name="submit" class="btn btn-primary float-right">Create New Post</button>
</form>

<?php

if(isset($_POST['submit'])){

	
	$image = $_FILES['post_image']['name'];
	 move_uploaded_file($_FILES["post_image"]["tmp_name"], "postimages/" . $image);

	 $post_title = $_POST['post_title'];
	 $post_description = $_POST['post_description'];
	 $post_excerpt = $_POST['post_excerpt'];

	$sql = "INSERT INTO post (post_title,post_description, post_excerpt,post_image,author)
	VALUES ('$post_title','$post_description' ,'$post_excerpt','$image',$login_userid)";

	$results = $conn->query($sql);
		if ($results) {
		  echo "Post Created Successfully.";

			exit();
		} 
		else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}

}
else
{
	echo 'button click not working';
}

include 'footer.php';
?>