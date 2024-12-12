<?php
    session_start();
	if(!isset($_SESSION['matric'])){
		echo "<script>
			alert('Invalid session.');
			window.location.href = 'index.php';
		</script>";
	}

	if(isset($_GET['matric'])){
		$matric = $_GET['matric'];
		$conn = mysqli_connect("localhost", "root", "") or die("Connection Failed");
		$db_select = mysqli_select_db($conn, "lab_5b") or die("DB Selection Failed");
		$sql = "DELETE FROM users WHERE matric = '$matric'";
		$result = mysqli_query($conn, $sql);
		if($result){
			echo "<script>
				alert('Record Deleted Successfully');
				window.location.href = 'display.php';
			</script>";
		}
		else{
			echo "<script>
				alert('There is an error!');
				window.location.href = 'display.php';
			</script>";
		}
		mysqli_close($conn);
	}

	else{
		echo "<script>
			alert('There is an error!');
			window.location.href = 'display.php';
		</script>";
	}
?>