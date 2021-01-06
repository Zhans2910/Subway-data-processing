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
$sql = "SELECT * FROM transactions";

$result = $conn->query($sql);

echo "<table border>";
echo "<tr> 
        <td> ID Transaaction </td>
        <td> Card Number</td>
        <td> Date of transaction </td>
        <td>Price</td>
        <td> Order ID </td>
        <td>Customer ID</td>
        <td>CVV</td>
        <TD>Month</TD>
        <td>Year</td>
      </tr>";

if ($result->num_rows>0){
    while($row = $result->fetch_assoc()){

        echo "<tr>
        <td> {$row['idtransaction']} </td>
        <td> {$row['cardnumber']} </td>
        <td> {$row['dates']} </td>
        <td> {$row['totalprice']} </td>
        <td> {$row['order_idorder']} </td>
        <td> {$row['customer_idcustomer']} </td>
        <td> {$row['cvv']} </td>
        <td> {$row['monthcard']} </td>
        <td> {$row['yearcard']} </td>
        </tr>";

    } echo "</table>";
}else {
    echo "<h1>Warning: NO DELIVERY ENTRIES </h1>";
}
echo "<button onclick='window.location.href=\"admin%20page.html\"'>go back</button>";