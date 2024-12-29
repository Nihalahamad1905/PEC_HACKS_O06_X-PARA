<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>College Achievements Portal</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      font-family: 'Times New Roman', Times, serif;
    }
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
      padding: 20px 0;
    }
    .a4-page {
      width: 21cm;
      height: 29.7cm;
      border: 2px solid #000;
      background-color: #fff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      flex-direction: column;
      padding: 20px;
    }
    .card {
      width: 90%;
      max-width: 18cm;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }
    .card-header {
      background-color: #800000;
      color: #fff;
      padding: 15px;
      text-align: center;
      font-size: 1.5em;
      font-weight: bold;
    }
    .card-body {
      padding: 20px;
    }
    .card-body table {
      width: 100%;
      border-collapse: collapse;
    }
    .card-body table th, .card-body table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }
    .card-body table th {
      background-color: #f4f4f4;
      font-weight: bold;
    }
    .intro {
      text-align: center;
      margin-bottom: 20px;
    }
    .intro h1 {
      margin: 0;
      font-size: 2em;
      color: #333;
    }
    .intro p {
      margin: 5px 0 0;
      color: #555;
    }
    .student-image {
      max-width: 100px;
      max-height: 100px;
      object-fit: cover;
      border-radius: 4px;
    }
    .content {
      padding: 100px 20px;
      text-align: center;
    }
    h1 {
      color: #8b0000;
      font-size: 36px;
    }
    h2 {
      color: #8b0000;
      font-size: 28px;
    }
    .motto {
      margin-top: 200px;
      font-size: 16px;
      color: #8b0000;
    }
    .line {
      margin: 10px auto;
      width: 300px;
      height: 2px;
      background-color: #8b0000;
    }
  </style>
</head>
<body>




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

// Queries for all tables
$sports_sql = "SELECT student_name, competition_level, rank FROM sports_achievements ORDER BY rank ASC";
$sports_result = $conn->query($sports_sql);

$faculty_sql = "SELECT faculty_name, designation, achievement_type, achievement_details FROM faculty_achievements";
$faculty_result = $conn->query($faculty_sql);

$enrollments_sql = "SELECT class, enrolled, passed_out, scholarship FROM enrollments ORDER BY passed_out ASC";
$enrollments_result = $conn->query($enrollments_sql);

$cultural_sql = "SELECT cultural_activities, student_participation, collaborations, nss FROM cultural_extra_curricular";
$cultural_result = $conn->query($cultural_sql);

$achievements_sql = "SELECT student_name, year, achievement_type, achievement_details FROM achievements ORDER BY year DESC";
$achievements_result = $conn->query($achievements_sql);

$academic_sql = "SELECT student_name, rank, year, marks, image_path FROM academic_records ORDER BY rank ASC";
$academic_result = $conn->query($academic_sql);
?>



<a href="#" class="btn btn-otline-dark" onclick="printPage()"><i class="icon-printer"></i> Print</a>
                        <script>
    function printPage() {
        window.print();
    }
</script>


