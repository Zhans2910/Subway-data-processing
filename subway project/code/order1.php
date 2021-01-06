<html>
<h1> <b>
        ~~ Admin Page: List of Materials ~~
    </b> </h1>
</html>

<?php
$servername="localhost";
$username="root";
$password="29101999";
$dbname="subway";

$conn=new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error) {
    die ("Connection failed:" . $conn->connect_error);
}
$sql="select * from materials";
$sql_outofstock="select * from materials where quantity<15";
$result_out=$conn->query($sql_outofstock);
$res_u=$conn->query($sql);
$sql_suuplier="select supplier.suppliername, supplier.description from supplier, materials where materials.idmaterials=supplier.idsupplier and materials.quantity<15 ";
$res_sup=$conn->query($sql_suuplier);
if ($res_u == true){


    echo "<br><br>";
    echo"<table border>";
    echo "<tr><td> ID materials</td><td>Name</td><td>Quantity</td></tr>";
    while($row=$res_u->fetch_assoc()){

        echo "<tr><td> " . $row['idmaterials'] . "</td><td>" . $row['name'] . "</td><td>" . $row['quantity'] . "</td></tr>";
    }
    echo "</table><br><br>";
}
else { echo "error";
}
if (mysqli_num_rows($result_out)){
    echo "some products are out of stock";
    echo"<br><br><table border>";
    echo "<tr><td> IDmaterials</td><td>Name</td><td>Quantity</td></tr>";
    while($row=$result_out->fetch_assoc()){

        echo "<tr><td> " . $row['idmaterials'] . "</td><td>" . $row['name'] . "</td><td>" . $row['quantity'] . "</td></tr>";
    }
    echo "</table><BR><br>";
    echo "Companies to call";
    echo "<br><br><table border>";
    echo "<tr><td>Company Name</td><td>Product</td><tr>";
    while($row=$res_sup->fetch_assoc()){

        echo "<tr><td> " . $row['suppliername']."</td><td>" .$row['description'].  "</td></tr>" ;
    }
}
else {"error for out of stock";}
    echo "</table>";

mysqli_close();
echo "<br><br> <button onclick='window.location.href=\"admin%20page.html\"'>go back</button>";
?>