<?php
 
     include('header_admin.php');
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
      $approve = $row['isactive'];
 
    }

?>

<form method="post" action="" class="w-50 p-5">
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
    <label for="exampleInputusername">Approve</label>
    <input type="text" name="approve" class="form-control"  placeholder="Yes/No" value="<?php echo $approve; ?>">
  </div>

  <button type="submit" name="update" class="btn btn-primary float-right">Update</button>
</form>

<?php
}

if(isset($_POST['update'])){

   $post_title = $_POST['post_title'];
   $post_description = $_POST['post_description'];
   $post_excerpt = $_POST['post_excerpt'];
   $approve = $_POST['approve'];



  $sql = "UPDATE post SET post_title='$post_title',post_description='$post_description',post_excerpt='$post_excerpt',isactive='$approve'  WHERE post_id='$id'";
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
    include('footer.php');
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>