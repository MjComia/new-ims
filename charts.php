<!-- Load Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
// Connect to DB
$conn = new mysqli("localhost", "root", "", "new-ims");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$brands = [];
$sales = [];

$sql = "SELECT brand_model, sales FROM product_table";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $brands[] = $row['brand_model'];
        $sales[] = (int)$row['sales'];
    }
}
$conn->close();
?>
<a href= "index.php">Back</a>
<!-- Chart Canvas -->
<canvas id="salesChart" width="400" height="200"></canvas>

<script>
// Get data from PHP
const brandLabels = <?php echo json_encode($brands); ?>;
const salesData = <?php echo json_encode($sales); ?>;

const ctx = document.getElementById('salesChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: brandLabels,
        datasets: [{
            label: 'Sales',
            data: salesData,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                }
            }
        }
    }
});
</script>
