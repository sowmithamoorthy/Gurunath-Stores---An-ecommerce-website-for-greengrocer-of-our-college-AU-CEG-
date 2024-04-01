<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $phone = $_POST["no"];
    $email = $_POST["em"];
    $address = $_POST["ad"];
    $payment_option = $_POST["pa"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "guru";

    $conn = mysqli_connect($servername, $username, $password);
    if (!$conn) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create the database if it doesn't exist
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    $res=mysqli_query($conn,$sql);
    if ($res) {
        echo "Database created successfully<br>";}


        // Create the table if it doesn't exist
        $sql1= "CREATE TABLE IF NOT EXISTS shopping (
            Firstname VARCHAR(50),
            Lastname VARCHAR(50),
            Mail_id VARCHAR(50),
            Phone_no VARCHAR(15),
            Addr VARCHAR(100),
            Payment_option VARCHAR(10)
        )";
        if ($conn->query($sql1) === TRUE) {
            echo "Table 'shopping' created successfully<br>";

            // Insert data into the table
            $sql2 = "INSERT INTO shopping (Firstname, Lastname, Mail_id, Phone_no, Addr, Payment_option) VALUES('$firstname', '$lastname', '$email', '$phone', '$address', '$payment_option')";
            if ($conn->query($sql2) === TRUE) {
                echo "Data inserted successfully<br>";
            } else {
                echo "Error inserting data: " . $conn->error . "<br>";
            }
        } else {
            echo "Error creating table: " . $conn->error . "<br>";
        }

        $conn->close(); // Close the database connection after data insertion
    } else {
        echo "Error creating database: " . $conn->error . "<br>";
    }

    $conn->close(); // Close the database connection after checking/creating the database
}
?>
