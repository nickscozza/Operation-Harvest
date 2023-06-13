<?php
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$whatsapp = $_POST["whatsapp"];
$notes = $_POST["notes"];
$host = "localhost";
$dbname = "contact_db";
$username = "root";
$password = "";

$conn = mysqli_connect(hostname: $host,
username: $username, 
password: $password, 
database: $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
} 

echo "Connection successful.";

$sql = "INSERT INTO contact (name, email, phone, whatsapp, notes) 
VALUES (?, ?, ?, ?, ?)";
/*Setting the value placeholders as question marks (To prvent SQL injection attacks) */

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssiss", $name, $email, $phone, $whatsapp, $notes);
mysqli_stmt_execute($stmt);
// the type of of the inputs are all string. Therefore, we placed "sss" in the type field above (String String String)

echo "Record saved."

?>