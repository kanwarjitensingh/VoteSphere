<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voting_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$candidate_name = $_POST['candidate_name'];

// Insert vote into the database
$sql = "INSERT INTO votes (candidate_name) VALUES ('$candidate_name')";

if ($conn->query($sql) === TRUE) {
    echo "Vote recorded successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>