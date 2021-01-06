<?php

$servername = "localhost";
$username = "root";
$password = "29101999";
$dbname = "subway";
$nid=$_GET['id'];
$nfed=$_GET['fed'];
$conn=new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error){
    die ("Connection failed:" .$conn->connect_error);
}
$sql="select idfeedback, descriptions from feedback";
$res=$conn->query($sql);
echo"<h1><center>Comments</center></h1>";

    while ($row1 = $res->fetch_assoc()) {
        echo "<center><table width=\"400px\">";
        echo "<tr><td width=\"100px\"><h3>" .$row1['idfeedback']."</h3></td><td width=\"100px\"><h3>".$row1['descriptions']. "</h3></td></tr>";
    }
echo"</center></table>";
    ?>
<html>
<body><center><img src="saba.jpg"></center>
<h2><a href="login.html">GO BACK</a></h2>
<h2><a href="feedback.html">Leave feedback if you know your id</a></h2>
</body>
</html>
