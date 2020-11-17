<?php
 require_once 'header.php';

// $id = isset($_GET['id']) ? $_GET['id'] : '';
 $id = $_REQUEST['userid'];

$sql = "SELECT * FROM post where post_id=$id";

 $result = $conn->query($sql);

if ($result->num_rows > 0) {
  
   while($row = $result->fetch_assoc()) {
  
      $post_id = $row['post_id'];
      $post_title = $row['post_title'];
      $post_description = $row['post_description'];
      $post_excerpt = $row['post_excerpt'];
    }

?>

<form method="post" action="" enctype="multipart/form-data" class="w-50 p-5">
  <div class="form-group">
    <label for="exampleInputname1">Post Title</label>
    <input type="text" name="post_title" class="form-control"  value="<?php echo $post_title; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputusername">Post Description</label>
    <input type="textarea" name="post_description" class="form-control" placeholder="Description" value="<?php echo $post_description; ?>">
  </div>
    <div class="form-group">
    <label for="exampleInputusername">Post Excerpt</label>
    <input type="text" name="post_excerpt" class="form-control" placeholder="Excerpt" value="<?php echo $post_excerpt; ?>">
  </div>
     <div class="form-group">
    <label for="exampleInputusername">Post Image</label>
    <input type="file" name="post_image" id="post_image">
  </div>

  <button type="submit" name="update" class="btn btn-primary float-right">Send For Approve</button>
</form>

<?php
}

if(isset($_POST['update'])){

   $post_title = $_POST['post_title'];
   $post_description = $_POST['post_description'];
   $post_excerpt = $_POST['post_excerpt'];
   $image = $_FILES['post_image']['name'];
   move_uploaded_file($_FILES["post_image"]["tmp_name"], "postimages/" . $image);




  $sql = "UPDATE post SET post_title='$post_title',post_description='$post_description',post_excerpt='$post_excerpt',post_image = '$image'  WHERE post_id='$id'";
  $results =  $conn->query($sql);  

    if ($results) 
    {
      echo "Record updated successfully";
    }
    else 
    {
      echo "Error updating record: " . $conn->error;
    }
}
$conn->close();
?>
