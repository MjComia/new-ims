<?php 
// include "db-debug.php"; // Include the database connection file for debugging
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
        <span>Customer List</span>
        <div class="d-flex gap-2">
          <a href="functions/exportExcel.php" class="btn btn-success btn-sm">
            <i class="fas fa-file-excel"></i> <!-- Optional icon -->
            Export to Excel
          </a>
          <button 
              class="btn btn-sm custom-add-button" 
              data-bs-toggle="modal" 
              data-bs-target="#addCustomer"
            >
              <i class="fas fa-plus"></i> 
          </button>
        </div>
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
                <th>Status</th>
                <th>Date Sent</th>
                
            </tr>
            
        </thead>
        <tbody>

<?php 
    $query = "SELECT customer_id, customer_name, address, contact_number, isle_number, shelf, is_sent, sent_date FROM customer_table";
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
        echo "<td>
        
        <form action = 'generate.php' method = 'POST' target = '_blank'>
        <input type = 'hidden' name = 'customer_id' value = '".htmlspecialchars($row['customer_id'])."'> 
        <input type = 'hidden' name = 'customer_name' value = '".htmlspecialchars($row['customer_name'])."'> 
        <input type = 'hidden' name = 'customer_address' value = '".htmlspecialchars($row['address'])."'> 
        <input type = 'hidden' name = 'contact_number' value = '".htmlspecialchars($row['contact_number'])."'> 
        <input type = 'hidden' name = 'isle_number' value = '".htmlspecialchars($row['isle_number'])."'> 
        <input type = 'hidden' name = 'shelf_number' value = '".htmlspecialchars($row['shelf'])."'> 

        
     


        
        <div class='button-group'>
          <button 
            type='button'
            class='edit-button btn custom-edit-button'  
            onclick='edit();' 
            data-bs-toggle='modal'
            data-bs-target='#editModal' 
            data-customer-id='" . htmlspecialchars($row['customer_id']) . "'
            data-address='" . htmlspecialchars($row['address']) . "' 
            data-contact='" . htmlspecialchars($row['contact_number']) . "' 
            data-isle='" . htmlspecialchars($row['isle_number']) . "' 
            data-shelf='" . htmlspecialchars($row['shelf']) . "'
          >
            <i class='fas fa-edit'></i>
          </button>

          <button
            type='button'
            class='btn btn-danger' 
            data-bs-toggle='modal' 
            data-bs-target='#deleteModal'
            data-customer-id='" . htmlspecialchars($row['customer_id']) . "'
          >
            <i class='fas fa-trash'></i>
          </button>
          
          <button
            type='submit'
            class='btn btn-secondary'
          >
            <i class='fas fa-file-pdf'></i>
          </button>   
        </div>  

        </form>
        </td>";
        echo"<td>
            <form action = 'send_customer.php' method = 'POST'>
            <input type = 'hidden' name = 'customer_id' value = '". htmlspecialchars($row['customer_id'])."'>
            <button type = 'submit' class = 'btn btn-success' ". ($row['is_sent'] ? "disabled" : "") .">
            ".($row['is_sent'] ? "Sent" : "Send")."
            </button>
            </form>
        </td>";
      echo "<td>" . htmlspecialchars($row['sent_date']) . "</td>";
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
function inOut(button){

  if(button.innerText === 'Active'){
    button.innerText = 'Inactive';
    button.classList.remove('btn-success');
    button.classList.add('btn-danger');
  }else{
    button.innerText = 'Active';
    button.classList.remove('btn-danger');
    button.classList.add('btn-success');
  }
}

</script>
<script>
  $(document).ready(function () {
    $('#myTable').DataTable(); // Activate DataTable

  });
</script>
<?php include "footer.php"; 
    
?>
