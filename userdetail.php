<!DOCTYPE html>

<!--Page showing the user details and option to transfer money-->

<html>
<head>
	<meta charset="utf-8">
	<title></title>
    
  

	<style type="text/css">
	body{
		background-color:black;
	}
    header{
        width: 100%;
        height: 50px;
        background-color:blueviolet;
    }
		.send{
			background:linear-gradient(white,grey);
			width:140px;
			height:140px;
			border-radius:50%;
			margin: auto;
		}
		.send1{
		margin: auto;
		transform: translateX(285%);
		width:200px;
		height:35px;
		border-radius:5px;
		background-color:#3262D0;
		}
		span{
			color:white ;
			font-weight:800;
			font-size:1.2em;
		}
		button:hover{
			background-color:#41C20E;
            scale: 1.0;
		}
		table{
			border-collapse: collapse;
		}
        
        .transff{
        	
            width: 100%;
        	display:flex;
        	flex-direction: column;
        	margin: auto;
       
        	
        }
        #trs{
            align-self: center;
            width:50%;
            transform:scale(0);
        }
        select{
            width: 50%;
            height:35px;
        }
       
        input[type="number"]{
        	width: 50%;
        	height:30px;
            background-color: white;
        	margin-top:5px;
        	margin-bottom:10px;
        }
        label{
        	color: white;
        	font-weight:900;
        	font-size:1.3em;
        }
        .real{
            margin: auto;
       
        width:200px;
        height:35px;
        border-radius:5px;
        background-color:#3262D0;

        }
	</style>
</head>
<body >
<header></header>

<?php
include("connection.php");
if(isset($_GET['id'])){
	$sid=$_GET['id'];
	//echo $sid;
}
else
{
	echo "error";
}

$query="SELECT * FROM custom WHERE ID=$sid";
$result=mysqli_query($conn,$query);


$rows=mysqli_fetch_assoc($result);
?>


 <h1 style="text-align: center;color: white;font-size:3em;">User details</h1>


<table width="80%" border="3" align="center" style="margin-bottom:10%;color:white;">
	<tr style="font-size: 1.8em;">
	   <th>ID</th>
	   <th>Name</th>
	   <th>Email</th>
	   <th>Balance</th>
	</tr>
	<tr style="text-align: center;font-weight:800;font-size: 1.5em;"  border="0">
		<td><?php echo $rows['ID'];?></td>
		<td><?php echo $rows['Name'];?></td>
		<td><?php echo $rows['Email'];?></td>
		<td><?php echo $rows['Balance'];?></td>
	</tr>
</table>

<div class="send">
	<img src="sendmo.png" style="width:80%;display: block;margin-right: auto;margin-left: auto;">
</div>
<button  onclick="send()" type="button" class="send1" style="margin-bottom:5%"><span>Send money</span></button>



<div class="transff">
	<form id="trs" method="POST">
       
         
	 <label>Transfer To:</label>
        <select name="to" class="form-control" required>
            <option value="" selected="selected">--Select--</option>
            <?php
                $sql = "SELECT * FROM custom where ID!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)):; 
            ?>
                <option class="table" value="<?php echo $rows['ID'];?>" >
                
                    <?php echo $rows['Name'] ;?>
               
                </option>
          <?php endwhile;?>
        </select><br>
        <br>
         <label for="#amt">Amount:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="number" size="5" name="amount" id="Amt" placeholder="Enter the amount"  required>
        <br>
        <br>

	    <button type="submit" name="submit" class="real" onclick="funSend()" ><span> Send money</span></button>
        
    </form>
</div>


<script type="text/javascript">
    function send(){
let e=document.getElementById("trs");
 e.style.transform= "scale(1.0)";
}
</script>




<?php
include 'connection.php';

if(isset($_POST['submit']))
{
    $from = $sid;
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from custom where ID=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql= "SELECT * from custom where ID=$to";
    $query = mysqli_query($conn,$sql);
    if($query){
    while($sql2 = mysqli_fetch_array($query))
        {
            $receive=$sql2['Name'];
        }}



    
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    }


  
    
    else if($amount > $sql1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")'; 
        echo '</script>';
    }
    


   
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                
                $newbalance = $sql1['Balance'] - $amount;
                $sql = "UPDATE custom set Balance=$newbalance where ID=$from";
                mysqli_query($conn,$sql);
             

                
                $newbalance = $sql2['Balance'] + $amount;
                $sql = "UPDATE custom set Balance=$newbalance where ID=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['Name'];
                $receiver = $receive;
                $sql = "INSERT INTO transfer VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);
            
           
          
                 if($query){
                    print "<script>
                       
                        alert('Transaction Successful');
                                     window.location.href='display.php';
                           </script>";
                          
                    }
             

                $newbalance= 0;
                $amount =0;
        }
    
}
?>




</body>
</html>











