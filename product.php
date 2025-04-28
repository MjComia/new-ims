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
  echo "Connected";
}
?>

<!-- DataTables -->

<table id="myTable" class="display">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Brand Model</th>
                <th>Price</th>
                <th>Supplier ID</th>
                <th>Sales</th>

            </tr>
        </thead>
        <tbody>
<?php 
    $query = "SELECT product_id, brand_model, price, supplier_id,  sales FROM product_table";
    $result = $conn->query($query);
    if($result->num_rows > 0 ){
      while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" .  htmlspecialchars($row['product_id']). "</td>";
        echo "<td>" .  htmlspecialchars($row['brand_model']). "</td>";
        echo "<td>" .  htmlspecialchars($row['price']). "</td>";
        echo "<td>" .  htmlspecialchars($row['supplier_id']). "</td>";
        echo "<td>" .  htmlspecialchars($row['sales']). "</td>";
      }
    }else {
      echo "<tr> <td colspan = '6'>No data found </td> </tr>";
    }
    $conn->close();
?>
          
        </tbody>
    </table>


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