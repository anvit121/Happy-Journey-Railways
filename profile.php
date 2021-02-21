<?php
session_start();
?>

<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'railway';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT password,email FROM login WHERE id = ?');

$stmt->bind_param('i', $_SESSION['id']);
$stmt->bind_param('i', $_SESSION['email']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>


<!DOCTYPE html>
<html>
<html lang="en">
    <head>
        <title>HAPPY JOURNEY RAILWAYS</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="icon" href="/images/train icon.png">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    </head>

	<body class="loggedin">
		<nav>
                <h1 id="logo">HAPPY JOURNEY RAILWAYS</h1>
                <ul class="nav-links">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="home.php">About</a></li>
                    <li><a href="home.php">Contact</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="form.php">Form</a></li>
                    
                </ul>
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
                
            </nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					
					<tr>
						<td>Email:</td>
						<td><?=$_SESSION['email']?></td>
					</tr>
					
				</table>
				
			<table>
				<div class ="profile">
				<h4>Ticket Details</h4>
				</div>
				<?php
			include('dbcon.php');
			
			$sqlget ="SELECT * FROM `ticket` ";
			$sqldata = mysqli_query($con, $sqlget) or die('error getting data');
			echo "<table>" ;
			
			echo "<tr><td>ID</td><td>Name</td><td>From</td><td>To</td><td>Class</td><td>Train Name</td><td>Passenger 1</td><td>Passenger 2</td><td>Passenger 3</td></tr>";
			while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
				if($_SESSION['name'] == $row['name']){
					
				echo "<tr><td>";
				echo $row['id'];
				echo "</td><td>";
				echo $row['name'];
				echo "</td><td>";
				echo $row['from_dest'];
				echo "</td><td>";
				echo $row['to_dest'];
				echo "</td><td>";
				echo $row['travelclass'];
				echo "</td><td>";
				echo $row['list'];
				echo "</td><td>";
				echo $row['passenger_1'];
				echo "</td><td>";
				echo $row['passenger_2'];
				echo "</td><td>";
				echo $row['passenger_3'];
			}
			}
				
			?>
				</table>
			</div>
		</div>
	</body>
</html>