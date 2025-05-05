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


<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['customer_id'])){
$customer_id = $_POST['customer_id'];

if(isset($conn)){

  $stmtTrans = $conn->prepare("DELETE FROM transactions_table WHERE customer_id = ?");
  $stmtTrans->bind_param("i", $customer_id);
  $stmtTrans->execute();
  $stmtTrans->close();


  $stmt  = $conn->prepare("DELETE FROM customer_table WHERE customer_id = ?");
  $stmt->bind_param("i", $customer_id);
  $stmt->execute();
  $stmt->close();

  echo "<script>window.location.href = window.location.href; </script>";
  exit();
}else {
  echo "<script>alert('Database connection not found.');</script>";
}
}




?>





<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
  <div class="modal-dialog">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this user? This action cannot be undone.
        <input type = "hidden" name = "customer_id" id = "deleteCustomerId">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </div>
    </form>
  </div>
</div>  