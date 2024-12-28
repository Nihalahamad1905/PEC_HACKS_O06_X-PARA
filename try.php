<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cse_template";

$conn = new mysqli($servername, $username, $password, $dbname);
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
        $years[] = $row['year'];
        $achievement_types[] = $row['achievement_type'];
    }
    $year_counts = array_count_values($years);
    $type_counts = array_count_values($achievement_types);
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements and Suggestions</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; padding: 20px; }
        h1, h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .chart-container { display: flex; justify-content: space-between; gap: 20px; margin-top: 30px; }
        .chart-container canvas { width: 48%; height: 400px; }
        .modal { display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.4); }
        .modal-content { background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 80%; }
        .close { color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer; }
        .close:hover, .close:focus { color: black; text-decoration: none; cursor: pointer; }
        #showSuggestions { margin-top: 20px; padding: 10px 20px; background-color: #007BFF; color: white; border: none; cursor: pointer; }
        #showSuggestions:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<div class="container">
    <h1>Achievements and Real-Time Suggestions</h1>

    <h2>Achievements Summary</h2>
    <p>Total Achievements: <?php echo $achievements_result->num_rows; ?></p>

    <div class="chart-container">
        <!-- Achievements by Year -->
        <canvas id="yearChart"></canvas>
        <!-- Achievements by Type -->
        <canvas id="typeChart"></canvas>
    </div>

    <button id="showSuggestions">Show Real-Time Event Suggestions</button>
</div>

<!-- Modal for Suggestions -->
<div id="suggestionsModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Real-Time Event Suggestions</h2>
        <ul id="suggestionsList">
            <li>Loading suggestions...</li>
        </ul>
    </div>
</div>

<script>
    // Chart.js to render graphs
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
        options: { scales: { y: { beginAtZero: true } } }
    });

    var ctx2 = document.getElementById('typeChart').getContext('2d');
    var typeChart = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode(array_keys($type_counts)); ?>,
            datasets: [{
                label: 'Achievements by Type',
                data: <?php echo json_encode(array_values($type_counts)); ?>,
                backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)'],
                borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)'],
                borderWidth: 1
            }]
        }
    });

    // Modal Functionality
    var modal = document.getElementById('suggestionsModal');
    var btn = document.getElementById('showSuggestions');
    var span = document.getElementsByClassName('close')[0];

    btn.onclick = function() {
        fetchSuggestions();
        modal.style.display = 'block';
    }

    span.onclick = function() {
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
    function fetchSuggestions() {
    const apiUrl = 'https://app.ticketmaster.com/discovery/v2/events.json';
    const apiKey = 'BXIAzijUSXxnGGWA5WlXApGdXECflmyt';  // Replace with your Ticketmaster API key
    const location = 'India';  // You can change this to a specific city or region if needed
    const keyword = 'student events';  // You can change this to search for specific events

    $.ajax({
        url: apiUrl,
        method: 'GET',
        data: {
            apikey: apiKey,
            keyword: keyword,
            city: location,  // Location filter (can be a city name)
            sort: 'date,asc', // Sort by date ascending
        },
        success: function(data) {
            console.log(data); // Check the API response in the console
            const events = data._embedded.events || [];
            let suggestionsHTML = '';

            if (events.length > 0) {
                events.forEach(event => {
                    suggestionsHTML += `<li><strong>${event.name}</strong>: ${event.description || 'No description available.'} <a href="${event.url}" target="_blank">Learn More</a></li>`;
                });
            } else {
                suggestionsHTML = '<li>No events found. Please try again later.</li>';
            }

            document.getElementById('suggestionsList').innerHTML = suggestionsHTML;
        },
        error: function(error) {
            console.error(error); // Check error details in the console
            document.getElementById('suggestionsList').innerHTML = '<li>Unable to fetch events. Please try again later.</li>';
        }
    });
}

</script>

</body>
</html>
