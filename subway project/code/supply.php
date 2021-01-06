<?php
$servername = "localhost";
$username = "root";
$password = "29101999";
$dbname = "subway";
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error) {
    die ("Connection failed:" . $conn->connect_error);
}
$sql="insert into supplier_transaction (materials_idmaterials, shop_idshop)
values () on duplicate key update idcustomer=idcustomer+1 ";

if (!mysqli_query($conn, $sql)){
    die('Error: ' . mysqli_error($conn));
}
else {


    echo "Congratulations you sign up successfully";

}

mysqli_close();
?>