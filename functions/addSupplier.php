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
?>

  <div class="modal fade" id="addSupplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Supplier</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method = "post">
        <input type = "hidden" name = "form_type" value = "add_supplier">
           <!-- Supplier Info -->

          <div class="row align-items-center p-2">
          <label class = "col-4 col-form-label" for = "add_supplier_name" >Supplier name: </label> 
          <div class="col-8">
             <input type="text" name="add_supplier" id="add_supplier_name" class="form-control" required>  
          </div>
            </div>

            <div class="row align-items-center p-2">
          <label class = "col-4 col-form-label" for = "add_supp_address" >Address: </label> 
          <div class="col-8">
             <input type="text" name="supp_address" id="add_supp_address" class="form-control" required>  
          </div>
            </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
   
      </div>
    </div>
  </div>
</div>


<?php

if($_SERVER["REQUEST_METHOD"] === "POST" && $_POST['form_type'] === "add_supplier") {
    $add_supplier = $_POST['add_supplier'];
    $add_supp_address = $_POST['supp_address'];

    $stmt = $conn->prepare("INSERT INTO suppliers_table(supplier_name, branch_address) VALUES (?,?)");
    $stmt->bind_param("ss",$add_supplier, $add_supp_address);

 try{
    $stmt->execute();
    echo "<script>
    alert('Supplier added successfully!');
    window.location.href = '" . $_SERVER['PHP_SELF'] . "?success=1';
  </script>";
 }  catch (mysqli_sql_exception $e){
    echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
 } $stmt->close();
}$conn->close();


?>