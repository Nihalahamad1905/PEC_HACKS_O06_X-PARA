<?php
// Database connection
$servername = "localhost";
$username = "root"; // Default XAMPP MySQL username
$password = ""; // Default XAMPP MySQL password (empty by default)
$dbname = "cse_template"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch achievements data
$sql = "SELECT student_name, year, achievement_type, achievement_details FROM achievements";
$achievements_result = $conn->query($sql);

// Initialize arrays for chart analysis
$years = [];
$achievement_types = [];
$year_counts = [];
$type_counts = [];

if ($achievements_result->num_rows > 0) {
    while ($row = $achievements_result->fetch_assoc()) {
        // Populate arrays for charts
        $years[] = $row['year'];
        $achievement_types[] = $row['achievement_type'];
    }
    // Count occurrences for each year and achievement type
    $year_counts = array_count_values($years);
    $type_counts = array_count_values($achievement_types);
}

// Close connection after analysis
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; padding: 20px; }
        h1, h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .chart-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 30px;
        }
        .chart-container canvas {
            width: 48%;
            height: 400px;
        }
        .intro {
            margin-bottom: 20px;
            line-height: 1.6;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Achievements</h1>

    <div class="intro">
        <p><strong>Introduction:</strong></p>
        <p>This report highlights the achievements of students over the years. The data includes a variety of accomplishments, from academic awards to extracurricular recognitions. A total of <strong><?php echo $achievements_result->num_rows; ?></strong> achievements have been recorded.</p>
        <p>The charts below show the distribution of achievements by type and year, providing valuable insights into student excellence.</p>
    </div>

    <h2>Achievements Summary</h2>
    <p>Total Achievements: <?php echo $achievements_result->num_rows; ?></p>

    <h3>Achievements Breakdown:</h3>
    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Year</th>
                <th>Achievement Type</th>
                <th>Achievement Details</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Reconnect for table display
            $conn = new mysqli($servername, $username, $password, $dbname);
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['student_name']}</td><td>{$row['year']}</td><td>{$row['achievement_type']}</td><td>{$row['achievement_details']}</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Chart Section -->
    <div class="chart-container">
        <!-- Achievements by Year -->
        <div>
            <canvas id="yearChart"></canvas>
        </div>

        <!-- Achievements by Type -->
        <div>
            <canvas id="typeChart"></canvas>
        </div>
    </div>
</div>

<script>
    // Chart.js to render graphs for data visualization

    // Achievements by Year Chart
    var ctx1 = document.getElementById('yearChart').getContext('2d');
    var yearChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_keys($year_counts)); ?>,
            datasets: [{
                label: 'Number of Achievements',
                data: <?php echo json_encode(array_values($year_counts)); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Achievements by Type Chart
    var ctx2 = document.getElementById('typeChart').getContext('2d');
    var typeChart = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode(array_keys($type_counts)); ?>,
            datasets: [{
                label: 'Achievements by Type',
                data: <?php echo json_encode(array_values($type_counts)); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        }
    });
</script>

</body>
</html>
