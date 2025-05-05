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
  // echo "Connected";
}
?>



<!-- DataTables -->
 <div class="card border-2">
  <div class="card-body">
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
        data-bs-target ='#editModal' 
        data-customer-id = '" .htmlspecialchars($row['customer_id']) . "'
        data-address='" . htmlspecialchars($row['address']) . "' 
        data-contact='" . htmlspecialchars($row['contact_number']) . "' 
        data-isle='" . htmlspecialchars($row['isle_number']) . "' 
        data-shelf='" . htmlspecialchars($row['shelf']) . "'
        >Edit</button>

        <button
        type = 'button'
        class='btn btn-danger' 
        data-bs-toggle='modal' 
        data-bs-target='#deleteModal'
        data-customer-id = '" .htmlspecialchars($row['customer_id']) . "'
        >Delete</button>
        

        </td>";
      }
    }else {
      echo "<tr> <td colspan = '6'>No data found </td> </tr>";
    }
$conn->close();
?>
  </div>  
 </div> 


          
        </tbody>
    </table>

<?php include "editCustomerFunction.php"; ?>
<?php include "deleteFunction.php";?>  
<?php include "addFunction.php"; ?>


<!-- jQuery -->
</script>
<script src="lib/jquery/jquery-3.7.1.min.js"></script>
<!-- DataTables -->
<script src="lib/datatables/dataTables.js"></script>


<script>
document.addEventListener('DOMContentLoaded', function () {

// DELETE Modal logic
document.getElementById('deleteModal').addEventListener('show.bs.modal', function(event){
  const button = event.relatedTarget;
  const customerId = button.getAttribute('data-customer-id');
  document.getElementById('deleteCustomerId').value = customerId; //ung deleteCustomerId sa deleteFunction.php
});

// // EDIT Modal logic
// document.getElementById('editModal').addEventListener('show.bs.modal', function(event){
//   const button = event.relatedTarget;
//   const editCustomerId = button.getAttribute('data-customer-id');
//   document.getElementById('editCustomer').value = editCustomerId;
// });


});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  // Edit Modal logic
  document.getElementById('editModal').addEventListener('show.bs.modal', function(event) {
    const button = event.relatedTarget;
    
    // Get data attributes from the clicked button
    const customerId = button.getAttribute('data-customer-id');
    const address = button.getAttribute('data-address');
    const contact = button.getAttribute('data-contact');
    const isle = button.getAttribute('data-isle');
    const shelf = button.getAttribute('data-shelf');
    

        
    console.log("Edit button clicked for customer ID:", customerId);
    console.log("Address:", address);
    console.log("Contact:", contact);
    console.log("Isle:", isle);
    console.log("Shelf:", shelf);

    // Set values to form fields
    document.getElementById('editCustomer').value = customerId;
    document.getElementById('customer_address').value = address || '';
    document.getElementById('customer_contactNumber').value = contact || '';
    document.getElementById('customer_isle').value = isle || '';
    document.getElementById('customer_shelf').value = shelf || '';
  });
});
</script>
<script>
  $(document).ready(function () {
    $('#myTable').DataTable(); // Activate DataTable

  });
</script>
<?php include "footer.php"; 
    
?>
