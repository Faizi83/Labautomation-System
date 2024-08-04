<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit; 
}
?>
<?php
 require 'Connection/connection.php';
 ?>

<?php
$category_query = "SELECT * FROM `category`";

$category_prepare = $connection->prepare($category_query);
$category_prepare->execute();

$category_data = $category_prepare->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Charts</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

            <!-- Navbar Start -->

            <?php require 'header/navbar.php' ?>

            <!-- Navbar End -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Charts</h1>
                    <p class="mb-4">Chart.js is a third party plugin that is used to generate the charts in this theme.
                        The charts below have been customized - for further customization options, please visit the <a
                            target="_blank" href="https://www.chartjs.org/docs/latest/">official Chart.js
                            documentation</a>.</p>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-8 col-lg-7">

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                    <hr>
                                    Styling for the area chart can be found in the
                                    <code>/js/demo/chart-area-demo.js</code> file.
                                </div>
                            </div>

                            <!-- Bar Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                    <hr>
                                    Styling for the bar chart can be found in the
                                    <code>/js/demo/chart-bar-demo.js</code> file.
                                </div>
                            </div>

                        </div>

                        <!-- Donut Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <hr>
                                    Styling for the donut chart can be found in the
                                    <code>/js/demo/chart-pie-demo.js</code> file.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <!-- Footer -->
           <?php require'header/footer.php' ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
    


  <!-- ___Ajax Work___ -->

  <script>

// For Loading body data when clickng on navbar links

$(document).ready(function() {
    function initializeEventHandlers() {
        // Handle navbar link clicks
        $('.load-body').on('click', function(e) {
        e.preventDefault(); // Prevent the default link behavior

        var page = $(this).attr('href'); // Get the URL from the href attribute

  // Use the History API to update the URL
        history.pushState(null, null, page);

  // Load the content into the #wrapper element
       $('#page-top').load(page, function(response, status, xhr) {
       if (status === 'success') {
      // Content loaded successfully
       }else if (status === 'error') {
      // Handle any loading errors
      alert('Error loading the page: ' + xhr.status + ' ' + xhr.statusText);
    }
  });
});


        // For Loading body data when clickng on dropdown links


        
        $('.collapse-item').on('click', function(e) {
        e.preventDefault(); // Prevent the default link behavior

        var page = $(this).attr('href'); // Get the URL from the href attribute

  // Use the History API to update the URL
        history.pushState(null, null, page);

  // Load the content into the #wrapper element
       $('#page-top').load(page, function(response, status, xhr) {
       if (status === 'success') {
      // Content loaded successfully
       }else if (status === 'error') {
      // Handle any loading errors
      alert('Error loading the page: ' + xhr.status + ' ' + xhr.statusText);
    }
  });
});


          // For Loading body data when clickng on Tested links

        $('.test-now-button').on('click', function() {
            var category = $(this).data('category'); // Get the category name
            var page = 'tester_fild.php?id=' + category;

            // Load the content into the #page-top element
            $('#page-top').load(page, function(response, status, xhr) {
                if (status === 'success') {
                    // Content loaded successfully
                    initializeEventHandlers(); // Reinitialize event handlers
                } else if (status === 'error') {
                    // Handle any loading errors
                    alert('Error loading the page: ' + xhr.status + ' ' + xhr.statusText);
                }
            });
        });

    }

    // Initialize the event handlers when the page loads:
    initializeEventHandlers();
});


</script>













</body>

</html>