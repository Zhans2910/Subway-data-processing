<html>
<h1> <b>
        ~~ User Interface for Delivery Company ~~
    </b> </h1>
</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "29101999";
$dbname = "subway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "SELECT * FROM delivery";

$result = $conn->query($sql);

echo "<table border>";
echo "<tr> 
        <td> Delivery ID </td>
        <td> Order ID </td>
        <td> Shop Nearest ID </td>
        <td> Delivery Address </td>
      </tr>";

if ($result->num_rows>0){
    while($row = $result->fetch_assoc()){

        echo "<tr>
        <td> {$row['iddelivery']} </td>
        <td> {$row['ordering_idorder']} </td>
        <td> {$row['shop_idshop']} </td>
        <td> {$row['deliveryplace_idorderplace']} </td>
        </tr>";

    } echo "</table>";
}else {
    echo "<h1>Warning: NO DELIVERY ENTRIES </h1>";
}

echo "<br><br>-------------------------------------------------------------------------------------<br><br>";

$sql2 = "SELECT * FROM deliveryplace";

$result2 = $conn->query($sql2);

echo "<table border>";
echo "<tr> 
        <td> Delivery Address </td>
        <td> Latitude </td>
        <td> Longitude </td>
      </tr>";

if ($result2->num_rows>0){
    while($row = $result2->fetch_assoc()){

        echo "<tr>
        <td> {$row['idorderplace']} </td>
        <td> {$row['lats']} </td>
        <td> {$row['longs']} </td>
        </tr>";

    } echo "</table>";
}else {
    echo "<h1>Warning: NO DELIVERY LOCATIONS </h1>";
}



$conn->close();
echo "<button onclick='window.location.href=\"admin%20page.html\"'>go back</button>";
?>

