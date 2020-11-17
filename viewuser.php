<?php
require_once 'header_admin.php';

$sql = "SELECT * FROM users";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

   while($row = $result->fetch_assoc()) {

?>		
<table class="table" border="1">
	<tr>
		<th>
		username
		</th>
		<th>
			email
		</th>
		<th>
			User Role
		</th>
		<th>
		Approve
	</tr>
		<?php   while($row = $result->fetch_assoc()) {

		?>
	<tr>

		<td><?php echo $row["username"]; ?> </td>
		<td><?php echo $row["email"]; ?> </td>
		<td><?php echo $row["user_role"]; ?> </td>
		<td><?php echo $row["approve"]; ?> </td>

		<td>

			<a  href="edit.php?userid=<?php echo $row["user_id"]; ?>">Edit </a>
			<a  href="delete.php?userid=<?php echo $row["user_id"]; ?>">Delete </a>

		 </td>
	</tr>
 <?php } ?>
</table>

<?php

	}
}
$conn->close();

require_once 'footer.php';

?>

