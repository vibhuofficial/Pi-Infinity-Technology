<?php
$servername = "localhost";  // Usually provided by Big Rock
$username = "piinf51a_piinfinitydbuser";     // Your database username
$password = "Piinfinitytechnology";     // Your database password
$dbname = "piinf51a_piinfinitydb";           // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$text = $_POST['text'];

$sql = "INSERT INTO customers (name, phone, email, text) VALUES ('$name', '$phone', '$email', '$text')";

if ($conn->query($sql) === TRUE) {
    $autoresponder_email = "autoresponder@example.com"; // Replace with the actual autoresponder email
    mail($autoresponder_email, $name, $text, "From: $email");
    header('Location: thankyou.html');
} else {
    
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
