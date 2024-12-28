<?php
// Database connection
$servername = "localhost";
$username = "root";    // Default XAMPP MySQL username
$password = "";        // Default XAMPP MySQL password (empty by default)
$dbname = "cse_template"; // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch faculty achievement data
$sql = "SELECT faculty_name, designation, achievement_type, achievement_details FROM faculty_achievements";
$result = $conn->query($sql);

// Initialize arrays for analysis
$achievement_types = [];
$designations = [];

if ($result->num_rows > 0) {
    // Fetch data and organize it
    while($row = $result->fetch_assoc()) {
        $achievement_types[] = $row['achievement_type'];
        $designations[] = $row['designation'];
    }
} else {
    echo "No records found.";
}

// Analyze data for charts
$achievement_distribution = array_count_values($achievement_types);
$designation_distribution = array_count_values($designations);

// PHP Variables for the Introduction
$total_achievements = count($achievement_types);
$total_faculty = count($designations);

// Close the connection after analysis
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Achievements</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Basic styling */
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
            height: 400px;  /* Fixed height for charts */
        }
        .intro {
            margin-bottom: 20px;
            line-height: 1.6;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Faculty Achievements</h1>
    
    <div class="intro">
        <p><strong>Introduction:</strong></p>
        <p>This report provides insights into the remarkable achievements of our esteemed faculty members. Their contributions span various areas, including research, awards, and recognitions. We have data for <strong><?php echo $total_faculty; ?></strong> faculty members, who have collectively earned <strong><?php echo $total_achievements; ?></strong> achievements in different fields.</p>
        <p>The charts below offer a visual representation of the distribution of achievements by type and faculty designations.</p>
    </div>

    <h2>Achievements Summary</h2>
    <p>Total Faculty Members: <?php echo $total_faculty; ?></p>
    <p>Total Achievements: <?php echo $total_achievements; ?></p>

    <h3>Faculty Achievements Breakdown:</h3>
    <table>
        <thead>
            <tr>
                <th>Faculty Name</th>
                <th>Designation</th>
                <th>Achievement Type</th>
                <th>Achievement Details</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Reconnect for displaying table after analysis
            $conn = new mysqli($servername, $username, $password, $dbname);
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['faculty_name']}</td><td>{$row['designation']}</td><td>{$row['achievement_type']}</td><td>{$row['achievement_details']}</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Chart Section -->
    <div class="chart-container">
        <!-- Achievement Type Distribution Chart -->
        <div>
            <canvas id="achievementChart"></canvas>
        </div>

        <!-- Designation Distribution Chart -->
        <div>
            <canvas id="designationChart"></canvas>
        </div>
    </div>

</div>

<script>
    // Chart.js to render graphs for data visualization

    // Achievement Type Distribution Chart
    var ctx1 = document.getElementById('achievementChart').getContext('2d');
    var achievementChart = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode(array_keys($achievement_distribution)); ?>,
            datasets: [{
                label: 'Achievement Type Distribution',
                data: <?php echo json_encode(array_values($achievement_distribution)); ?>,
                backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 159, 64, 0.2)'],
                borderColor: ['rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 159, 64, 1)'],
                borderWidth: 1
            }]
        }
    });

    // Designation Distribution Chart
    var ctx2 = document.getElementById('designationChart').getContext('2d');
    var designationChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_keys($designation_distribution)); ?>,
            datasets: [{
                label: 'Faculty Designation Distribution',
                data: <?php echo json_encode(array_values($designation_distribution)); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
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
</script>

</body>
</html>
