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

// Fetch vote counts
$sql = "SELECT candidate_name, COUNT(*) as vote_count FROM votes GROUP BY candidate_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output vote counts
    while($row = $result->fetch_assoc()) {
        echo "Candidate: " . $row["candidate_name"] . " - Votes: " . $row["vote_count"] . "<br>";
    }
} else {
    echo "No votes recorded yet.";
}

$conn->close();
?>