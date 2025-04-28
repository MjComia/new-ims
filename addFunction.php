<!-- EDIT CUSTOMER INFO MODAL -->

<div class="modal fade modal-lg" id="staticBackDrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

<!-- ADDING CUSTOMER MODAL -->

<div class="modal fade modal-lg" id="addCustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit user information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method = "post">

           <!-- Customer Info -->

          <div class="row align-items-center p-2">
          <label class = "col-4 col-form-label" for = "add_customer_name" >Customer name: </label> 
          <div class="col-8">
             <input type="text" name="customer_name" id="add_customer_name" class="form-control" required>  
          </div>
          </div>

          <div class="row align-items-center p-2">
          <label class = "col-4 col-form-label" for = "add_customer_address" >Address: </label> 
          <div class="col-8">
             <input type="text" name="customer_name" id="add_customer_address" class="form-control" required>  
          </div>
          </div>

          <div class="row align-items-center p-2">
          <label class = "col-4 col-form-label" for = "add_customer_contact" >Contact number: </label> 
          <div class="col-8">
             <input type="text" name="customer_name" id="add_customer_contact" class="form-control" required>  
          </div>
          </div>
          
          <div class="row align-items-center p-2">
          <label class = "col-3 col-form-label" for = "add_customer_isle" >Isle Number: </label> 
          <div class="col-3">
             <input type="text" name="customer_name" id="add_customer_isle" class="form-control" required>  
          </div>
          <label class = "col-3 col-form-label" for = "add_customer_shelf" >Shelf Number: </label> 
          <div class="col-3">
             <input type="text" name="customer_name" id="add_customer_shelf" class="form-control" required>  
          </div>
          </div>

        <!-- Product Info  -->

          <div class="row align-items-center p-2">
          <label class = "col-4 col-form-label" for = "add_customer_contact" >Brand Model: </label> 
          <div class="col-8">
           <?php 
           $query = "SELECT brand_model FROM product_table";
           ?>
          </div>
          </div>

          <div class="mb-3">
    <label for="productSelect" class="form-label">Select a Product</label>
    <select class="form-select" id="productSelect" name="product">
    <option selected disabled>Choose a product...</option>
<?php 
    $query = "SELECT product_id, brand_model FROM product_table";
    $result = $conn->query($query);
    if($result->num_rows > 0 ){
      while($row = $result->fetch_assoc()){
        echo "<option value = '" . htmlspecialchars($row['product_id']) . "'>" . htmlspecialchars($row['brand_model']) . "</option>";
      }
    }
?>
    </select>
  </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>