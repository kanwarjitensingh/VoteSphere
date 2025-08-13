<?php
session_start();

// Simple admin authentication (for demonstration purposes only)
$admin_username = "admin"; // Change this to your desired username
$admin_password = "password"; // Change this to your desired password

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['loggedin'] = true; // Set session variable for logged in status
    } else {
        echo "Invalid credentials.";
        exit();
    }
}

// Check if the admin is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin_login.php");
    exit();
}

// Fetch vote counts from the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voting_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT candidate_name, COUNT(*) as vote_count FROM votes GROUP BY candidate_name";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Vote Counts</h2>
    <table border="1">
        <tr>
            <th>Candidate Name</th>
            <th>Vote Count</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . htmlspecialchars($row["candidate_name"]) . "</td><td>" . htmlspecialchars($row["vote_count"]) . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No votes recorded yet.</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>

<?php
$conn->close();
?>