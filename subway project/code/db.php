<?php
function showPosition(position) {
    document.getElementById("lats").value=+position.coords.latitude;
    document.getElementById("longs").value=+position.coords.longitude;
}
function getLocation() {
    if (navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition);
    }
}

?>
<html>
<head>
    <style>
        .button {
            width: 500px;
            background-color: #4CAF50;
            border: none;
            color: black;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 150px 400px;
            cursor: pointer;
        }
    </style>
</head>
<body onload="getLocation()">
<script type="text/javascript">

</script><form method="post" action="nearestLocation.php">
<input  name="lats" id="lats">
<input  name="longs" id="longs">

    <input type="submit" name="subm" id="butm" value="Send" > Find Nearest Place</form>

</body>
</html>
