<?php
session_start();
if(!isset($_SESSION['matric'])){
	echo "<script>
			alert('Invalid session.');
			window.location.href = 'index.php';
		</script>";
}
?>

<html>
	<head>
		<title>Update user</title>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
		<div class='update-container'>
			<h1 class='title'>Update</h1>
			<?php if(isset($_GET['matric']) && isset($_GET['name']) && isset($_GET['level'])){ ?>
				<form action="update.php" method="post">
				<label for="matric">Matric</label>
				<input type="text" id="matric" name="matric" value="<?php echo $_GET['matric']; ?>"><br>
				<label for="name">Name</label>
				<input type="text" id="name" name="name" value="<?php echo $_GET['name']; ?>"><br>
				<label for="accessLevel">Access Level</label>
				<select name="accessLevel">
				<option value="student" <?php echo ($_GET['level'] == 'student') ? 'selected' : ''; ?>>Student</option>
				<option value="lecturer" <?php echo ($_GET['level'] == 'lecturer') ? 'selected' : ''; ?>>Lecturer</option>
				</select><br>
				
				<input type="hidden" name="oldmatric" value="<?php echo $_GET['matric']; ?>">
				<button type="submit" value="Update" name="submit">Update</button>
				
				<button class='cancel-button' onclick="window.location.href = 'display.php';">Cancel</button>
				</form>
				
				
				<?php }	else if (isset($_POST['submit'])){
					$conn = mysqli_connect("localhost", "root", "") or die("Connection Failed");
					$db_select = mysqli_select_db($conn, "lab_5b") or die("DB Selection Failed");
					
					$sql = "UPDATE users SET 
						matric = '" . $_POST['matric'] . "', 
						name = '" . $_POST['name'] . "', 
						role = '" . $_POST['accessLevel'] . "' 
						WHERE matric = '" . $_POST['oldmatric'] . "'";
					
					if(mysqli_query($conn, $sql)){
						echo "<script> 
							alert('Record updated successfully');
							window.location.href = 'display.php';
							</script>
							";
					} else {
						echo "Error updating record: <script> alert('Error updating record: " . mysqli_error($conn) . "')</script>";
					}
				}	else	{
					echo "<script>
									alert('Invalid request');
									window.location.href = 'display.php';
								</script>";
				}
			?>
		</div>
	</body>
</html>
