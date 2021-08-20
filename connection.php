<?php

//---Making connection with tha database---

$servername="localhost";
$username="root";
$password="";
$dbname="customer_list";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
	//echo "connected";
}
else
{
	echo "aborted";
}



?>