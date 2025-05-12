<?php 

include "header.php";
include "navbar.php";

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
?>

<!-- DataTables -->
<div class="card border-2">
  <div class="card-body">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
      <span>Transaction List</span>
      <div class="d-flex gap-2">
        <a href="functions/exportExcel.php" class="btn btn-success btn-sm">Export to Excel</a>
      </div>
    </div>
<table id="myTable" class="display">
        <thead>
            <tr>
                <th>Transaction ID</th>
                <th>Customer ID</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Purchase Date</th>
            </tr>
        </thead>
        <tbody>
<?php 
    $query = "SELECT transaction_id, customer_id, product_id, quantity, total_price, purchase_date FROM transactions_table";
    $result = $conn->query($query);
    if($result->num_rows > 0 ){
      while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" .  htmlspecialchars($row['transaction_id']). "</td>";
        echo "<td>" .  htmlspecialchars($row['customer_id']). "</td>";
        echo "<td>" .  htmlspecialchars($row['product_id']). "</td>";
        echo "<td>" .  htmlspecialchars($row['quantity']). "</td>";
        echo "<td>" .  htmlspecialchars($row['total_price']) . "</td>";
        echo "<td>" .  htmlspecialchars($row['purchase_date']). "</td>";
      }
    }else {
      echo "<tr> <td colspan = '6'>No data found </td> </tr>";
    }
    $conn->close();
?>
          
        </tbody>
    </table>
</div>



<!-- jQuery -->
<script src="lib/jquery/jquery-3.7.1.min.js"></script>
<!-- DataTables -->
<script src="lib/datatables/dataTables.js"></script>

<script>
  $(document).ready(function () {
    $('#myTable').DataTable(); // Activate DataTable
  });
</script>
<?php include "footer.php"; ?>