<!-- EDIT CUSTOMER INFO MODAL -->

<div class="modal fade modal-lg" id="staticBackDrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit user information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <div class="row align-items-center p-2">
          <label class="col-4 col-form-label" for="customer_name">Customer name: </label> 
          <div class="col-8">
             <input type="text" name="customer_name" id="customer_name" class="form-control" required>  
          </div>
          </div>

          <div class="row align-items-center p-2">
          <label class="col-4 col-form-label" for="customer_address">Address: </label> 
          <div class="col-8">
             <input type="text" name="address" id="customer_address" class="form-control" required>  
          </div>
          </div>

          <div class="row align-items-center p-2">
          <label class="col-4 col-form-label" for="customer_contactNumber">Contact Number: </label> 
          <div class="col-8">
             <input type="text" name="contact_number" id="customer_contactNumber" class="form-control" required>  
          </div>
          </div>

          <div class="row align-items-center p-2">
          <label class="col-3 col-form-label" for="customer_isle">Isle Number: </label> 
          <div class="col-3">
             <input type="text" name="isle_number" id="customer_isle" class="form-control" required>  
          </div>
          <label class="col-3 col-form-label" for="customer_shelf">Shelf Number: </label> 
          <div class="col-3">
             <input type="text" name="shelf_number" id="customer_shelf" class="form-control" required>  
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

<!-- ADDING CUSTOMER MODAL -->

<div class="modal fade modal-lg" id="addCustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Customer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <input type="hidden" name="form_type" value="add_customer">

           <!-- Customer Info -->
          <div class="row align-items-center p-2">
          <label class="col-4 col-form-label" for="add_customer_name">Customer name: </label> 
          <div class="col-8">
             <input type="text" name="add_name" id="add_customer_name" class="form-control" required>  
          </div>
          </div>

          <div class="row align-items-center p-2">
          <label class="col-4 col-form-label" for="add_customer_address">Address: </label> 
          <div class="col-8">
             <input type="text" name="add_address" id="add_customer_address" class="form-control" required>  
          </div>
          </div>

          <div class="row align-items-center p-2">
          <label class="col-4 col-form-label" for="add_customer_contact">Contact number: </label> 
          <div class="col-8">
             <input type="text" name="add_contact_number" id="add_customer_contact" class="form-control" required>  
          </div>
          </div>
          
          <div class="row align-items-center p-2">
          <label class="col-3 col-form-label" for="add_customer_isle">Isle Number: </label> 
          <div class="col-3">
             <input type="text" name="add_isle" id="add_customer_isle" class="form-control" required>  
          </div>
          <label class="col-3 col-form-label" for="add_customer_shelf">Shelf Number: </label> 
          <div class="col-3">
             <input type="text" name="add_shelf" id="add_customer_shelf" class="form-control" required>  
          </div>
          </div>

        <!-- Product Info  -->
        <div class="row mb-3 col-10">
          <label for="productSelect" class="form-label">Select a Brand Model</label>
          <select class="form-select" id="productSelect" name="product" required>
            <option selected disabled>Choose a product...</option>
            <?php 
                $query = "SELECT product_id, brand_model, supplier_id FROM product_table";
                $result = $conn->query($query);
                if($result->num_rows > 0){
                  while($row = $result->fetch_assoc()){
                    echo "<option value='" . htmlspecialchars($row['product_id']) . "' data-supplier-id='" . htmlspecialchars($row['supplier_id']) . "'>" 
                    . htmlspecialchars($row['brand_model']) .  "</option>";
                  }
                }
            ?>
          </select>
        </div>
        
        <div class="row align-items-center p-2">
          <label class="col-4 col-form-label" for="add_quantity">Quantity: </label> 
          <div class="col-8">
             <input type="number" name="add_quantity" id="add_quantity" class="form-control" required>  
          </div>
        </div>

        <div class="row align-items-center p-2">
          <label class="col-4 col-form-label" for="add_date">Date: </label> 
            <div class="col-8">
              <input type="date" name="add_date" id="add_date" class="form-control" required>  
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

<script>
    // JavaScript to handle the change event for product selection
    document.getElementById('productSelect').addEventListener('change', function () {
        const selectedValue = this.value;
        const selectedText = this.options[this.selectedIndex].text;
        console.log('Selected Value:', selectedValue);
        console.log('Selected Text:', selectedText);
    });
</script>

