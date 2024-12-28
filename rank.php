<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Default XAMPP password
$dbname = "cse_template";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch academic records
$sql = "SELECT student_name, rank, year, marks, image_path FROM academic_records";
$academic_result = $conn->query($sql);

// Arrays for chart data
$years = [];
$marks_distribution = [];
$yearly_marks = [];

if ($academic_result->num_rows > 0) {
    while ($row = $academic_result->fetch_assoc()) {
        $years[] = $row['year'];
        $marks_distribution[] = $row['marks'];
    }
    $yearly_marks = array_count_values($years);
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Records</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 90%; margin: auto; padding: 20px; }
        h1, h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        img.student-image { width: 50px; height: 50px; border-radius: 50%; object-fit: cover; }
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
    <h1>Academic Records</h1>

    <div class="intro">
        <p><strong>Introduction:</strong></p>
        <p>This section highlights the academic performance of students over the years. It includes their ranks, marks, and additional details like profile images.</p>
        <p>With a total of <strong><?php echo $academic_result->num_rows; ?></strong> records, the data illustrates overall trends in academic achievement.</p>
    </div>

    <h2>Academic Records Table</h2>
    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Rank</th>
                <th>Year</th>
                <th>Marks</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = new mysqli($servername, $username, $password, $dbname);
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['student_name']}</td>";
                echo "<td>{$row['rank']}</td>";
                echo "<td>{$row['year']}</td>";
                echo "<td>{$row['marks']}</td>";
                echo "<td><img src='" . (!empty($row['image_path']) ? htmlspecialchars($row['image_path']) : 'default.png') . "' alt='Student Image' class='student-image'></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Chart Section -->
    <div class="chart-container">
        <!-- Yearly Distribution -->
        <div>
            <canvas id="yearChart"></canvas>
        </div>

        <!-- Marks Distribution -->
        <div>
            <canvas id="marksChart"></canvas>
        </div>
    </div>
</div>

<script>
    // Academic Records by Year
    var ctx1 = document.getElementById('yearChart').getContext('2d');
    var yearChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_keys($yearly_marks)); ?>,
            datasets: [{
                label: 'Number of Students',
                data: <?php echo json_encode(array_values($yearly_marks)); ?>,
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

    // Marks Distribution
    var ctx2 = document.getElementById('marksChart').getContext('2d');
    var marksChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: <?php echo json_encode(array_unique($years)); ?>,
            datasets: [{
                label: 'Marks Scored',
                data: <?php echo json_encode($marks_distribution); ?>,
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1,
                fill: true
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
