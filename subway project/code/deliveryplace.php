
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

$sql = "SELECT * FROM deliveryplace";

$result = $conn->query($sql);

echo "<table border>";
echo "<tr> 
        <td> Delivery Address </td>
        <td> Latitude </td>
        <td> Longitude </td>
      </tr>";

if ($result->num_rows>0){
    while($row = $result->fetch_assoc()){

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
echo "<button onclick='window.location.href=\"main.html\"'>go back</button>";
?>

