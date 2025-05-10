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
header('Content-Disposition: attachment; filename="product_data.csv"');

// Open output stream
$output = fopen("php://output", "w");

// Write CSV column headers
fputcsv($output, ['Transaction ID', 'Customer ID', 'Product ID', 'Quantity', 'Total Price', 'Purchase Date']);


$query = "SELECT * FROM transactions_table";
$result = $conn->query($query);
// Write each row to CSV
while ($row = $result->fetch_assoc()) {
    fputcsv($output, [
        $row['transaction_id'],
        $row['customer_id'],
        $row['product_id'],
        $row['quantity'],
        $row['total_price'],
        $row['purchase_date']
    ]);
}


fclose($output);
$conn->close();
exit;
?>
