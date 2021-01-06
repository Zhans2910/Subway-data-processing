<?php
$servername="localhost";
$username="root";
$password="29101999";
$dbname="subway";
$nbread=$_GET['bread'];
$nfilling=$_GET['filling'];
$nsalad=$_GET['salad'];
$nsauce=$_GET['sauce'];
$nid=$_GET['id'];
//create connection
$conn=mysqli_connect($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error){
    die ("Connection failed:" .$conn->connect_error);
}
$sql1="update materials set quantity=quantity-1 where idmaterials in ('$nbread','$nfilling','$nsalad','$nsauce')";
$sql="select * from ordering";
$sql_zad="select price from product where idproduct=$nfilling-4";
$res_zad=$conn->query($sql_zad);
$row3=$res_zad->fetch_assoc();
$row33=$row3['price'];
$sql_zada="select idproduct from product where idproduct=$nfilling-4";
$res_zada=$conn->query($sql_zada);
$row4=$res_zada->fetch_assoc();
$row44=$row4['idproduct'];

$sql_order="insert into ordering (totoalprice, product_idproduct, bread, filling, salad, sauce) values ('$row33','$row44','$nbread','$nfilling','$nsalad', $nsauce) on duplicate key update idorder=idorder+1";
$res_u=$conn->query($sql);
$sql_ema="select max(idorder) as maxorder from ordering";
$res_ema=$conn->query($sql_ema);
$row1 = $res_ema->fetch_assoc();
$row11=$row1['maxorder'];
$sql_price="select totoalprice from ordering where idorder=$row11";
$res_price=$conn->query($sql_price);
$row2=$res_price->fetch_assoc();
$row22=$row2['totoalprice'];
if ($conn->query($sql1) == true){

    if (mysqli_query($conn, $sql_order)) {

        echo "The order is accepted<br><br>";
        echo "The price is " .$row33;
}}
else { echo "error";}

mysqli_close();
?>
<html><head>
    <link href="transaction.css" rel="stylesheet" type="text/css"/>
    <link href="" rel="stylesheet">
</head>
<body>
<form method="get" action="transaction.php">
  <div class="form-header" align="center">
      <h4 alighn="center" class="title"><b>Credit card detail</b></h4>
  </div>
 
  <div class="form-body">
    <!-- Card Number -->
      <input type="text" name="id"> Enter your id that was shown before<br><br>
    <input type=\"text\" name="card" class=\"card-number\" placeholder=\"Card Number\">
 
    <!-- Date Field -->
    <div class=\"date-field\">
      <div class="month">
        <select name="month">
          <option value="january">January</option>
          <option value="february">February</option>
          <option value=\"march\">March</option>
          <option value=\"april\">April</option>
          <option value=\"may\">May</option>
          <option value=\"june\">June</option>
          <option value=\"july\">July</option>
          <option value=\"august\">August</option>
          <option value=\"september\">September</option>
          <option value=\"october\">October</option>
          <option value=\"november\">November</option>
          <option value=\"december\">December</option>
        </select>
      </div>
      <div class="year">
        <select name="year">
          <option value=\"2016\">2016</option>
          <option value=\"2017\">2017</option>
          <option value=\"2018\">2018</option>
          <option value=\"2019\">2019</option>
          <option value=\"2020\">2020</option>
          <option value=\"2021\">2021</option>
          <option value=\"2022\">2022</option>
          <option value=\"2023\">2023</option>
          <option value=\"2024\">2024</option>
        </select>
      </div>
    </div>
 
    <!-- Card Verification Field -->
    <div class="card-verification">
      <div class="cvv-input">
        <input type=\"text\" name="cvv" placeholder=\"CVV\">
      </div>
      <div class="cvv-details">
          <p><i>3 or 4 digits usually found <br> on the signature strip</i></p>
      </div>
    </div>
 <p><br><br>
      </p>
    <!-- Buttons -->
    <INPUT type="submit" value="Proceed">
  </div>
</form>
</body></html>


