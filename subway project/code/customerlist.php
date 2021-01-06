<html>
<h1> <b>
        ~~ Admin Page: List of Customers ~~
    </b> </h1>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "29101999";
$dbname = "subway";
$conn=new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error) {
    die ("Connection failed:" . $conn->connect_error);
}
$sql="select * from customer";

if (!mysqli_query($conn, $sql)){
    die('Error: ' . mysqli_error($conn));
}
$result=$conn->query($sql);

if (mysqli_num_rows($result)){
    echo"<table  border style='collapse' >";
    echo "<tr><td> ID Customer</td><td>Name</td><td>Password</td><td>email</td><td>Phone</td></td>";
    while($row=$result->fetch_assoc()){

        echo "<tr><td> " . $row['idcustomer'] . "</td><td>" . $row['name'] . "</td><td>" . $row['password'] . "</td><td>".$row['email']."</td><td>".$row['phone']."</td></tr>";
    }
    echo "</table>";
}
else { echo "error";
}

mysqli_close();

echo "<br><br> <button onclick='window.location.href=\"admin%20page.html\"'>go back</button>";
?>