<div class="container">
  <!-- Cover Page -->
  <div class="a4-page">
    <div class="content">
      <img src="logo.jpg" alt="Logo" style="width:300px;">
      <h1>D.Y.Patil Technical Campus,<br>Talsande</h1>
      <h2>Annual Report<br>2024</h2>
      <div class="motto">
        <hr class="line">
        <p>That alone is knowledge which leads to liberation</p>
        <p><i>The College Motto</i></p>
      </div>
    </div>
  </div>

    <!-- Overview Page -->
  <div class="a4-page">
    <div class="card-header">D.Y. Patil Technical Campus, Talsande : An Overview</div>
        <div class="content">
            <img src="logo.jpg" alt="Logo" class="logo" style="width:100px;">
            <p style="text-align:justify;">Padmashree Dr. D.Y. Patil, Ex-Governor of Bihar has created new realms for the people in India, which is affordable for both education and health facilities. Under his able guidance and leadership, the state of Maharashtra has seen development in the field of education and healthcare. D. Y. Patil Group is a major educational organization having three deemed universities to its credit and running nearly over 160 educational institutions, mainly in the area of professional education.</p>
            <p style="text-align:justify;">Padmashree Dr. D.Y. Patil, Ex-Governor of Bihar has created new realms for the people in India, which is affordable for both education and health facilities. Under his able guidance and leadership, the state of Maharashtra has seen development in the field of education and healthcare. D. Y. Patil Group is a major educational organization having three deemed universities to its credit and running nearly over 160 educational institutions, mainly in the area of professional education.</p>
            <p style="text-align:justify;">Padmashree Dr. D.Y. Patil, Ex-Governor of Bihar has created new realms for the people in India, which is affordable for both education and health facilities. Under his able guidance and leadership, the state of Maharashtra has seen development in the field of education and healthcare. D. Y. Patil Group is a major educational organization having three deemed universities to its credit and running nearly over 160 educational institutions, mainly in the area of professional education.</p>
			<p style="text-align:justify;">Padmashree Dr. D.Y. Patil, Ex-Governor of Bihar has created new realms for the people in India, which is affordable for both education and health facilities. Under his able guidance and leadership, the state of Maharashtra has seen development in the field of education and healthcare. D. Y. Patil Group is a major educational organization having three deemed universities to its credit and running nearly over 160 educational institutions, mainly in the area of professional education.</p>
			<p style="text-align:justify;">Padmashree Dr. D.Y. Patil, Ex-Governor of Bihar has created new realms for the people in India, which is affordable for both education and health facilities. Under his able guidance and leadership, the state of Maharashtra has seen development in the field of education and healthcare. D. Y. Patil Group is a major educational organization having three deemed universities to its credit and running nearly over 160 educational institutions, mainly in the area of professional education.</p>
            <!-- Add full content as needed, the content will flow to a second page automatically 
            <div class="motto">The College Motto</div>-->
        </div>
  </div>
  </div>


  <div class="a4-page">
    <div class="card-header">Our Director</div>
        <div class="content">
            <p>Faculty of Engineering, D.Y Patil Technical Campus -Talsande Courses and Fees 2025
Accordion Icon V3
There are various courses offered by Faculty of Engineering, D.Y Patil Technical Campus -Talsande in Full Time mode. These are offered in the streams of Engineering and Business & Management Studies, etc. Some of the courses offered here include After 10th Diploma, B.E. / B.Tech and MBA/PGDM, among others. The table below mentions the total tuition fee for all Faculty of Engineering, D.Y Patil Technical Campus -Talsande courses.</p>
            <p>Further information and detailed course structures are available on the campus website. Please check with the administration for the specific details regarding the admissions and courses available for the upcoming academic year.</p>
            <div class="image">
                <img src="campus.jpg" alt="Lady Shri Ram College Campus">
            </div>
        </div>
  </div>
  </div>






  <!-- Achievements and Trophies 
  <div class="a4-page">
    <div class="intro">
      <h2>Trophies and Cups Won by the College</h2>
      <p>Department of Computer Science & Engineering: Best Tree, Shrub and Creeper</p>
      <p>Green Cup: Best Greenery and Cleanliness</p>
      <p>Department of Electrical Engineering: Best Rose Garden</p>
      <p>Ramlabahar Cup: Best Maintained Environment of Hostel</p>
    </div>
  </div>
</div>
-->

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











<br><br>



  <!-- Sports Achievements -->
  <div class="a4-page" style="position: relative;">





  
<?php
// Step 1: Database Connection
$conn = new mysqli("localhost", "root", "", "cse_template");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Fetch Data from Database
$total_records = $conn->query("SELECT COUNT(*) AS count FROM sports_achievements")->fetch_assoc()['count'];
$total_competition_levels = $conn->query("SELECT COUNT(DISTINCT competition_level) AS count FROM sports_achievements")->fetch_assoc()['count'];
$total_ranks = $conn->query("SELECT COUNT(DISTINCT rank) AS count FROM sports_achievements")->fetch_assoc()['count'];

// Close connection
$conn->close();

