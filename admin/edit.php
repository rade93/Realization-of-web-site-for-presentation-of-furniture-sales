<?php
	if(isset($_GET['edit_id']))
	$sql = "SELECT * FROM posts WHERE id = '$_GET[edit_id]'";
	$run = mysqli_query($conn,$sql);
	while($rows = mysqli_fetch_assoc($run)){ ?>
		
	<?php
	}
?>