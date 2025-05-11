<?php
$host = 'localhost';
$username =  'root';
$password = '';
$database = 'new-ims';
$conn = ''; 

try{
  $conn = new mysqli($host, $username, $password, $database);

}catch(mysqli_sql_exception){
  echo"Could not connect to the database";
}
if ($conn){
  // echo "Connected";
}

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="stock_data.csv"');

// Open output stream
$output = fopen("php://output", "w");

// Write CSV column headers
fputcsv($output, ['Stock ID', 'Product ID', 'Stock Quantity']);


$query = "SELECT * FROM stock_table";
$result = $conn->query($query);
// Write each row to CSV
while ($row = $result->fetch_assoc()) {
    fputcsv($output, [
        $row['stock_id'],
        $row['product_id'],
        $row['stock_quantity'],
    ]);
}


fclose($output);
$conn->close();
exit;
?>
