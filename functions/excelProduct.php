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
fputcsv($output, ['Product ID', 'Brand Model', 'Price', 'Supplier ID', 'Sales']);


$query = "SELECT * FROM product_table";
$result = $conn->query($query);
// Write each row to CSV
while ($row = $result->fetch_assoc()) {
    fputcsv($output, [
        $row['product_id'],
        $row['brand_model'],
        $row['price'],
        $row['supplier_id'],
        $row['sales'],
    ]);
}


fclose($output);
$conn->close();
exit;
?>
