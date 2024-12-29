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

// Fetch achievements data
$sql = "SELECT student_name, year, achievement_type, achievement_details, file_path FROM achievements";
$result = $conn->query($sql);
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CSE - Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
  
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/icon.png" />




        <style>
        
        .table-title {
            margin-top: 20px;
            font-weight: bold;
            font-size: 20px;
            color: #222;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 30px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            font-size: 16px;
        }
        td {
            font-size: 14px;
        }
        .file-link {
            color: #1a73e8;
            text-decoration: none;
        }
        .file-link:hover {
            text-decoration: underline;
        }

    </style>



  </head>
  
  <body class="with-welcome-text">
  
 <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'cse_template');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Fetch data for cards
$newAdmissionQuery = "SELECT SUM(enrolled) AS total FROM enrollments ";
$placementQuery = "SELECT SUM(enrolled) AS total FROM enrollments ";
$internshipQuery = "SELECT SUM(enrolled) AS total FROM enrollments ";
$studentsQuery = "SELECT SUM(enrolled) AS total FROM enrollments";

$newAdmission = $conn->query($newAdmissionQuery)->fetch_assoc()['total'] ?? '0';
$placement = $conn->query($placementQuery)->fetch_assoc()['total'] ?? '0';
$internship = $conn->query($internshipQuery)->fetch_assoc()['total'] ?? '0';
$students = $conn->query($studentsQuery)->fetch_assoc()['total'] ?? '0';
?> 







    <div class="container-scroller">
      

      


      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo" href="index.html" style="font-size: 15px; font-weight: bold;">
              SHIKSHA-SANKALAN <!-- <img src="assets/images/icon.png" alt="logo" /> -->
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.html">
              <img src="assets/images/icon.png" alt="logo" />
            </a>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
              <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">Admin</span></h1>
              <h3 class="welcome-sub-text">Performance summary of the <b>Computer Science & Engineering Department</b></h3>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown d-none d-lg-block">
        
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                
              </div>
            </li>
            <li class="nav-item d-none d-lg-block">
              <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                <span class="input-group-addon input-group-prepend border-right">
                  <span class="icon-calendar input-group-text calendar-icon"></span>
                </span>
                <input type="text" class="form-control">
              </div>
            </li>
          <li class="nav-item">
    <form class="search-form" action="#">
        <i class="icon-search"></i>
        <input type="search" id="searchInput" class="form-control" placeholder="Search Here" title="Search here" oninput="highlightPageText()">
    </form>
</li>

           <script type="text/javascript">
             
function highlightPageText() {
    const searchQuery = document.getElementById("searchInput").value.trim().toLowerCase();
    clearHighlights(document.body); // Remove any existing highlights

    if (searchQuery) {
        const words = searchQuery.split(/\s+/); // Split by spaces for multi-word search
        const regex = new RegExp(`(${words.join('|')})`, "gi"); // Create a regex for all words
        highlightMatches(document.body, regex);
    }
}

function highlightMatches(element, regex) {
    if (element.nodeType === Node.TEXT_NODE) {
        const text = element.nodeValue;

        if (regex.test(text)) {
            const parent = element.parentNode;
            const fragment = document.createDocumentFragment();

            text.split(regex).forEach((part) => {
                if (regex.test(part)) {
                    const mark = document.createElement("mark");
                    mark.className = "highlight";
                    mark.textContent = part;
                    fragment.appendChild(mark);
                } else {
                    fragment.appendChild(document.createTextNode(part));
                }
            });

            parent.replaceChild(fragment, element);
        }
    } else if (element.nodeType === Node.ELEMENT_NODE && element.tagName !== "SCRIPT" && element.tagName !== "STYLE") {
        Array.from(element.childNodes).forEach((child) => highlightMatches(child, regex));
    }
}

function clearHighlights(element) {
    const marks = element.querySelectorAll("mark.highlight");
    marks.forEach((mark) => {
        const parent = mark.parentNode;
        parent.replaceChild(document.createTextNode(mark.textContent), mark);
    });
}




           </script>
            
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image">
                  <p class="mb-1 mt-3 fw-semibold">D Y P T C </p>
                  <p class="fw-light text-muted mb-0">dyptc@gmail.com</p>
                </div>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item nav-category">UI Elements</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Department</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#">Computer Science Engg.</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#">Mechnical Engg.</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#">Electrical Engg.</a></li>
                </ul>
              </div>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Achievements</span>
             
              </a>
       
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <i class="menu-icon mdi mdi-layers-outline"></i>
                <span class="menu-title">Demo</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#">Conent_Update</a></li>
                </ul>
              </div>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Demo</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-12">
                <div class="home-tab">
                  <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                      </li>
                      <!-- <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                      </li> -->
                    </ul>
                    <div>
                      <div class="btn-wrapper">
                        <a href="#" class="btn btn-otline-dark align-items-center" onclick="shareContent()"><i class="icon-share"></i> Share</a>



                        <script>
    function shareContent() {
        if (navigator.share) {
            navigator.share({
                title: document.title, // Page title
                text: 'Check out this content!', // Custom share message
                url: window.location.href // Current page URL
            })
            .then(() => console.log('Content shared successfully'))
            .catch((error) => console.error('Error sharing:', error));
        } else {
            alert('Sharing is not supported on this browser.');
        }
    }
</script>



                        <a href="#" class="btn btn-otline-dark" onclick="printPage()"><i class="icon-printer"></i> Print</a>


                        <script>
    function printPage() {
        window.print();
    }
