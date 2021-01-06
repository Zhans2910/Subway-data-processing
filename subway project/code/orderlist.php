<?php

$servername = "localhost";
$username = "root";
$password = "29101999";
$dbname = "subway";
//create connection
$conn=mysqli_connect($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error){
    die ("Connection failed:" .$conn->connect_error);
}

$sql1="update materials set quantity=quantity-1 where idmaterials in ('$nbread','$nfilling','$nsalad','$nsauce')";
$sql="select * from ordering";
$sql_order="insert into ordering (totoalprice, product_idproduct) select price, idproduct from product where idproduct=$nfilling-4 on duplicate key update idorder=idorder+1";
$res_u=$conn->query($sql);
$sql_ema="select max(idorder) as maxorder from ordering";
$res_ema=$conn->query($sql_ema);
$row1 = $res_ema->fetch_assoc();
$row11=$row1['maxorder'];
$sql_price="select totoalprice from ordering where idorder=$row11";
$res_price=$conn->query($sql_price);
$row2=$res_price->fetch_assoc();
$row22=$row2['totoalprice'];

if ($conn->query($sql) == true){
        if (mysqli_query($conn, $sql)) {
        echo "<table border=1>";
        echo "<tr><td> ID order</td><td>Total Price</td><td>Product ID</td></tr>";
        while ($row = $res_u->fetch_assoc()) {

            echo "<tr><td> " . $row['idorder'] . "</td><td>" . $row['totoalprice'] . "</td><td>" . $row['product_idproduct'] . "</td></tr>";
        }
        echo "</table><br><br>";
    }}
else { echo "error";}

mysqli_close();
echo "<button onclick='window.location.href=\"admin%20page.html\"'>go back</button>";
?>

