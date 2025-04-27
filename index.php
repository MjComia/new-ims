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
      <button class = "col-1">Add</button>
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

    <div class="modal fade" id="staticBackDrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit user information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method = "post">
          <div class="row align-items-center p-2">
          <label class = "col-4 col-form-label" for = "customer_name" >Customer name: </label> 
          <div class="col-8">
             <input type="text" name="customer_name" id="customer_name" class="form-control" required>  
          </div>
          </div>

          <div class="row align-items-center p-2">
          <label class = "col-4 col-form-label" for = "customer_address" >Address: </label> 
          <div class="col-8">
             <input type="text" name="customer_name" id="customer_address" class="form-control" required>  
          </div>
          </div>

          <div class="row align-items-center p-2">
          <label class = "col-4 col-form-label" for = "customer_contactNumber" >Contact Number: </label> 
          <div class="col-8">
             <input type="text" name="customer_name" id="customer_contactNumber" class="form-control" required>  
          </div>
          </div>

          <div class="row align-items-center p-2">
          <label class = "col-3 col-form-label" for = "customer_isle" >Isle Number: </label> 
          <div class="col-3">
             <input type="text" name="customer_name" id="customer_isle" class="form-control" required>  
          </div>
          <label class = "col-3 col-form-label" for = "customer_shelf" >Shelf Number: </label> 
          <div class="col-3">
             <input type="text" name="customer_name" id="customer_shelf" class="form-control" required>  
          </div>
          </div>
          
          <button type = "submit">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

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