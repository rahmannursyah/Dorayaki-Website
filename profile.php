<?php
include './layouts/header.php';
include './database/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/homepage.css">
</head>
<body>
	
	<div class="chooserYourBody" style="text-align: center; margin-top: 2%;">
	<a class="btn btn-primary" href="./profile.php?show=profile" role="button" style="margin-right: 10px;">My Profile</a>
	<a class="btn btn-primary" href="./profile.php?show=transaction" role="button" style="margin-left: 10px;">Transaction History</a>
	</div>

	<?php
		if(isset($_GET['show'])){

	?>
	<div class="bodyContent">
		
		<?php
			if($_GET['show'] === 'profile'){

			?>	

			<div class="thisMyProfile" style="text-align: center; padding-left: 500px; padding-right: 500px">
				<form method="POST" action="./controllers/doProfile.php">
				
					<input type="text" hidden="true" name="id" value="<?=$_SESSION['user']['id']?>" readonly="true">
					<br>
					<br>
					<label>Username</label><br>
					<p><?php echo htmlspecialchars($_SESSION['user']['Username'],ENT_QUOTES) ?></p>
					<br>
					<label>Email</label><br>
					<p><?php echo htmlspecialchars($_SESSION['user']['Email'],ENT_QUOTES) ?></p>
				</form>
			</div>


			<?php
			}else if($_GET['show'] === 'transaction'){

			?>

			<div class="thisMyProfile" style="text-align: center; padding-left: 500px; padding-right: 500px;margin-top: 50px">
				
				<table style="width:100%;">
				  <tr>
				    <th>Product Name</th>
				    <th>Transaction Date</th>
				    <th>Status</th>
				  </tr>


				  	<?php

				  	$userID = $_SESSION['user']['id'];

					$query = "SELECT * FROM header_transacion_tbl WHERE UserId = $userID";
				  		
				  		$result = mysqli_query($connect,$query);
				  		

				  		while($row = $result->fetch_assoc()){

				  			$approve = $row['Approvement'];
				  			$date = $row['Date'];

				  			$transID = $row['transactionId'];

				  			$secQuery = "SELECT p.Nama FROM
				  			transaction_tbl tt JOIN products p ON tt.ProductID = p.ID";
				  			$secResult = mysqli_query($connect,$secQuery);
				  			while($secrow = $secResult->fetch_assoc()){

				  				?>


				  					<tr>
				  					  <td><?=$secrow['Nama']?></td>
				  					  <td><?=$date?></td>
				  					  <td style="color: green">Success</td>
				  				 	 </tr>
				
				  				<?php

				  		}
				  	}
				  	?>

				  

				</table>

			</div>
			<?php
			}
		?>

	</div>

	<?php
		}
	?>

</body>
</html>

