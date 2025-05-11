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
header('Content-Disposition: attachment; filename="supplier_data.csv"');

// Open output stream
$output = fopen("php://output", "w");

// Write CSV column headers
fputcsv($output, ['Supplier ID', 'Supplier Name', 'Branch Address']);


$query = "SELECT * FROM suppliers_table";
$result = $conn->query($query);
// Write each row to CSV
while ($row = $result->fetch_assoc()) {
    fputcsv($output, [
        $row['supplier_id'],
        $row['supplier_name'],
        $row['branch_address'],
    ]);
}


fclose($output);
$conn->close();
exit;
?>
