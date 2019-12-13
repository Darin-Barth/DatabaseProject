<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin 2 - Dashboard</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">


            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">



                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 pt-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                            <a href="/indexCode/index.html" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-home fa-md text-white-50"></i> Home</a>
                        </div>

                        <!-- Content Row -->
                        <div class="row">

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $conn = mysqli_connect("cse.unl.edu:3306",'ppoudel','7hAMmX','ppoudel');
                                                    $sql = "SELECT * from bakeryorder";
                                                    $result = mysqli_query($conn, $sql);
                                                    $now = new \DateTime('now');
                                                    $month1 = $now->format('m');
                                                    $year1 = $now->format('Y');
                                                    $sum = 0;
                                                    $month ="";
                                                    $year ="";
                                                    if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()) {
                                                            $month = substr($row['odate'],-5,2 );
                                                            $year = substr($row['odate'],-10,4 );

                                                            if($month == $month1 && $year == $year1){
                                                                $sum += $row["qty"];
                                                            }

                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }
                                                    echo "$".$sum * 20;
                                                    $conn->close();
                                                    ?>

                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $conn = mysqli_connect("cse.unl.edu:3306",'ppoudel','7hAMmX','ppoudel');
                                                    $sql = "SELECT * from bakeryorder";
                                                    $result = mysqli_query($conn, $sql);
                                                    $now = new \DateTime('now');
                                                    $month1 = $now->format('m');
                                                    $year1 = $now->format('Y');
                                                    $sum = 0;
                                                    $month ="";
                                                    $year ="";
                                                    if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()) {
                                                            $month = substr($row['odate'],-5,2 );
                                                            $year = substr($row['odate'],-10,4 );

                                                            if($year == $year1){
                                                                $sum += $row["qty"];
                                                            }

                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }
                                                    echo "$".$sum * 20;
                                                    $conn->close();
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Incomplete
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $conn = mysqli_connect("cse.unl.edu:3306",'ppoudel','7hAMmX','ppoudel');
                                                    $sql = "SELECT * from bakeryorder";
                                                    $result = mysqli_query($conn, $sql);

                                                    $sum = 0;
                                                    $isdone;

                                                    if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()) {

                                                            $isdone = $row["isdone"];

                                                            if($isdone == 0){
                                                                $sum +=1;
                                                            }

                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }
                                                    echo $sum;
                                                    $conn->close();
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Row -->

                        <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <div id="chartContainer" style="height: 305px; width: 100%;"></div>
                                            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $conn = mysqli_connect("cse.unl.edu:3306",'ppoudel','7hAMmX','ppoudel');
                            $sql = "SELECT * from bakeryorder";
                            $result = mysqli_query($conn, $sql);

                            $sum1 = 0;
                            $sum2 = 0;
                            $sum3 = 0;
                            $sum4 = 0;
                            $sum5 = 0;
                            $sum6 = 0;
                            $sum7 = 0;
                            $sum8 = 0;
                            $sum9 = 0;
                            $sum10 = 0;
                            $sum11 = 0;
                            $sum12 = 0;

                            $month = 0;


                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $month = substr($row['odate'],-5,2 );
                                    if($month == '01'){
                                        $sum1+= $row['qty']*20;
                                    }
                                    if($month == '02'){
                                        $sum2+= $row['qty']*20;
                                    }
                                    if($month == '03'){
                                        $sum3+= $row['qty']*20;
                                    }
                                    if($month == '04'){
                                        $sum4+= $row['qty']*20;
                                    }
                                    if($month == '05'){
                                        $sum5+= $row['qty']*20;
                                    }
                                    if($month == '06'){
                                        $sum6+= $row['qty']*20;
                                    }
                                    if($month == '07'){
                                        $sum7+= $row['qty']*20;
                                    }
                                    if($month == '08'){
                                        $sum8+= $row['qty']*20;
                                    }
                                    if($month == '09'){
                                        $sum9+= $row['qty']*20;
                                    }
                                    if($month == '10'){
                                        $sum10+= $row['qty']*20;
                                    }
                                    if($month == '11'){
                                        $sum11+= $row['qty']*20;
                                    }
                                    if($month == '12'){
                                        $sum12+= $row['qty']*20;
                                    }

                                }
                            } else {
                                echo "0 results";
                            }

                            $conn->close();

                            $dataPoints = array(
                                array("y" => $sum1, "label" => "January" ),
                                array("y" => $sum2, "label" => "Febuary" ),
                                array("y" => $sum3, "label" => "March" ),
                                array("y" => $sum4, "label" => "April" ),
                                array("y" => $sum5, "label" => "May" ),
                                array("y" => $sum6, "label" => "June" ),
                                array("y" => $sum7, "label" => "July" ),
                                array("y" => $sum8, "label" => "August" ),
                                array("y" => $sum9, "label" => "September" ),
                                array("y" => $sum10, "label" => "October" ),
                                array("y" => $sum11, "label" => "November" ),
                                array("y" => $sum12, "label" => "Decemeber" )
                            );

                            ?>
                            <script>
                                window.onload = function() {

                                    var chart = new CanvasJS.Chart("chartContainer", {
                                        animationEnabled: true,
                                        theme: "light",
                                        title:{

                                        },
                                        axisY: {

                                        },
                                        data: [{
                                            type: "column",
                                            yValueFormatString: "$#,##0.##",
                                            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                        }]
                                        });
                                               chart.render();

                                               }
                            </script>

                            <!-- Pie Chart -->
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-pie pt-4 pb-2">
                                            <canvas id="myPieChart"></canvas>
                                        </div>
                                        <div class="mt-4 text-center small">
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-primary"></i> Pies
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-success"></i> Pastries
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-info"></i> Cakes
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Buttercup Bakery 2019</span>
                            </div>
                        </div>
                    </footer>
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
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <a class="btn btn-primary" href="login.html">Logout</a>
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

            </body>

        </html>
