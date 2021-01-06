<?php
$servername = "localhost";
$username = "root";
$password = "29101999";
$dbname = "subway";
$nusername=$_GET['username'];
$npassword=$_GET['password'];
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error) {
    die ("Connection failed:" . $conn->connect_error);
}
$sql="select * from customer where name='$nusername' and password='$npassword'";
$sql_id="select idcustomer from customer where name='$nusername' and password='$npassword'";
if (!mysqli_query($conn, $sql)){
    die('Error: ' . mysqli_error($conn));
}
$result=$conn->query($sql);
$res_id=$conn->query($sql_id);

if ($result->num_rows>0){
    echo "Ready to make an order<br>";
    echo "<a href=db.html>Let's find your location</a><br><br>";
    echo "<a href=feedback.html>Leave review</a><br><br>";
if ($res_id->num_rows>0) {
    while ($row = $res_id->fetch_assoc()) {

        echo "Your id is " . $row['idcustomer'] ;

    }
}
}
else { echo "error";
}

mysqli_close();
?>