// Step 3: Define Text Templates
$text_templates = [
    "This year, our students achieved <strong>{total_records}</strong> remarkable milestones, competing across <strong>{total_competition_levels}</strong> levels and earning <strong>{total_ranks}</strong> distinct ranks. Their dedication and hard work were evident in every event they participated in. From local competitions to national championships, they continuously raised the bar. These achievements reflect their unyielding commitment to excellence. We are incredibly proud of their accomplishments and the perseverance they demonstrated throughout the year.",
    
    "With <strong>{total_records}</strong> achievements across <strong>{total_competition_levels}</strong> competition levels, our students have showcased their unparalleled talent and determination, earning <strong>{total_ranks}</strong> ranks. Each milestone was a testament to their passion and relentless pursuit of excellence. Whether it was a local or national stage, they gave their best every time. Their success is not just a reflection of their abilities, but also of their dedication. We look forward to seeing even greater successes in the future.",
    
    "From local events to national platforms, our students achieved <strong>{total_records}</strong> accolades, competing in <strong>{total_competition_levels}</strong> levels and securing <strong>{total_ranks}</strong> prestigious ranks. Their journey was filled with challenges, but they showed resilience and determination. Each competition was an opportunity for them to grow, excel, and achieve. The range of events they participated in truly reflects their versatility. We are excited about the prospects they have for future achievements.",
    
    "Demonstrating excellence, our students earned <strong>{total_records}</strong> achievements, participated in <strong>{total_competition_levels}</strong> levels, and claimed <strong>{total_ranks}</strong> ranks. Their achievements were not just about winning but about learning and growing in the process. Competing across multiple levels, they constantly pushed their limits. We witnessed countless moments of determination and perseverance. These accomplishments mark just the beginning of their journey towards even greater success.",
    
    "This report highlights <strong>{total_records}</strong> incredible achievements by our students across <strong>{total_competition_levels}</strong> levels, with <strong>{total_ranks}</strong> ranks achieved. Each record was earned with hard work, discipline, and an unwavering belief in their potential. Their success is a reflection of the support they received from their mentors and peers. With every competition, they’ve shown that nothing is impossible with dedication. We celebrate each of these moments and look forward to more in the future.",
    
    "Our students have raised the bar with <strong>{total_records}</strong> achievements, excelling in <strong>{total_competition_levels}</strong> competition levels and earning <strong>{total_ranks}</strong> ranks. Their relentless drive to achieve greatness has inspired everyone around them. These remarkable milestones were not only about victory but also about learning, growth, and resilience. Their ability to rise to the occasion in diverse competitions speaks volumes about their versatility. We’re excited to see how they continue to excel in the coming years.",
    
    "Inspiring us all, our students have achieved <strong>{total_records}</strong> milestones, participated in <strong>{total_competition_levels}</strong> levels, and secured <strong>{total_ranks}</strong> prestigious ranks. Their accomplishments are a result of hard work, dedication, and a relentless pursuit of excellence. Competing in so many different levels, they’ve proven their adaptability and skill. Each achievement is a stepping stone towards even greater successes. We are incredibly proud to witness their remarkable growth this year.",
    
    "This year’s sports report celebrates <strong>{total_records}</strong> achievements, <strong>{total_competition_levels}</strong> competition levels, and <strong>{total_ranks}</strong> ranks earned by our talented students. Their achievements go beyond just winning—each rank earned was a result of determination, teamwork, and focus. Every competition presented unique challenges, and our students rose to meet them head-on. We’ve witnessed their relentless pursuit of greatness, and the future looks bright. These milestones are only the beginning of their journey.",
    
    "Our students’ journey of excellence includes <strong>{total_records}</strong> achievements, participation in <strong>{total_competition_levels}</strong> levels, and earning <strong>{total_ranks}</strong> ranks. With each competition, they’ve proven themselves capable of overcoming challenges and reaching new heights. From local tournaments to national events, they showed incredible grit and determination. Their success is a direct result of their hard work and commitment. We can’t wait to see where their talents take them in the years ahead.",
    
    "With <strong>{total_records}</strong> achievements spanning <strong>{total_competition_levels}</strong> levels, our students have set new benchmarks by securing <strong>{total_ranks}</strong> ranks. Their determination to perform at their best in every competition has been awe-inspiring. Whether on a local stage or at a national level, they continually push their boundaries. These achievements reflect not only their abilities but also their spirit of resilience. We are confident that they will continue to break new records in the future.",
    
    "This year, our students have earned <strong>{total_records}</strong> outstanding achievements across <strong>{total_competition_levels}</strong> levels, capturing <strong>{total_ranks}</strong> ranks. Their commitment to excellence was visible in every competition they participated in, and they handled every challenge with grace. The success they’ve achieved is a result of both individual effort and collective support. With each accomplishment, they’ve demonstrated growth, skill, and resilience. We look forward to watching them continue to shine.",
    
    "With <strong>{total_records}</strong> records set across <strong>{total_competition_levels}</strong> competition levels, our students have proven their talents time and again, earning <strong>{total_ranks}</strong> prestigious ranks. Each achievement is a testament to their hard work, passion, and unwavering determination. Their success is not just in the number of ranks, but in the valuable lessons learned through every competition. We couldn’t be prouder of their journey, and we are excited for what the future holds.",
    
    "Our students have demonstrated exceptional talent by achieving <strong>{total_records}</strong> milestones across <strong>{total_competition_levels}</strong> levels and securing <strong>{total_ranks}</strong> ranks. Every competition brought new challenges, and they faced each one with confidence and determination. These remarkable achievements speak volumes about their ability to excel under pressure. We are continually amazed by their dedication and the standards they set. The future is bright for these young achievers.",
    
    "Celebrating <strong>{total_records}</strong> achievements across <strong>{total_competition_levels}</strong> levels, our students have proven themselves by securing <strong>{total_ranks}</strong> prestigious ranks. Their success is not merely about accolades, but about perseverance, growth, and a relentless pursuit of excellence. Each achievement adds to the legacy they are building. Their passion and commitment continue to inspire us all. We look forward to their continued success and the challenges they will conquer next.",
    
    "Our students’ remarkable achievements include <strong>{total_records}</strong> milestones, participation in <strong>{total_competition_levels}</strong> levels, and earning <strong>{total_ranks}</strong> ranks. These accomplishments reflect their resilience and the passion they bring to every competition. Each rank earned was a result of teamwork, discipline, and effort. We’ve witnessed their determination, and it has paid off in remarkable ways. We can’t wait to see how their potential continues to unfold.",
    
    "In this year’s sports report, we celebrate <strong>{total_records}</strong> achievements, <strong>{total_competition_levels}</strong> competition levels, and <strong>{total_ranks}</strong> ranks. Our students’ commitment to excellence has been nothing short of inspiring. They competed at various levels, each time showcasing their immense potential and determination. These accolades are proof of their hard work, discipline, and dedication. We are excited for the future they are building.",
    
    "With <strong>{total_records}</strong> achievements across <strong>{total_competition_levels}</strong> levels and <strong>{total_ranks}</strong> ranks earned, our students have excelled in every area of competition. Their success is the result of years of hard work and the relentless pursuit of perfection. They’ve shown that with dedication, any challenge can be overcome. Their achievements inspire everyone around them. We can only imagine the great things they will accomplish in the future.",
    
    "Our students have excelled this year, earning <strong>{total_records}</strong> achievements, participating in <strong>{total_competition_levels}</strong> levels, and earning <strong>{total_ranks}</strong> ranks. Their journey has been filled with hard work, learning, and, most importantly, perseverance. Competing across various levels, they’ve shown resilience and adaptability. These milestones are a reflection of their dedication to becoming the best versions of themselves. We are excited to continue supporting them on their journey.",
    
    "This year, our students have achieved <strong>{total_records}</strong> accolades, participated in <strong>{total_competition_levels}</strong> competition levels, and earned <strong>{total_ranks}</strong> ranks. Their efforts have not only been about securing top ranks but about continuously improving and learning. Each achievement signifies their growth and determination. The skills they’ve developed will serve them in all aspects of life. We eagerly await their future successes.",
    
    "Our students achieved <strong>{total_records}</strong> outstanding accomplishments across <strong>{total_competition_levels}</strong> levels and secured <strong>{total_ranks}</strong> ranks. These achievements reflect their hard work, dedication, and their relentless pursuit of excellence. Competing in such a wide range of events, they have shown incredible versatility. Each victory has been a step toward reaching their ultimate goals. We are proud of their journey and excited to see where their talents take them."
    // Add more templates here if necessary
];