<?php 
// Check if the form has been submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_type']) && $_POST['form_type'] == "add_customer"){
  // Get customer data from form
  $customer_name = $_POST['add_name'];
  $customer_address = $_POST['add_address'];
  $customer_contactNumber = $_POST['add_contact_number'];
  $customer_isle = $_POST['add_isle'];
  $customer_shelf = $_POST['add_shelf'];
  
  // Get product data from form
  $product_id = $_POST['product'];
  $quantity = $_POST['add_quantity'];
  $date = $_POST['add_date'];
  
  // Initialize customer_id variable
  $customer_id = null;
  
  // Begin transaction
  $conn->begin_transaction();
  
  try {
    // Insert customer data
    $stmt = $conn->prepare("INSERT INTO customer_table (customer_name, address, contact_number, isle_number, shelf) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $customer_name, $customer_address, $customer_contactNumber, $customer_isle, $customer_shelf);
    
    if ($stmt->execute()) {
      $customer_id = $stmt->insert_id; // Get the last inserted customer ID
      $stmt->close();
      
      // Get price from product_table
      $stmt = $conn->prepare("SELECT price FROM product_table WHERE product_id = ?");
      $stmt->bind_param("i", $product_id);
      $stmt->execute();
      $stmt->bind_result($price);
      $stmt->fetch();
      $stmt->close();
      
      // Calculate total price
      $total_price = $price * $quantity;
      
      // Insert transaction data
      $stmt = $conn->prepare("INSERT INTO transactions_table (customer_id, product_id, quantity, total_price, purchase_date) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("iiids", $customer_id, $product_id, $quantity, $total_price, $date);
      
      if (!$stmt->execute()) {
        throw new Exception("Error inserting transaction: " . $stmt->error);
      }
      $stmt->close();
      
      // Commit transaction
      $conn->commit();
      
      // Display success message
      echo "<div class='alert alert-success'>Customer and transaction added successfully!</div>";
      
      // Redirect to prevent form resubmission
      echo "<script>
        // Redirect after showing message
        setTimeout(function() {
          window.location.href = '" . htmlspecialchars($_SERVER["PHP_SELF"]) . "';
        }, 1000);
      </script>";
      
    } else {
      throw new Exception("Error inserting customer: " . $stmt->error);
    }
    
  } catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
  }
}
?>



// $query = "SELECT supplier_id, price FROM product_table";
//  $result = $conn->query($query);

// //  if($result->num_rows>0){
// //   while($row = $result->fetch_assoc()){
// //     if($brand_id == $row['supplier_id']){
// //       $total_price = $row['price'] * $quantity;
// //       break;
// //     }
// //   }
// //  }



// $query = "SELECT supplier_name, supplier_id FROM suppliers_table";
// $result = $conn->query($query);

// if($result->num_rows>0){
//   while($row = $result->fetch_assoc()){
//     if($supplier_id == $row['supplier_id']){
//       $supplier_name = $row['supplier_name']; // PANG PROMPT LANG
//       break;
//     }
//   }
// }


//   // Prepare and bind
//   $stmt = $conn->prepare("INSERT INTO customer_table (customer_name, address, contact_number, isle_number, shelf) VALUES (?, ?, ?, ?, ?)");
//   $stmt->bind_param("sssii", $customer_name, $customer_address, $customer_contactNumber, $customer_isle, $customer_shelf);

//   // Execute the statement
//   if ($stmt->execute()) {
//     $customer_id = $stmt->insert_id; // Get the last inserted customer ID
//       echo "New record created successfully";
//       $stmt->close();
//   } else {
//       echo "Error: " . $stmt->error;
//   }
//   $stmt->close();
//   $stmt = $conn->prepare("");

// $stmt = $conn->prepare("SELECT price FROM product_table WHERE product_id = ?");
// $stmt->bind_param("i", $product_id);
// $stmt->execute();
// $stmt->bind_result($price);
// $stmt->fetch();
// $stmt->close();

// $total_price = $price * $quantity;

// $stmt = $conn->prepare("INSERT INTO transactions_table (customer_id, product_id, quantity, purchase_date, total_price) VALUES (?,?,?,?,?)");
// $stmt->bind_param("iiisd", $customer_id, $product_id, $quantity, $date, $total_price);

// if ($stmt->execute()) {
//   echo "Transaction recorded successfully.";
// } else {
//   echo "Error inserting transaction: " . $stmt->error;
// }
// $stmt->close();

//   $conn->close();
// }

//
// <script>
//   document.querySelector('form').addEventListener('submit', function (e) {
//     // Close the modal after form submission
//     const modal = bootstrap.Modal.getInstance(document.getElementById('addCustomer'));
//     modal.hide();
//   });
// </script>