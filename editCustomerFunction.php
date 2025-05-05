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
  // echo "Connected EDIT";
}
?>

<!-- EDIT CUSTOMER INFO MODAL -->

<div class="modal fade modal-lg" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit user information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="editCustomerFunction.php" method = "POST">
        <input type="hidden" name="customer_id" id="editCustomer">
        <input type="hidden" name="edit_submit" value="1">
          <div class="row align-items-center p-2">
          <label class = "col-4 col-form-label" for = "customer_address" >Address: </label> 
          <div class="col-8">
             <input type="text" name="address" id="customer_address" class="form-control" required>  
          </div>
          </div>

          <div class="row align-items-center p-2">
          <label class = "col-4 col-form-label" for = "customer_contactNumber" >Contact Number: </label> 
          <div class="col-8">
             <input type="" name="contact_number" id="customer_contactNumber" class="form-control" required>  
          </div>
          </div>

          <div class="row align-items-center p-2">
          <label class = "col-3 col-form-label" for = "customer_isle" >Isle Number: </label> 
          <div class="col-3">
             <input type="text" name="isle_number" id="customer_isle" class="form-control" required>  
          </div>
          <label class = "col-3 col-form-label" for = "customer_shelf" >Shelf Number: </label> 
          <div class="col-3">
             <input type="text" name="shelf_number" id="customer_shelf" class="form-control" required>  
          </div>
          </div>
          
     <div class="modal-footer">
          <button   class='btn btn-primary edit-button' type = "submit" name  = "edit_submit">Edit</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
        </form>
      </div>
 
    </div>
  </div>
</div>

<?php

$conn = new mysqli('localhost', 'root', '', 'new-ims');


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_submit'])) {
  $customer_id = $_POST['customer_id'];
  $address = $_POST['address'];
  $contact_number = $_POST['contact_number'];
  $isle_number = $_POST['isle_number'];
  $shelf_number = $_POST['shelf_number'];

  if ($conn) {
    $stmt = $conn->prepare("UPDATE customer_table SET address=?, contact_number=?, isle_number=?, shelf=? WHERE customer_id=?");
    $stmt->bind_param("ssiii", $address, $contact_number, $isle_number, $shelf_number, $customer_id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Customer info updated successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Update failed: " . $conn->error . "');</script>";
    }

    $stmt->close();
  
} else {
    echo "<script>alert('Database connection not found.');</script>";
}
}

?>
