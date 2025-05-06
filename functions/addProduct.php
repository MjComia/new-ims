<?php
$host = 'localhost';
$username =  'root';
$password = '';
$database = 'new-ims';
$conn = '';

try {
    $conn = new mysqli($host, $username, $password, $database);
} catch (mysqli_sql_exception) {
    echo "Could not connect to the database";
}
if ($conn) {
    // echo "Connected";
}
?>

<div class="modal fade" id="addProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <input type="hidden" name="form_type" value="add_product">
                    <!-- Supplier Info -->

                    <div class="row align-items-center p-2">
                        <label class="col-4 col-form-label" for="add_brand_model">Brand model: </label>
                        <div class="col-8">
                            <input type="text" name="add_brand_model" id="add_brand_model" class="form-control" required>
                        </div>
                    </div>

                    <div class="row align-items-center p-2">
                        <label class="col-4 col-form-label" for="add_price">Price: </label>
                        <div class="col-8">
                            <input type="text" name="add_price" id="add_price" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-3 col-10">
                        <label for="addProduct" class="form-label"> Select a Brand Model</label>
                        <select class="form-select" id="addProduct" name="addProduct">
                            <option value="" selected disabled>Choose a Supplier</option>

                            <?php
                            $query = "SELECT supplier_id, supplier_name FROM suppliers_table";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value = '" . htmlspecialchars($row['supplier_id']) . "'>"
                                        . htmlspecialchars($row['supplier_name']) . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row align-items-center p-2">
                        <label class="col-4 col-form-label" for="add_sales">Sales: </label>
                        <div class="col-8">
                            <input type="number" name="add_sales" id="add_sales" class="form-control" required>
                        </div>
                    </div>
            </div>

            <div class="row align-items-center p-2">
                <label class="col-4 col-form-label" for="add_stock">Current Stock: </label>
                <div class="col-8">
                    <input type="number" name="add_stock" id="add_stock" class="form-control" required>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>

        </div>

    </div>
</div>


<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST['form_type'] === "add_product") {
    $brand_model = $_POST['add_brand_model'];
    $price = $_POST['add_price'];
    $supplier_id = $_POST['addProduct'];
    $sales = $_POST['add_sales'];
    $stock = $_POST['add_stock'];

$stmt = $conn->prepare("INSERT INTO product_table(brand_model, price, supplier_id, sales)VALUES (?,?,?,?)");
$stmt->bind_param("sisi", $brand_model, $price, $supplier_id, $sales);
try{
    $stmt->execute();
    $product_id = $stmt->insert_id;
    $stmt->close();
    $stmt = $conn->prepare("INSERT INTO stock_table (product_id, stock_quantity)VALUES (?,?)");
    $stmt->bind_param("ii", $product_id, $stock);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "<script> alert('Product added successfully!');
    window.location.href = '". $_SERVER['PHP_SELF'] ."?success=1';
    </script>";
}catch(mysqli_sql_exception $e){
    echo "<script> alert('Error: " . $e->getMessage() . "'); </script>";

}
}
?>