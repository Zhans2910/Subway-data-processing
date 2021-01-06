<?php
$servername = "localhost";
$username = "root";
$password = "29101999";
$dbname = "subway";
$ndate=$_GET['date'];
$ndate1=$_GET['end'];;
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error) {
    die ("Connection failed:" . $conn->connect_error);
}
$sql="select customer_idcustomer, sum(totalprice) as amount from transactions where dates>='$ndate' and dates<='$ndate1' group by customer_idcustomer;";

if (!mysqli_query($conn, $sql)){
    die('Error: ' . mysqli_error($conn));
}
$result=$conn->query($sql);

if ($result->num_rows>0){


    echo "<table border='1'>
<tr><td>customerID</td>
<td>Amount</td></tr>";
while($row=$result->fetch_assoc()){
        echo "<tr><td>" . $row['customer_idcustomer'] . "</td><td>" . $row['amount'] ."</td></tr>";
    }
echo "</table>";

}
else { echo "error";
}
echo "<a href='admin%20page.html'>Back to Admin Page</a>";

mysqli_close();
?>