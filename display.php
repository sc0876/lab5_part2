<?php
	session_start();
	if(!isset($_SESSION['matric'])){
		echo "<script>
				alert('Invalid session.');
				window.location.href = 'index.php';
			</script>";
	} else if (isset($_GET['logout'])) {
		session_destroy();
		echo "<script>
				alert('Logged out successfully.');
				window.location.href = 'index.php';
			</script>";
	}
?>

<html>
    <head>
        <title>display users</title>

		<link rel = "stylesheet" href="style.css">
        <script>
            function logout() {
                window.location.href = 'display.php?logout=true';
            }

			function update(matric, name, role) {
				window.location.href = 'update.php?matric=' + matric + '&name=' + name + '&level=' + role;
			}

			function deleteF(matric) {
				window.location.href = 'delete.php?matric=' + matric;
			}
        </script>
    </head>

    <body>

		<div class = "display-container">
		<table class = "display-table">
            <tr>
                <th>Matric</th>
                <th>Name</th>
                <th>Level</th>
                <th>Action</th>
            </tr>

            <?php
                $conn = mysqli_connect("localhost", "root", "") or die("Connection Failed");
                $db_select = mysqli_select_db($conn, "lab_5b") or die("DB Selection Failed");

                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row['matric'] . "</td><td>" . $row['name'] . "</td><td>" . $row['role'] . "</td>
                        <td class='action-cell'>
							<button class='action-button' onclick = 'update(\"" . $row['matric'] . "\", \"" . $row['name'] . "\", \"" . $row['role'] . "\")'>Update</button>
							<button class='action-button' onclick = 'deleteF(\"" . $row['matric'] . "\")'>Delete</button>
                        </td>
                        </tr>";
                    }
                }
            ?>
        </table>

        <br> <button class onclick = 'logout()'>Logout</button>
		</div>
    </body>
</html>

