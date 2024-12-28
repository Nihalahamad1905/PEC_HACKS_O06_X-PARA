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

// Query to fetch cultural and extracurricular activity data
$sql = "SELECT cultural_activities, student_participation, collaborations, nss FROM cultural_extra_curricular";
$cultural_result = $conn->query($sql);

// Initialize arrays for analysis
$activities = [];
$participation = [];
$collaborations = [];
$nss = [];

if ($cultural_result->num_rows > 0) {
    // Fetch data and organize it
    while($row = $cultural_result->fetch_assoc()) {
        $activities[] = $row['cultural_activities'];
        $participation[] = $row['student_participation'];
        $collaborations[] = $row['collaborations'];
        $nss[] = $row['nss'];
    }
} else {
    echo "No records found.";
}

// Analyze data for charts (e.g., Total Participation, NSS Involvement)
$total_participation = array_sum($participation);
$total_nss = array_sum($nss);

// Close the connection after analysis
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cultural and Extra Curricular Activities</title>
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
    <h1>Cultural and Extra Curricular Activities</h1>
    
    <div class="intro">
        <p><strong>Introduction:</strong></p>
        <p>This report provides insights into the various cultural and extracurricular activities our students participate in. The activities range from cultural events to NSS involvement. We have data on <strong><?php echo count($activities); ?></strong> activities and the level of student participation.</p>
        <p>The charts below highlight the total student participation, collaborations, and NSS involvement across these activities.</p>
    </div>

    <h2>Activities Summary</h2>
    <p>Total Activities: <?php echo count($activities); ?></p>
    <p>Total Student Participation: <?php echo $total_participation; ?></p>
    <p>Total NSS Involvement: <?php echo $total_nss; ?></p>

    <h3>Cultural and Extra Curricular Activities Breakdown:</h3>
    <table>
        <thead>
            <tr>
                <th>Cultural Activities</th>
                <th>Student Participation</th>
                <th>Collaborations</th>
                <th>NSS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Reconnect for displaying table after analysis
            $conn = new mysqli($servername, $username, $password, $dbname);
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['cultural_activities']}</td><td>{$row['student_participation']}</td><td>{$row['collaborations']}</td><td>{$row['nss']}</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Chart Section -->
    <div class="chart-container">
        <!-- Student Participation Chart -->
        <div>
            <canvas id="participationChart"></canvas>
        </div>

        <!-- NSS Involvement Chart -->
        <div>
            <canvas id="nssChart"></canvas>
        </div>
    </div>

</div>

<script>
    // Chart.js to render graphs for data visualization

    // Student Participation Chart
    var ctx1 = document.getElementById('participationChart').getContext('2d');
    var participationChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($activities); ?>,
            datasets: [{
                label: 'Student Participation',
                data: <?php echo json_encode($participation); ?>,
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

    // NSS Involvement Chart
    var ctx2 = document.getElementById('nssChart').getContext('2d');
    var nssChart = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($activities); ?>,
            datasets: [{
                label: 'NSS Involvement',
                data: <?php echo json_encode($nss); ?>,
                backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 159, 64, 0.2)'],
                borderColor: ['rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 159, 64, 1)'],
                borderWidth: 1
            }]
        }
    });
</script>

</body>
</html>
