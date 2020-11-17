<?php
include('header_admin.php');
if(isset($_SESSION['login_user'])){
$sql = "SELECT *
FROM post p
 JOIN users u ON u.user_id=p.author";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
?>

<table class="table" border="1">
	<tr>
		<th>
		Post Title
		</th>
		<th>
		Post Description
		</th>
		<th>
		Post Excerpt
		</th>
		<th>
		Author
		</th>
		<th>
		Draft/Published
		</th>
		<th>
		Edit/Delete
		</th>
	</tr>
		<?php   while($row = $result->fetch_assoc()) {

		?>
	<tr>

		<td><?php echo $row["post_title"]; ?> </td>
		<td><?php echo $row["post_description"]; ?> </td>
		<td><?php echo $row["post_excerpt"]; ?> </td>
		<td><?php echo $row["username"]; ?> </td>

		<td><?php echo $row["isactive"]; ?> </td>
		<td>

			<a  href="edit_post.php?userid=<?php echo $row["post_id"]; ?>">Edit </a>
			<a  href="delete_post.php?userid=<?php echo $row["post_id"]; ?>">Delete </a>

		 </td>
	</tr>
 <?php } ?>
</table>

<?php

 
} else {
  echo "Data nahi hai bhai";
}
}
else{
	  header("Location: login.php");
}
$conn->close();

include('footer.php');
?>

