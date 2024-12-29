<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cse_template";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the latest faculty data (you can modify the query to fetch specific data)
$sql = "SELECT * FROM faculty ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

$faculty = null;
if ($result->num_rows > 0) {
    $faculty = $result->fetch_assoc();
} else {
    echo "No data found!";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty Information Card</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="../img/icon.png">
  <style>
    .card-header {
      background-color: #007bff;
      color: white;
      font-weight: bold;
    }
    .faculty-img {
      max-width: 100%; /* Ensure the image scales to fit its container */
      height: auto;
    }
    .card-body .btn {
      margin-top: 15px;
    }
    /* Additional styling for smaller screens */
    @media (max-width: 768px) {
      .faculty-img {
        max-width: 150px; /* Smaller image size on mobile */
      }
    }
  </style>
</head>

<body>
 
  <div class="container">
    <div class="card">
      <div class="card-header text-center">
        FACULTY INFORMATION
      </div>
      <div class="card-body">
        <div class="row">
          <!-- Faculty Image on the Left -->
          <div class="col-md-4 text-center mb-3 mb-md-0">
            <img src="<?php echo htmlspecialchars($faculty['image_path'] ?? '../image/demo.jpg'); ?>" alt="Faculty Image" class="faculty-img">
          </div>
          <!-- Faculty Information Table -->
          <div class="col-md-8">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th scope="row">Name</th>
                  <td><?php echo htmlspecialchars($faculty['full_name']); ?></td>
                </tr>
                <tr>
                  <th scope="row">Designation</th>
                  <td><?php echo htmlspecialchars($faculty['designation']); ?></td>
                </tr>
                <tr>
                  <th scope="row">Address</th>
                  <td><?php echo htmlspecialchars($faculty['address']); ?></td>
                </tr>
                <tr>
                  <th scope="row">Date of Birth</th>
                  <td><?php echo htmlspecialchars($faculty['dob']); ?></td>
                </tr>
                <tr>
                  <th scope="row">Department</th>
                  <td><?php echo htmlspecialchars($faculty['department']); ?></td>
                </tr>
                <tr>
                  <th scope="row">Date of Joining</th>
                  <td><?php echo htmlspecialchars($faculty['doj']); ?></td>
                </tr>
              </tbody>
            </table>
            <!-- Generate Report Button -->
            <div class="text-end">
              <a href="../input_templates/t2.html">
                <button type="button" class="btn btn-primary">
                  Generate Report <i class="bi bi-arrow-right"></i>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap 5 Icons -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
