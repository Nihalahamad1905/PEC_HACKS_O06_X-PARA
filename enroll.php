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

// Query to fetch enrollment data
$sql = "SELECT class, enrolled, passed_out, scholarship FROM enrollments";
$result = $conn->query($sql);

// Initialize arrays for analysis
$classes = [];
$enrolled = [];
$passed_out = [];
$scholarships = [];

if ($result->num_rows > 0) {
    // Fetch data and organize it
    while($row = $result->fetch_assoc()) {
        $classes[] = $row['class'];
        $enrolled[] = $row['enrolled'];
        $passed_out[] = $row['passed_out'];
        $scholarships[] = $row['scholarship'];
    }
} else {
    echo "No records found.";
}

// Analyze data for charts
$total_enrolled = array_sum($enrolled);
$total_passed_out = array_sum($passed_out);
$total_scholarships = array_sum($scholarships);

// Prepare data for charts
$class_count = array_count_values($classes);
$scholarship_distribution = array_count_values($scholarships);

// PHP Variables for the Introduction
$total_classes = count($class_count);

// HTML and Chart Rendering
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Analysis</title>
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
    <h1>Enrollment Data Analysis</h1>
    
    <div class="intro">
        <p><strong>Introduction:</strong></p>
        <p>This report provides insights into the enrollment trends of our students across various classes. The data includes the number of students enrolled, the number of students who have passed out, and scholarships awarded for excellence. Currently, we have data for <strong><?php echo $total_classes; ?></strong> classes, with a total of <strong><?php echo $total_enrolled; ?></strong> students enrolled, <strong><?php echo $total_passed_out; ?></strong> students who have passed out, and <strong><?php echo $total_scholarships; ?></strong> scholarships awarded across different classes.</p>
        <p>The charts below provide a visual representation of this data, offering a clear understanding of enrollment trends and the distribution of scholarships.</p>
    </div>

    <h2>Summary</h2>
    <p>Total Enrolled Students: <?php echo $total_enrolled; ?></p>
    <p>Total Passed Out Students: <?php echo $total_passed_out; ?></p>
    <p>Total Scholarships Awarded: <?php echo $total_scholarships; ?></p>

    <h3>Enrollment Breakdown:</h3>
    <table>
        <thead>
            <tr>
                <th>Class</th>
                <th>Enrolled</th>
                <th>Passed Out</th>
                <th>Scholarship</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // The connection is still open here, so we can query again
            $result = $conn->query($sql); // Fetch data again for displaying
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['class']}</td><td>{$row['enrolled']}</td><td>{$row['passed_out']}</td><td>{$row['scholarship']}</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Chart Section -->
    <div class="chart-container">
        <!-- Enrollment vs Passed Out Chart -->
        <div>
            <canvas id="enrollmentChart"></canvas>
        </div>

        <!-- Scholarship Distribution Chart -->
        <div>
            <canvas id="scholarshipChart"></canvas>
        </div>
    </div>

</div>

<script>
    // Chart.js to render graphs for data visualization

    // Enrollment vs Passed Out Chart
    var ctx1 = document.getElementById('enrollmentChart').getContext('2d');
    var enrollmentChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($classes); ?>,
            datasets: [{
                label: 'Enrolled',
                data: <?php echo json_encode($enrolled); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }, {
                label: 'Passed Out',
                data: <?php echo json_encode($passed_out); ?>,
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

    // Scholarship Distribution Chart
    var ctx2 = document.getElementById('scholarshipChart').getContext('2d');
    var scholarshipChart = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode(array_keys($scholarship_distribution)); ?>,
            datasets: [{
                label: 'Scholarship Distribution',
                data: <?php echo json_encode(array_values($scholarship_distribution)); ?>,
                backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(255, 159, 64, 0.2)'],
                borderColor: ['rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 159, 64, 1)'],
                borderWidth: 1
            }]
        }
    });
</script>

</body>
</html>
