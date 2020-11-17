<?php
include_once 'header_admin.php';


// $id = isset($_GET['id']) ? $_GET['id'] : '';
 $id = $_REQUEST['userid'];

$sql = "SELECT * FROM users where user_id=$id";

 $result = $conn->query($sql);

if ($result->num_rows > 0) {
  
   while($row = $result->fetch_assoc()) {
  
      $id = $row['user_id'];
      $email = $row['email'];
      $username = $row['username'];
      $role = $row['user_role'];
      $password = $row['password'];
      $approve = $row['approve'];
 
    }

?>

<form method="post" action="" class="w-50 p-5">
  <div class="form-group">
    <label for="exampleInputname1">Username</label>
    <input type="text" name="username" class="form-control"  value="<?php echo $username; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputusername">Email</label>
    <input type="text" name="email" class="form-control" placeholder="Username" value="<?php echo $email; ?>">
  </div>
    <div class="form-group">
    <label for="exampleInputusername">Role</label>
    <input type="text" name="role" class="form-control" placeholder="Role" value="<?php echo $role; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputusername">password</label>
    <input type="password" name="password" class="form-control"  placeholder="password" value="<?php echo $password; ?>">
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

   $username = $_POST['username'];
   $email = $_POST['email'];
   $role = $_POST['role'];
   $password = $_POST['password'];
   $approve = $_POST['approve'];



  $sql = "UPDATE users SET username='$username',email='$email',user_role='$role',password='$password',approve='$approve'  WHERE user_id='$id'";
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
include 'footer.php';
?>
