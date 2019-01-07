<?php include('process.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration system using PHP and MySQL</title>
	<link rel="stylesheet" type="text/css"	href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script type = "text/javascript" src = "bootstrap/js/jquery-slim.min.js"></script>
	<script type = "text/javascript" src = "bootstrap/js/popper.min.js"></script>
	<script type = "text/javascript" src = "bootstrap/js/bootstrap.js"></script>
</head>
<body>
<div id="main">
			<nav>
			
				<ul>

					
					<li><a href="register.php">Sign up</a></li>
					<li><a href="login.php">Sign in</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
		
		
	</div>
	<?php require_once 'process.php';?>
	
	<?php
	
	if(isset($_SESSION['message'])):?>
	
	<div class="alert alert-<?=$_SESSION['msg_type']?>">
	
	<?php 
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	?>
	</div>
	<?php endif ?>
	<div class="container">
	<?php
		$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
		$result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
		//pre_r($result);
		
		?>
		<a href="index3.php"class="btn btn-info">Create info</a>
		<a href="index.php"class="btn btn-info">Back</a>
		<div class="row justify-content-center">
		<br><br><br>
			<table class="table">
			
				<thead>
					<tr>
						<th>firstname</th>
						<th>lastname</th>
						<th>address</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				
				<?php
					while($row=$result->fetch_assoc()):?>
					
						<tr>
							<td><?php echo $row['firstname']?></td>
							<td><?php echo $row['lastname']?></td>
							<td><?php echo $row['address']?></td>
							<td>
								<a href="index3.php?edit=<?php echo $row['id'];?>"
									class="btn btn-info">Edit</a>
								<a href="process.php?delete=<?php echo $row['id'];?>"
									class="btn btn-danger">Delete</a>
									
							</td>
						</tr>
						<?php endwhile;?>
			</table>
		</div>
		<?php
		function pre_r($array){
			echo'<pre>';
			print_r($array);
			echo'</pre>';
		}
	
	?>
	
</div>
</body>
</html>