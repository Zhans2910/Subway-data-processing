<?php
$servername = "localhost";
$username = "root";
$password = "29101999";
$dbname = "subway";
$ncard=$_GET['card'];
$nyear=$_GET['year'];
$nmonth=$_GET['month'];
$ncvv=$_GET['cvv'];
$nid=$_GET['id'];
$timezone=date_default_timezone_set('South Korea/Seoul');
//create connection
$conn=new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error){
    die ("Connection failed:" .$conn->connect_error);
}
$sql_ema="select max(idorder) as maxorder from ordering";
$res_ema=$conn->query($sql_ema);
$row1 = $res_ema->fetch_assoc();
$row11=$row1['maxorder'];
$sql_price="select totoalprice from ordering where idorder=$row11";
$res_price=$conn->query($sql_price);
$row2=$res_price->fetch_assoc();
$row22=$row2['totoalprice'];
$sql="insert into transactions ( cardnumber, dates, totalprice, order_idorder, customer_idcustomer,cvv,monthcard,yearcard) values ('$ncard', now(),'$row22','$row11' ,'$nid','$ncvv','$nmonth', '$nyear') on duplicate key update idtransaction=idtransaction+1";
if (mysqli_query($conn, $sql)) {
    echo "Transaction is successfully completed<BR><br>";
    echo "<br><br>";
    }
else {echo "error" ;}
mysqli_close();
echo "<br><br> <button onclick='window.location.href=\"login.html\"'>go back</button>";
?>
<html>
<body>
<p>
<
</p>
</body>
</html>
