<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class = "login-register-container">
			<h1 class = "title">Login</h1>
			<form action="login.php" method="post">
				<label for="Matric">Matric: </label>
				<input type="text" id="Matric" name="Matric" required><br>
				<label for="pass">Password: </label>
				<input type="password" id="pass" name="pass" required><br><br>
				<button type="submit" name="login">Login</button>
			</form>

			<p><a href = "registration.php">Register</a> here if you have not.</p>
        </div>
        
    </body>
</html>

<?php

    session_start();

    if(isset($_POST['login'])) {
        $matric = $_POST['Matric'];
        $pass = $_POST['pass'];

        $conn = mysqli_connect("localhost", "root", "") or die("Connection Failed");
        $db_select = mysqli_select_db($conn, "lab_5b") or die("DB Selection Failed");
        $sql = "SELECT * FROM users WHERE matric = '$matric' && password = '$pass'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            //echo "Login Successful";
            $_SESSION['matric'] = $matric;
            header('Location: ' . "display.php");
        } else {
            echo "<script>
				alert('Invalid Matric or Password! Please try again!');
			</script>";
        }

        mysqli_close($conn);
    }


?>