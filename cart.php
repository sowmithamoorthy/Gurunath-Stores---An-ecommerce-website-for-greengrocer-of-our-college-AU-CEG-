<?php
// Replace these with your actual database credentials
$servername = "localhost";
$username = "root";
$dbname = "products";
$password="";
// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);
/*if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "connxn success";
}*/
if($_SERVER["REQUEST_METHOD"]=="GET"){
    $iname=$_GET["item"];
    $iprice=$_GET["price"];
    $sql = "INSERT INTO gurunath(ITEM,PRICE) VALUES ('$iname','$iprice')";
    if($conn->query($sql)==true){
        echo "Please Click back button to continue shopping";
    }
    else{
        echo "no";
    }
}

    ?>