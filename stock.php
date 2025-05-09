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
    <div class="card-header">Inventory</div>
<table id="myTable" class="display">
        <thead>
            <tr>
                <th>Stock ID</th>
                <th>Product ID</th>
                <th>Stock Quantity</th>


            </tr>
        </thead>
        <tbody>
<?php 
    $query = "SELECT product_id, stock_quantity, stock_id FROM stock_table";
    $result = $conn->query($query);
    if($result->num_rows > 0 ){
      while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" .  htmlspecialchars($row['stock_id']). "</td>";
        echo "<td>" .  htmlspecialchars($row['product_id']). "</td>";
        echo "<td>" .  htmlspecialchars($row['stock_quantity']). "</td>";
      }
    }else {
      echo "<tr> <td colspan = '6'>No data found </td> </tr>";
    }
    $conn->close();
?>
          
        </tbody>
    </table>
  </div>
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