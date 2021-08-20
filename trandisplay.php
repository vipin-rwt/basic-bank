<!DOCTYPE html>

<!--transaction history page-->

<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
	body{
		background-color: #E5CBF2;
	}
		header{
			background-color: black;
			width: 100%;
			height:50px;

		}
		h1{
			text-align: center;
			color: black;
		}

		
	</style>
</head>
<body>
	<header>
		<div class="header">
			
		</div>
	</header>
	<h1>All Transactions</h1>

	<table border="3" width="80%" align="center">
		<tr>
			<th>Sender</th>
			<th>Receiver</th>
			<th>Amount</th>
			
			
			

		</tr>



<?php

include("connection.php");
$query="SELECT* FROM transfer";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);


	while($result=mysqli_fetch_assoc($data))
	{
	?>
		<tr>
		<th><?php echo $result['Sender'];?></th>
		<th><?php echo $result['Receiver'];?></th>
		<th><?php echo $result['Amount'];?></th>
		
		
		</tr>

<?php
	}


?>
</table>
</body>
</html>