<?php
$servername = "localhost";
$username = "root";
$password = "29101999";
$dbname = "subway";
$nid=$_GET['id'];
$nfed=$_GET['fed'];
$conn=new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error){
    die ("Connection failed:" .$conn->connect_error);
}
$sql="insert into feedback (descriptions, customer_idcustomer) values ('$nfed', '$nid') on duplicate key update idfeedback=idfeedback+1";
if (mysqli_query($conn, $sql)){
    echo "You added info successfully";
}
else {echo "error";}
echo "<a href=login.html>";