// Step 4: Randomly Select a Template
$selected_template = $text_templates[array_rand($text_templates)];

// Step 5: Replace Placeholders with Actual Data
$dynamic_text = str_replace(
    ['{total_records}', '{total_competition_levels}', '{total_ranks}'],
    [$total_records, $total_competition_levels, $total_ranks],
    $selected_template
);
?>


    <style>
        
        p {
            font-size: 16px;
            text-align: justify;
        }
        /* Bulb Button Style */
        .bulb-button {
            position: relative;
            top: 240px;
            right: 450px;
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 30px;
            color: #f39c12;
        }
    </style>


    <!-- Bulb Button that refreshes the page -->
    <button class="bulb-button" onclick="refreshPage()">💡</button>

    <div class="card-header">Sports Achievements</div>
    <p>
        <?php echo $dynamic_text; ?>
    </p>

    <script>
        // Function to refresh the page when the bulb button is clicked
        function refreshPage() {
            // Refresh the page, same as pressing F5 or clicking the browser refresh button
            window.location.reload();
        }
    </script>


    <!-- <div class="intro">
        <div class="card-header">Sports Achievements</div><br>
        <p style="text-align:justify;">This report showcases the exceptional sports achievements of our students across various competitions. Our database contains <strong><?php echo $total_records; ?></strong> records of achievements from students who participated in different competition levels. The data spans across <strong><?php echo $total_competition_levels; ?></strong> unique competition levels and <strong><?php echo $total_ranks; ?></strong> distinct ranks achieved.</p>
        <p style="text-align:justify;">From local tournaments to national events, this analysis gives insights into how our students performed at different levels. Below, we present both graphical and tabular representations of their achievements, helping us understand trends and patterns in their performance.</p>
    </div>
     -->
    <div class="card">
        <div class="card-header">Sports Achievements</div>
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Competition Level</th>
                        <th>Rank</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($sports_result->num_rows > 0): ?>
                        <?php while($row = $sports_result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['student_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['competition_level']); ?></td>
                                <td><?php echo htmlspecialchars($row['rank']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-header">Rank X Count</div>
        <div class="card-body">
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
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-header">Level X Achievements</div>
        <div class="card-body">
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
                        
                        // Trigger notification if participation is less than 2
                        if ($count < 2) {
                            echo "
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const notification = document.getElementById('lowParticipationNotification');
                                        notification.style.display = 'block';
                                    });
                                </script>
                            ";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Notification Panel for Low Participation -->
    <div id="lowParticipationNotification" style="display: none; position: fixed; top: 20%; right: -300px; width: 280px; background: #ffe9e9; border-left: 4px solid #ff6b6b; padding: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); z-index: 1000; transition: all 0.3s ease;">
        <h4 style="margin: 0 0 10px; font-size: 16px; color: #333;">Low Engagement Alert in Sports</h4>
        <p style="margin: 0; font-size: 14px; color: #555;">Participation is less than 2 in certain competition levels. Consider strategies to boost engagement.</p>
        <button onclick="document.getElementById('lowParticipationNotification').style.right = '-300px';" style="margin-top: 10px; padding: 5px 10px; background: #ff6b6b; color: white; border: none; border-radius: 4px; cursor: pointer;">Close</button>
    </div>
</div>

<script>
    // JavaScript to slide in the notification panel
    document.addEventListener('DOMContentLoaded', function() {
        const notification = document.getElementById('lowParticipationNotification');
        if (notification) {
            setTimeout(() => {
                notification.style.right = '0'; // Slide in the panel
            }, 500); // Delay for smooth transition
        }
    });
</script>

  <br><br>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Faculty Achievements -->
  <div class="a4-page">
    <!-- Chart Section -->
    <div class="chart-container">
        <!-- Achievements by Competition Level Chart -->
        <div style="border: 1px solid #000; padding: 100px; margin-bottom: 20px;">
            <canvas id="competitionChart"></canvas>
        </div>

        <!-- Rank Distribution Chart -->
        <div style="border: 1px solid #000; padding: 10px;">
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
  </div>






  <br>

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



<br><br>







<?php
// Step 1: Database Connection
$conn = new mysqli("localhost", "root", "", "cse_template");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Fetch Data from Database
$total_achievements = $conn->query("SELECT COUNT(*) AS count FROM faculty_achievements")->fetch_assoc()['count'];
$total_faculty = $conn->query("SELECT COUNT(DISTINCT designation) AS count FROM faculty_achievements")->fetch_assoc()['count'];




// Close connection
$conn->close();

// Step 3: Define Text Templates
$text_templates = [
   "Our faculty members have reached incredible heights, with <strong>{$total_faculty}</strong> individuals collectively achieving <strong>{$total_achievements}</strong> prestigious recognitions across multiple fields. Each award is a testament to their dedication and expertise. They have excelled in research, teaching, and innovation. Their contributions have significantly elevated the institution's reputation. We are proud to celebrate their exceptional accomplishments.",
    "This report highlights the exemplary accomplishments of <strong>{$total_faculty}</strong> faculty members, who together have achieved <strong>{$total_achievements}</strong> significant milestones. Their achievements span diverse domains, showcasing their versatility. From groundbreaking research to impactful teaching, they have set new benchmarks. These milestones reflect their commitment to excellence. The institution takes immense pride in their success.",
    "Demonstrating excellence in their fields, <strong>{$total_faculty}</strong> faculty members have amassed an impressive total of <strong>{$total_achievements}</strong> achievements. Their work has been recognized on national and international platforms. They have consistently pushed the boundaries of knowledge and practice. These accomplishments are a reflection of their dedication and hard work. They continue to inspire the entire academic community.",
    "Our institution celebrates the dedication of <strong>{$total_faculty}</strong> faculty members, whose combined efforts have resulted in <strong>{$total_achievements}</strong> noteworthy honors. These accolades recognize their contributions to education and research. Their hard work and determination are evident in every milestone. By setting high standards, they serve as role models. We are honored to have such exceptional talent on our team.",
    "Through their hard work and innovation, <strong>{$total_faculty}</strong> faculty members have secured <strong>{$total_achievements}</strong> significant achievements in their respective domains. These achievements highlight their ability to solve complex problems. They have brought innovative ideas to life through their research. Their success is a testament to their unrelenting dedication. The institution thrives due to their invaluable contributions.",
    "The faculty's dedication is evident in their success, as <strong>{$total_faculty}</strong> members have earned a remarkable <strong>{$total_achievements}</strong> recognitions collectively. These accomplishments showcase their commitment to excellence. They have positively impacted their students and peers. Their achievements continue to inspire the next generation of leaders. Their legacy of success will be remembered for years to come.",
    "With unwavering commitment to excellence, <strong>{$total_faculty}</strong> faculty members have achieved <strong>{$total_achievements}</strong> accomplishments across various areas of expertise. These awards highlight their passion for innovation and education. Their efforts have brought pride to the institution. Their work has set benchmarks for others to follow. They exemplify what it means to be leaders in their fields.",
    "Our faculty members, numbering <strong>{$total_faculty}</strong>, have set a high standard by collectively earning <strong>{$total_achievements}</strong> prestigious awards. Each recognition is a testament to their hard work and creativity. They have made remarkable strides in their respective areas. Their success strengthens the institution’s academic foundation. We applaud their remarkable contributions.",
    "Highlighting their exceptional efforts, <strong>{$total_faculty}</strong> faculty members have contributed to a total of <strong>{$total_achievements}</strong> distinguished achievements. These milestones showcase their relentless pursuit of excellence. Their impact extends beyond the institution, influencing communities globally. Their dedication inspires both colleagues and students. Their legacy will continue to shape future achievements.",
    "Reflecting their outstanding contributions, <strong>{$total_faculty}</strong> faculty members have been recognized with <strong>{$total_achievements}</strong> honors in various domains. Their work has advanced knowledge and practice across disciplines. They have demonstrated excellence in every project undertaken. Their achievements underscore the institution's academic rigor. Their journey of success serves as a source of inspiration.",
    "The dedication of our faculty is commendable, with <strong>{$total_faculty}</strong> members earning <strong>{$total_achievements}</strong> impressive achievements collectively. These accolades are a reflection of their hard work and perseverance. Their achievements span research, education, and community engagement. Their contributions have elevated the institution's profile globally. We celebrate their exceptional journey of success.",
    "Across diverse disciplines, <strong>{$total_faculty}</strong> faculty members have collectively achieved <strong>{$total_achievements}</strong> remarkable milestones. Their success highlights the breadth and depth of their expertise. They have consistently delivered impactful results. These accomplishments enhance the institution’s reputation for excellence. We are proud to honor their exceptional contributions.",
    "With expertise and passion, <strong>{$total_faculty}</strong> of our faculty have garnered <strong>{$total_achievements}</strong> awards, showcasing their excellence. Their achievements serve as a benchmark of quality. They have inspired peers and students alike through their work. Each recognition is a celebration of their dedication. We thank them for their invaluable contributions.",
    "The accomplishments of <strong>{$total_faculty}</strong> faculty members, who have collectively earned <strong>{$total_achievements}</strong> distinctions, are truly inspiring. Their work has made a lasting impact in their respective fields. They have been leaders and innovators in their areas of expertise. Their achievements bring pride to the institution. We continue to be inspired by their journey.",
    "Our academic community takes pride in the success of <strong>{$total_faculty}</strong> faculty members, who have achieved <strong>{$total_achievements}</strong> prestigious honors. These accolades are a testament to their exceptional talent. Their achievements have been recognized globally. They serve as an inspiration to future generations. We are grateful for their immense contributions.",
    "Exemplifying dedication and skill, <strong>{$total_faculty}</strong> faculty members have attained <strong>{$total_achievements}</strong> awards across various fields. Their accomplishments highlight their exceptional abilities. They have consistently exceeded expectations in their work. Their success strengthens the institution’s academic excellence. We celebrate their dedication and hard work.",
    "The faculty's pursuit of excellence has led <strong>{$total_faculty}</strong> members to achieve <strong>{$total_achievements}</strong> notable recognitions this year. These milestones highlight their unwavering commitment. Their work has set high standards in their fields. They have positively impacted the institution and its community. Their achievements will inspire many for years to come.",
    "Our institution commends the hard work of <strong>{$total_faculty}</strong> faculty members, whose combined achievements total <strong>{$total_achievements}</strong> remarkable milestones. These accomplishments are a reflection of their relentless effort. Their work has brought the institution to greater heights. They continue to be a source of inspiration for all. We honor their incredible journey.",
    "Through their tireless efforts, <strong>{$total_faculty}</strong> faculty members have collectively earned <strong>{$total_achievements}</strong> significant accolades. Their dedication is evident in every accomplishment. They have set a benchmark for future achievements. Their success is a source of pride for the institution. We congratulate them on their outstanding performance.",
    "Celebrating the achievements of our faculty, we acknowledge <strong>{$total_faculty}</strong> members who have secured a combined total of <strong>{$total_achievements}</strong> awards and recognitions. Their achievements represent the pinnacle of excellence. They have made lasting contributions to their fields. Their dedication continues to inspire others. We take immense pride in their success."
];

// Step 4: Randomly Select a Template
$selected_template = $text_templates[array_rand($text_templates)];

// Step 5: Replace Placeholders with Actual Data
$dynamic_text = str_replace(
    ['{total_achievements}', '{total_faculty}'],
    [$total_achievements, $total_faculty],
    $selected_template
);
?>








  <!-- Faculty Achievements -->
  <div class="a4-page">
    <div class="intro">
      <h2 class=" card-header">Faculty Achievements</h2>
     
    </div>




    <style>
        /* Bulb Button Style */
        .bulb-button {
            position: relative;
           
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 30px;
            color: #f39c12;
        }
    </style>
</head>
<body>

    <!-- Bulb Button that refreshes the page -->
    <button class="bulb-button" onclick="refreshPage()">💡</button>

    
    <p>
        <?php echo $dynamic_text; ?>
    </p>

    <script>
        // Function to refresh the page when the bulb button is clicked
        function refreshPage() {
            // Refresh the page, same as pressing F5 or clicking the browser refresh button
            window.location.reload();
        }
    </script>

</body>
</html>


    
    <h2>Achievements Summary</h2>
    <p >Total Faculty Members: <?php echo $total_faculty; ?></p>
    <p>Total Achievements: <?php echo $total_achievements; ?></p>
    
    <div class="card">
      <div class="card-header">Faculty Achievements</div>
      <div class="card-body">
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
            <?php if ($faculty_result->num_rows > 0): ?>
              <?php while($row = $faculty_result->fetch_assoc()): ?>
                <tr>
                  <td><?php echo htmlspecialchars($row['faculty_name']); ?></td>
                  <td><?php echo htmlspecialchars($row['designation']); ?></td>
                  <td><?php echo htmlspecialchars($row['achievement_type']); ?></td>
                  <td><?php echo htmlspecialchars($row['achievement_details']); ?></td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="4">No records found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
</div>

      <div class="chart-container row">
        <!-- Achievement Type Distribution Chart -->
        <div class="col-6">
            <canvas id="achievementChart"></canvas>
        </div>

        <!-- Designation Distribution Chart -->
        <div class="col-6">
            <canvas id="designationChart"></canvas>
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

    </div>
  </div>








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


<br><br>
  <!-- Enrollments -->
  <div class="a4-page">
    <div class="intro">
    <div class=" card-header">Enrollments</div>
      <p  style="text-align:justify;">The enrollment data provides insights into the academic progress of students. It showcases the number of enrolled students and those who have passed out.</p>
      <p  style="text-align:justify;">Additionally, scholarships awarded are highlighted to encourage excellence. Below is a detailed breakdown of enrollment and scholarship statistics.</p>
    </div>

    
    <div class="intro">
  
        <p  style="text-align:justify;">This report provides insights into the enrollment trends of our students across various classes. The data includes the number of students enrolled, the number of students who have passed out, and scholarships awarded for excellence. Currently, we have data for <strong><?php echo $total_classes; ?></strong> classes, with a total of <strong><?php echo $total_enrolled; ?></strong> students enrolled, <strong><?php echo $total_passed_out; ?></strong> students who have passed out, and <strong><?php echo $total_scholarships; ?></strong> scholarships awarded across different classes.The charts below provide a visual representation of this data, offering a clear understanding of enrollment trends and the distribution of scholarships.</p>
    </div>


    <p>Total Enrolled Students: <?php echo $total_enrolled; ?></p>
    <p>Total Passed Out Students: <?php echo $total_passed_out; ?></p>
    <p>Total Scholarships Awarded: <?php echo $total_scholarships; ?></p>



    
    <div class="card">
      <div class=" card-header">Enrollments Details</div>
      <div class="card-body">
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
            <?php if ($enrollments_result->num_rows > 0): ?>
              <?php while($row = $enrollments_result->fetch_assoc()): ?>
                <tr>
                  <td><?php echo htmlspecialchars($row['class']); ?></td>
                  <td><?php echo htmlspecialchars($row['enrolled']); ?></td>
                  <td><?php echo htmlspecialchars($row['passed_out']); ?></td>
                  <td><?php echo htmlspecialchars($row['scholarship']); ?></td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="4">No records found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
    <br><br>
       <!-- Chart Section -->
       <div class="chart-container">
        <!-- Enrollment vs Passed Out Chart -->
        <div>
            <canvas id="enrollmentChart"></canvas>
        </div>

        <!-- Scholarship Distribution Chart -->
        <!-- <div>
            <canvas id="scholarshipChart"></canvas>
        </div> -->
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
                backgroundColor: 'rgba(75, 221, 53, 0.69)',
                borderColor: 'rgb(91, 192, 75)',
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


  </div>


  
<br><br>



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




  <!-- Cultural and Extra Curricular -->
  <div class="a4-page">
  <div class="intro">
      <h2 class="card-header">Cultural and Extra Curricular Activities</h2>
      <p style="text-align:justify;">The enrollment data provides insights into the academic progress of students. It showcases the number of enrolled students and those who have passed out.</p>
      <p style="text-align:justify;">Additionally, scholarships awarded are highlighted to encourage excellence. Below is a detailed breakdown of enrollment and scholarship statistics.</p>
    </div>


    <div class="intro">
       
        <p style="text-align:justify;">This report provides insights into the various cultural and extracurricular activities our students participate in. The activities range from cultural events to NSS involvement. We have data on <strong><?php echo count($activities); ?></strong> activities and the level of student participation. The charts below highlight the total student participation, collaborations, and NSS involvement across these activities.</p>
    </div>
    <p>Total Activities: <?php echo count($activities); ?></p>
    <p>Total Student Participation: <?php echo $total_participation; ?></p>
    <p>Total NSS Involvement: <?php echo $total_nss; ?></p>


    <div class="card">
      <div class="card-header">Cultural and Extra Curricular Activities</div>
      <div class="card-body">
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
      </div>
 </div>
<br>
      <div class="chart-container">
        <!-- Student Participation Chart -->
        <div>
            <canvas id="participationChart"></canvas>
        </div>

        <!-- NSS Involvement Chart -->
        <!-- <div>
            <canvas id="nssChart"></canvas>
        </div> -->
   




    
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




    </div>
  </div>





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



<br><br>
  <!-- Achievements -->
  <div class="a4-page">
  <div class="intro">
      <h2 class="card-header">Student Achievements</h2>
      <p style="text-align:justify;">The enrollment data provides insights into the academic progress of students.It showcases the number of enrolled students and those who have passed out.</p>
      <p style="text-align:justify;">Additionally, scholarships awarded are highlighted to encourage excellence. Below is a detailed breakdown of enrollment and scholarship statistics.</p>
    </div>


    <div class="intro">
       
        <p style="text-align:justify;">This report highlights the achievements of students over the years. The data includes a variety of accomplishments, from academic awards to extracurricular recognitions. A total of <strong><?php echo $achievements_result->num_rows; ?></strong> achievements have been recorded.</p>
        <p style="text-align:justify;">The charts below show the distribution of achievements by type and year, providing valuable insights into student excellence.</p>
    </div>


    <div class="card">
      <div class="card-header">Achievements</div>
      <div class="card-body">
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

      </div>
    </div>



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

    <br><br>
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


  <!-- Academic Records -->
  <div class="a4-page">
  <div class="intro">
      <h2 class="card-header">Academic Records </h2>
      <p style="text-align:justify;">The enrollment data provides insights into the academic progress of students. It showcases the number of enrolled students and those who have passed out.</p>
      <p style="text-align:justify;">Additionally, scholarships awarded are highlighted to encourage excellence. Below is a detailed breakdown of enrollment and scholarship statistics.</p>
    </div>


    <div class="intro">
        <p style="text-align:justify;">This section highlights the academic performance of students over the years. It includes their ranks, marks, and additional details like profile images.</p>
        <p style="text-align:justify;">With a total of <strong><?php echo $academic_result->num_rows; ?></strong> records, the data illustrates overall trends in academic achievement.</p>
    </div>


    <div class="card">
      <div class="card-header">Top Ranker</div>
      <div class="card-body">
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
      </div>
    </div>
  </div>
    
</div>
          </div>

<br><br><br>




</body>
</html>