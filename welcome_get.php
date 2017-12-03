<html>
<body>
<?php include 'db.php';?>
Welcome <?php echo $_GET["name"]; ?><br>
Your email address is: <?php echo $_GET["email"]; ?>

<?php
include 'db.php';
$tmp = $_GET["name"];
$tmp = preg_replace("/[^a-zA-Z0-9]+/", "", $tmp);
$name = substr($tmp, 0, 20);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO voters (handle) VALUES ('$name')";


if ($conn->query($sql) === TRUE) {
    echo "<br>New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
</body>
</html>
