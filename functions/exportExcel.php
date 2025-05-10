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
header('Content-Disposition: attachment; filename="customer_data.csv"');

// Open output stream
$output = fopen("php://output", "w");

// Write CSV column headers
fputcsv($output, ['Customer ID', 'Customer Name', 'Address', 'Contact Number', 'Isle Number', 'Shelf']);


$query = "SELECT * FROM customer_table";
$result = $conn->query($query);
// Write each row to CSV
while ($row = $result->fetch_assoc()) {
    fputcsv($output, [
        $row['customer_id'],
        $row['customer_name'],
        $row['address'],
        $row['contact_number'],
        $row['isle_number'],
        $row['shelf']
    ]);
}


fclose($output);
$conn->close();
exit;
?>

