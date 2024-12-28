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

// Query to fetch data
$sql = "SELECT student_name, competition_level, rank FROM sports_achievements";
$result = $conn->query($sql);

// Initialize arrays for analysis
$competition_levels = [];
$ranks = [];

if ($result->num_rows > 0) {
    // Fetch data and organize it
    while($row = $result->fetch_assoc()) {
        $competition_levels[] = $row['competition_level'];
        $ranks[] = $row['rank'];
    }
} else {
    echo "No records found.";
}

// Close connection
$conn->close();

// Analyze data
$competition_counts = array_count_values($competition_levels);
$rank_counts = array_count_values($ranks);

// PHP Variables for the Introduction
$total_records = count($competition_levels);
$total_competition_levels = count($competition_counts);
$total_ranks = count($rank_counts);

// HTML and Chart Rendering
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Achievements</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Some basic styling */
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
            height: 400px;  /* Increased height for charts */
        }
        .intro {
            margin-bottom: 20px;
            line-height: 1.6;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Sports Achievements Analysis</h1>
    
    <div class="intro">
        <p><strong>Introduction:</strong></p>
        <p>This report showcases the exceptional sports achievements of our students across various competitions. Our database contains <strong><?php echo $total_records; ?></strong> records of achievements from students who participated in different competition levels. The data spans across <strong><?php echo $total_competition_levels; ?></strong> unique competition levels and <strong><?php echo $total_ranks; ?></strong> distinct ranks achieved.</p>
        <p>From local tournaments to national events, this analysis gives insights into how our students performed at different levels. Below, we present both graphical and tabular representations of their achievements, helping us understand trends and patterns in their performance.</p>
    </div>

    <h2>Summary</h2>
    <p>Total number of records: <?php echo $total_records; ?></p>

    <h3>Achievements by Competition Level:</h3>
    <table>
        <thead>
            <tr>
                <th>Competition Level</th>
                <th>Number of Achievements</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($competition_counts as $level => $count) {
                echo "<tr><td>$level</td><td>$count</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Rank Distribution:</h3>
    <table>
        <thead>
            <tr>
                <th>Rank</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rank_counts as $rank => $count) {
                echo "<tr><td>$rank</td><td>$count</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Chart Section -->
    <div class="chart-container">
        <!-- Achievements by Competition Level Chart -->
        <div>
            <canvas id="competitionChart"></canvas>
        </div>

        <!-- Rank Distribution Chart -->
        <div>
            <canvas id="rankChart"></canvas>
        </div>
    </div>

</div>

<script>
    // Chart.js to render graphs for data visualization

    // Achievements by Competition Level Chart
    var ctx1 = document.getElementById('competitionChart').getContext('2d');
    var competitionChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_keys($competition_counts)); ?>,
            datasets: [{
                label: 'Achievements by Competition Level',
                data: <?php echo json_encode(array_values($competition_counts)); ?>,
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

    // Rank Distribution Chart
    var ctx2 = document.getElementById('rankChart').getContext('2d');
    var rankChart = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode(array_keys($rank_counts)); ?>,
            datasets: [{
                label: 'Rank Distribution',
                data: <?php echo json_encode(array_values($rank_counts)); ?>,
                backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(255, 159, 64, 0.2)'],
                borderColor: ['rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 159, 64, 1)'],
                borderWidth: 1
            }]
        }
    });
</script>

</body>
</html>
