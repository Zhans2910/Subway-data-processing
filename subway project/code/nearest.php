<?php
$servername = "localhost";
$username = "root";
$password = "29101999";
$dbname = "subway";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$lat=(isset($_GET['lat']))?$_GET['lat']:'';
$long=(isset($_GET['long']))?$_GET['long']:'';

//do whatever you want

$sql = "SELECT idshop,( 3959 * acos( cos( radians('$lat') ) * cos( radians( lat ) ) * cos( radians( longs )
            - radians('$long') ) + sin( radians('$lat') ) * sin( radians( lat ) ) ) ) AS distance FROM shop order by distance limit 1";
$result=$conn->query($sql);
$row1 = $result->fetch_assoc();
$row11=$row1['distance'];
$row12=$row1['idshop'];
$sql1="insert into deliveryplace (lats,longs) values ('$lat','$long') on duplicate key update idorderplace=idorderplace+1 ";
$conn->query($sql1);
$sql_ema="select max(idorder) as maxorder from ordering";
$res_ema=$conn->query($sql_ema);
$row0 = $res_ema->fetch_assoc();
$row01=$row0['maxorder'];
$sql_ema1="select max(idorderplace) as maxorderplace from deliveryplace";
$res_ema1=$conn->query($sql_ema1);
$row5 = $res_ema1->fetch_assoc();
$row55=$row5['maxorderplace'];
$sql_m="insert into delivery (shop_idshop, ordering_idorder,deliveryplace_idorderplace) values ('$row12','$row01','$row55') 
        on duplicate key update iddelivery=iddelivery+1";
if ($result->num_rows>0) {
          if ($conn->query($sql_m)){
     echo "We got your address and found shop<br><br>";
     echo "<a href=\"order.html\">Ready to make order</a>";
     }}
//} else {
//    echo "fail";

else {echo "failed";}
?>