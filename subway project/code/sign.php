<?php

$servername = "localhost";
$username = "root";
$password = "29101999";
$dbname = "subway";
$nusername=$_GET['username'];
$nlastname=$_GET['username1'];
$npassword=$_GET['password'];
$npassword1=$_GET['password1'];
$nemail=$_GET['email'];
$nphone=$_GET['phone'];
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error) {
    die ("Connection failed:" . $conn->connect_error);
}
$sql="insert into customer (idcustomer, name, password,email, phone )
values ('0', '$nusername', '$npassword', '$nemail','$nphone') on duplicate key update idcustomer=idcustomer+1 ";

if (!mysqli_query($conn, $sql)){
    die('Error: ' . mysqli_error($conn));
}
else {


    echo "Congratulations you sign up successfully<br><br>";}

mysqli_close();
?>
<html>

<body>
<p><a href="logn.html">Please sigh in</a></p>
</body>
</html>

