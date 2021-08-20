

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

<!--This is page displaying customer list-->


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
	<h1>Customer list</h1>

	<table border="3" width="80%" align="center">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Email</th>
			<th>Balance</th>
			<th>Details</th>
			

		</tr>



<?php

//...calling data from database..... 

include("connection.php");
$query="SELECT* FROM CUSTOM";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
?>

	<?php
	while($result=mysqli_fetch_assoc($data))
	{
		?>
	
	
		<tr>
		<td><?php echo $result['ID'];?></td>
		<td><?php echo $result['Name'];?></td>
		<td><?php echo $result['Email'];?></td>
		<td><?php echo $result['Balance'];?></td>
		   <td><a href="userdetail.php?id=<?php echo $result['ID'];?>"><button style="margin-left:30%;">Show Details</button></a></td> 
                    </tr>
        

<?php
	}
	?>


</table>
</body>
</html>
