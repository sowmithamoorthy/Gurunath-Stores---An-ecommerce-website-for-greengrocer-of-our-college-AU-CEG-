<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = isset($_POST["fname"]) ? $_POST["fname"] : "";
    $lastname = isset($_POST["lname"]) ? $_POST["lname"] : "";
    $phone = isset($_POST["no"]) ? $_POST["no"] : "";
    $email = isset($_POST["em"]) ? $_POST["em"] : "";
    $address = isset($_POST["ad"]) ? $_POST["ad"] : "";
    $payment_option = isset($_POST["pa"]) ? $_POST["pa"] : "";

    // Validate required fields before proceeding
    if (empty($firstname) || empty($lastname) || empty($phone) || empty($email) || empty($address) || empty($payment_option)) {
        echo "Error: Please fill in all the required fields.";
        exit();
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "guru";
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        $conn->select_db($dbname);
        $sql = "CREATE TABLE IF NOT EXISTS shopping (
            Firstname VARCHAR(50),
            Lastname VARCHAR(50),
            Mail_id VARCHAR(50),
            Phone_no VARCHAR(15),
            Addr VARCHAR(100),
            Payment_option VARCHAR(10)
        )";
        if ($conn->query($sql) === TRUE) {
            $sql = "INSERT INTO shopping (Firstname, Lastname, Mail_id, Phone_no, Addr, Payment_option) 
                    VALUES ('$firstname', '$lastname', '$email', '$phone', '$address', '$payment_option')";
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                // Redirect to another page after successful insertion
                header("Location: 1.html");
                exit();
            } else {
                echo "Error inserting data: " . $conn->error . "<br>";
            }
        } else {
            echo "Error creating table: " . $conn->error . "<br>";
        }
    } else {
        echo "Error creating database: " . $conn->error . "<br>";
    }
    $conn->close();
}
?>
