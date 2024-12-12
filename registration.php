<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
		<link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class='login-register-container'>
			<h1 class='title'>Registration</h1>
			<form action="./registration.php" method="post">
				<label for="matric">Matric:</label><br>
				<input type="text" id="matric" name="matric"><br>
				<label for="name">Name:</label><br>
				<input type="text" id="name" name="name"><br>
				<label for="pass">Password:</label><br>
				<input type="password" id="pass" name="pass"><br>
				<label for="role">Role:</label><br>
				<select name="role" id="role">
					<option value="student">Student</option>
					<option value="lecturer">Lecturer</option>
				</select>

				<br><br>

				<button type="submit" name="submit">Submit</button>
			</form>
        </div>
    </body>

</html>

<?php
    $conn = mysqli_connect("localhost", "root", "") or die("Connection Failed");
    $db_select = mysqli_select_db($conn, "lab_5b") or die("DB Selection Failed");

    if (isset($_POST['submit'])) {
        $matric = $_POST['matric'];
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $role = $_POST['role'];
    
        $sql = "INSERT INTO users(matric, name, password, role) VALUES('$matric', '$name', '$pass', '$role')";
        $result = mysqli_query($conn, $sql);
    
        if($result){
            echo "<script>
                alert('Registration Successful');
                window.location.href='login.php';
			</script>";
        }else{
            echo "<script>
                alert('Registration Failed');
			</script>";
        }
    }
?>