</script>



                       <a href="#" class="btn btn-primary text-white me-0 dropdown-toggle" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="icon-download"></i> Export
</a>
<ul class="dropdown-menu" aria-labelledby="exportDropdown">
    <li><a class="dropdown-item"  onclick="exportAsImage()">Export as CSV</a></li>
    <li><a class="dropdown-item" onclick="exportAsPDF()">Export as Word</a></li>
    <li><a class="dropdown-item"  onclick="exportAsHTML()">Export as HTML</a></li>
</ul>
                      </div>





    <script>
        // Export as PNG
        function exportAsImage() {
            html2canvas(document.querySelector("#content")).then(canvas => {
                const link = document.createElement("a");
                link.href = canvas.toDataURL("image/png");
                link.download = "screen.png";
                link.click();
            });
        }

        // Export as PDF
        function exportAsPDF() {
            html2canvas(document.querySelector("#content")).then(canvas => {
                const imgData = canvas.toDataURL("image/png");
                const pdf = new jspdf.jsPDF();
                const pageWidth = pdf.internal.pageSize.getWidth();
                const pageHeight = pdf.internal.pageSize.getHeight();
                const imgWidth = canvas.width / 4; // Adjust as needed
                const imgHeight = (canvas.height / canvas.width) * imgWidth;
                pdf.addImage(imgData, "PNG", 0, 0, pageWidth, imgHeight);
                pdf.save("screen.pdf");
            });
        }

        // Export as HTML
        function exportAsHTML() {
            const content = document.querySelector("#content").outerHTML;
            const blob = new Blob([content], { type: "text/html" });
            const link = document.createElement("a");
            link.href = URL.createObjectURL(blob);
            link.download = "screen.html";
            link.click();
        }
    </script>




                    </div>
                  </div>
                  <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="statistics-details d-flex align-items-center justify-content-between">
                            <div>
                              <p class="statistics-title">New Admission</p>
                              <h3 class="rate-percentage"><?php echo $newAdmission; ?></h3>
                              <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                            </div>
                            <div>
                              <p class="statistics-title">Placement Rate</p>
                              <h3 class="rate-percentage">20.3%</h3>
                              <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                            </div>
                            <div>
                              <p class="statistics-title">Internship Rate</p>
                              <h3 class="rate-percentage">68.8</h3>
                              <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                            </div>
                            <div class="d-none d-md-block">
                              <p class="statistics-title">Student</p>
                              <h3 class="rate-percentage"><?php echo $newAdmission; ?></h3>
                              <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                            </div>
                            <div class="d-none d-md-block">
                              <p class="statistics-title">Faculty </p>
                              <h3 class="rate-percentage">68</h3>
                              <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                            </div>
                            <div class="d-none d-md-block">
                              <p class="statistics-title">Other Staf</p>
                              <h3 class="rate-percentage">32</h3>
                              <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                            </div>
                          </div>
                        </div>
                      </div>
                     <!-- partial -->
 
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cse_template"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

   
      
        <div id="content">
        <div id="toggleSidebar">
    

    <div id="content">
       

        <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Student Achievements</h4>
                  


                   <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Student Name</th>
                    <th>Achievement Type</th>
                    <th>Details</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['year']); ?></td>
                            <td><?php echo htmlspecialchars($row['student_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['achievement_type']); ?></td>
                            <td><?php echo htmlspecialchars($row['achievement_details']); ?></td>
                            <td>
                                <a class="file-link" href="<?php echo htmlspecialchars($row['file_path']); ?>" target="_blank">View File</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No achievements found for the selected period.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>




                  </div>
                </div>
              </div>
         


         <?php
// Database connection (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cse_template";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch faculty achievements
$sql = "SELECT faculty_name, designation, achievement_type, achievement_details, file_path 
        FROM faculty_achievements 
        ORDER BY faculty_name ASC";
$result = $conn->query($sql);
?>


<div id="content">
        <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Faculty Achievements</h4>
                      <table>
            <thead>
                <tr>
                    <th>Faculty Name</th>
                    <th>Designation</th>
                    <th>Achievement Type</th>
                    <th>Details</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['faculty_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['designation']); ?></td>
                            <td><?php echo htmlspecialchars($row['achievement_type']); ?></td>
                            <td><?php echo htmlspecialchars($row['achievement_details']); ?></td>
                            <td>
                                <a class="file-link" href="<?php echo htmlspecialchars($row['file_path']); ?>" target="_blank">View File</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No achievements found for the selected period.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

                    </div>
                  </div>
                </div>
              </div>

<?php
// Database connection (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cse_template";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch sports achievements
$sql = "SELECT student_name, competition_level, rank, certificate_file 
        FROM sports_achievements 
        ORDER BY rank ASC";
$result = $conn->query($sql);
?>

<div id="content">
        <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Sports Achievements</h4>
<table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Competition Level</th>
                    <th>Rank</th>
                    <th>Certificate</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['student_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['competition_level']); ?></td>
                            <td><?php echo htmlspecialchars($row['rank']); ?></td>
                            <td>
                                <a class="file-link" href="<?php echo htmlspecialchars($row['certificate_file']); ?>" target="_blank">View Certificate</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No sports achievements found for the selected period.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>


             
             
              </div>
            </div>
          </div>
        </div>  
      </div>
    </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
</body>

</html>



      
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/template.js"></script>
  </body>
</html>