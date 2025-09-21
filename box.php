<?php include "_include/head.php" ?>

<!-- main content part here -->

<!-- sidebar  -->
<?php include "_include/nav.php" ?>
<!--/ sidebar  -->


<section class="main_content dashboard_part large_header_bg">
    <!-- menu  -->
    <?php include "_include/header.php" ?>
    <!--/ menu  -->
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="dashboard_header mb_50">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dashboard_header_title">
                                    <h3> Available Dues</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dashboard_breadcam text-end">
                                    <p><a href="index.html">Dashboard</a> <i class="fas fa-caret-right"></i> Available
                                        Dues</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                include '_include/connect.php';
                $query = mysqli_query( $con, 'SELECT * FROM due' );
                while ( $row = mysqli_fetch_array($query) ) {
                    ?>
                <div class="col-md-4">
                    <div class="card mb-3 widget-chart">
                        <h5>Category: <?php
                    if ($row['category'] == '1') {
                        echo "Staylites";
                    }elseif ($row['category'] == '2') {
                        echo "Fresher";
                    } else {
                        echo "Both";
                    }
                      
                    ?></h5>
                        <div class="widget-numbers"><span>&#8358; <?php echo number_format($row['price']); ?></b></span>
                        </div>
                        <div class="widget-subheading"><b><?php echo $row['descs'] ?></b></div>
                        <?php
                        include '_include/connect.php';
                        $email = $_SESSION['email'];
                        $dueid = $row['id'];
                        $qrr = mysqli_query( $con, "SELECT * FROM payment WHERE email = '$email' and due_id = '$dueid'" );
                        if (mysqli_num_rows($qrr) > 0) {
                            ?>
                        <div class="widget-description text-success">
                            <a onclick="return confirm('Do you want to Print this receipt');"
                                href="printreceipt.php?id=<?php echo $row['id']; ?>" class="btn btn-success"><i
                                    class="fas fa-check"></i>
                                Paid, Print Receipt 
                            </a>
                            <!-- <button class="btn btn-success">View Due</button> -->
                        </div>
                        <?php

                        }else {
                            ?>

                        <div class="widget-description text-success">
                            <a onclick="return confirm('Are You Sure You want to Pay for this Receipt');"
                                href="duedetail.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary"><i
                                    class="fas fa-pen"></i>
                                Pay Due
                            </a>
                            <!-- <button class="btn btn-success">View Due</button> -->
                        </div>
                        <?php

                        }
                        ?>

                    </div>
                </div>
                <?php

                }
                ?>

            </div>
        </div>
    </div>

    <!-- footer part -->
    <?php include "_include/footer.php" ?>