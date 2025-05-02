<?php
// This file should be included at the top of index.php to help debug database issues
echo "HELLLOOO";
// Function to check table structure
function checkTableStructure($conn, $tableName) {
    $result = $conn->query("DESCRIBE $tableName");
    if (!$result) {
        return "Error describing table: " . $conn->error;
    }
    
    $structure = array();
    while ($row = $result->fetch_assoc()) {
        $structure[] = $row;
    }
    
    return $structure;
}

// Function to check for AUTO_INCREMENT on primary keys
function checkAutoIncrement($conn, $tableName) {
    $result = $conn->query("SHOW CREATE TABLE $tableName");
    if (!$result) {
        return "Error showing table creation: " . $conn->error;
    }
    
    $row = $result->fetch_assoc();
    return isset($row['Create Table']) ? $row['Create Table'] : "Table info not available";
}

// Only run this code if the debug parameter is set
if (isset($_GET['debug']) && $_GET['debug'] == 'db') {
    echo "<div style='background-color: #f8f9fa; padding: 15px; margin-bottom: 20px; border: 1px solid #ddd;'>";
    echo "<h3>Database Structure Debug</h3>";
    
    // Check database connection
    if ($conn) {
        echo "<p style='color: green;'>✓ Database connection successful</p>";
        
        // Check transactions_table structure
        echo "<h4>Transactions Table Structure:</h4>";
        echo "<pre>";
        print_r(checkTableStructure($conn, 'transactions_table'));
        echo "</pre>";
        
        // Check auto_increment
        echo "<h4>Transactions Table Creation:</h4>";
        echo "<pre>";
        echo htmlspecialchars(checkAutoIncrement($conn, 'transactions_table'));
        echo "</pre>";
        
        // Check customer_table structure
        echo "<h4>Customer Table Structure:</h4>";
        echo "<pre>";
        print_r(checkTableStructure($conn, 'customer_table'));
        echo "</pre>";
        
        // Check product_table structure
        echo "<h4>Product Table Structure:</h4>";
        echo "<pre>";
        print_r(checkTableStructure($conn, 'product_table'));
        echo "</pre>";
    } else {
        echo "<p style='color: red;'>✗ Database connection failed</p>";
    }
    
    echo "</div>";
}
?>