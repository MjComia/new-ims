<?php 

include "db-debug.php"; // Include the database connection file for debugging
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
 <div class="card border-2">
  <div class="card-body">
    <div class="card-header">Inventory</div>
    <div class="row">

      <div class="col-1"></div>
      <div class="col-1"></div>
      <div class="col-1"></div>
      <div class="col-1"></div>
      <div class="col-1"></div>
      <div class="col-1"></div>
      <div class="col-1"></div>
      <div class="col-1"></div>
      <div class="col-1"></div>
      <div class="col-1"></div>
      <div class="col-1"></div>      
      <button class = "col-1"
              data-bs-toggle ='modal'
              data-bs-target ='#addCustomer' >Add</button>
    </div>
<table id="myTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Isle Number</th>
                <th>Shelf Number</th>
                <th>Actions</th>
                
            </tr>
            
        </thead>
        <tbody>

<?php 
    $query = "SELECT customer_id, customer_name, address, contact_number, isle_number, shelf FROM customer_table";
    $result = $conn->query($query);
    if($result->num_rows > 0 ){
      while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" .  htmlspecialchars($row['customer_id']). "</td>";
        echo "<td>" .  htmlspecialchars($row['customer_name']). "</td>";
        echo "<td>" .  htmlspecialchars($row['address']). "</td>";
        echo "<td>" .  htmlspecialchars($row['contact_number']). "</td>";
        echo "<td>" .  htmlspecialchars($row['isle_number']) . "</td>";
        echo "<td>" .  htmlspecialchars($row['shelf']). "</td>";
        echo "<td> <button 
        type = 'button'
        class='edit-button btn' 
        onclick = 'edit(); ' 
        data-bs-toggle ='modal'
        data-bs-target ='#staticBackDrop' >Edit</button> </td>";
      }
    }else {
      echo "<tr> <td colspan = '6'>No data found </td> </tr>";
    }

?>
  </div>  
 </div> 


          
        </tbody>
    </table>
<?php
include "addFunction.php";
?>
<!-- jQuery -->
</script>
<script src="lib/jquery/jquery-3.7.1.min.js"></script>
<!-- DataTables -->
<script src="lib/datatables/dataTables.js"></script>

<script>
  $(document).ready(function () {
    $('#myTable').DataTable(); // Activate DataTable

  });
</script>
<?php include "footer.php"; 
    $conn->close();
?>
