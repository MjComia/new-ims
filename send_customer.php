<?php
$host = 'localhost';
$username =  'root';
$password = '';
$database = 'new-ims';
$conn = '';

try {
    $conn = new mysqli($host, $username, $password, $database);
} catch (mysqli_sql_exception) {
    echo "Could not connect to the database";
}
if ($conn) {
    // echo "Connected";
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['customer_id'])){
    $id = intval($_POST['customer_id']);
    $stmt = $conn->prepare("UPDATE customer_table SET is_sent = 1, sent_date =  CURDATE() WHERE customer_id = ?");
    $stmt->bind_param("i", $id);
    if($stmt->execute()){
        header("Location: index.php?status=sent");
        exit;
    }else {
        echo "Error: " . $stmt->error;
    }
}












?>
