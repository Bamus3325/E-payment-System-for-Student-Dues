<?php include "_include/head.php" ?>

<!-- main content part here -->
 
 <!-- sidebar  -->
 <?php include "_include/nav.php" ?>
 <!--/ sidebar  -->


<section class="main_content dashboard_part large_header_bg">
        <!-- menu  -->
        <?php include "_include/header.php" ?>
    <!--/ menu  -->
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <!-- page title  -->
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white" >Dashboard</h3>
                            <ol class="breadcrumb page_bradcam mb-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dues </a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <!-- <li class="breadcrumb-item active">Sales</li> -->
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                
            <?php
        if ($_SESSION['user_type'] == '0') {
            ?>
            <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_20 ">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Recently Added Dues</h3>
                                </div>
                                <!-- <div class="header_more_tool">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                          <i class="ti-more-alt"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                          <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                          <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                          <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                          <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                        </div>
                                      </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="white_card_body QA_section">
                            <div class="QA_table ">
                                <!-- table-responsive -->
                                <table class="table lms_table_active2 p-0">
                                    <thead>
                                        <tr>
                                        <th scope="col">S/N</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Association_id</th>
                                                <th scope="col">Association Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
include '_include/connect.php';
$email = $_SESSION['email'];
$query = mysqli_query( $con, "SELECT * FROM due ORDER BY id DESC LIMIT 5" );
$i = 1;
while ( $row = mysqli_fetch_array($query) ) {

    ?>
    <tr>
    <td class="f_s_14 f_w_400 color_text_3"><?php echo $i; ?></td>
    <td class="f_s_14 f_w_400 color_text_3"><?php echo $row['cdate']; ?></td>
    <td class="f_s_14 f_w_400 color_text_3"><?php echo $row['user_id']; ?></td>
    <td class="f_s_14 f_w_400 color_text_3"><?php echo $row['assoc_name']; ?></td>
    <td class="f_s_14 f_w_400 color_text_3"><?php echo $row['descs']; ?></td>
    <td class="f_s_14 f_w_400 color_text_3"><?php
    if ($row['category'] == "1") {
        echo "Staylite";
    }elseif ($row['category'] == "2") {
        echo "Fresher";
    }else {
        echo "Both Staylite & Fresher";
        
    }  
    ?></td>
    <td class="f_s_14 f_w_400 color_text_3">&#8358; <?php echo number_format($row['price']); ?></td>
                                        </tr>
    <?php
    $i++;

}
    ?>
                                        
                                    </tbody>
                                </table>
                                <!-- <a href="#" class="badge_btn_semi mt_30 ml_15">View All</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            
            <?php
        }elseif ($_SESSION['user_type'] == '1' && $_SESSION['category'] == '2') {
            ?>

<div class="col-lg-12">
                    <div class="white_card card_height_100 mb_20 ">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Recently Added Dues</h3>
                                </div>
                                <!-- <div class="header_more_tool">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                          <i class="ti-more-alt"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                          <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                          <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                          <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                          <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                        </div>
                                      </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="white_card_body QA_section">
                            <div class="QA_table ">
                                <!-- table-responsive -->
                                <table class="table lms_table_active2 p-0">
                                    <thead>
                                        <tr>
                                        <th scope="col">S/N</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
include '_include/connect.php';
$email = $_SESSION['email'];
$query = mysqli_query( $con, "SELECT * FROM due WHERE user_id = '$email' ORDER BY id DESC LIMIT 5" );
$i = 1;
while ( $row = mysqli_fetch_array($query) ) {

    ?>
    <tr>
    <td class="f_s_14 f_w_400 color_text_3"><?php echo $i; ?></td>
    <td class="f_s_14 f_w_400 color_text_3"><?php echo $row['cdate']; ?></td>
    <td class="f_s_14 f_w_400 color_text_3"><?php echo $row['descs']; ?></td>
    <td class="f_s_14 f_w_400 color_text_3"><?php
    if ($row['category'] == "1") {
        echo "Staylite";
    }elseif ($row['category'] == "2") {
        echo "Fresher";
    }else {
        echo "Both Staylite & Fresher";
        
    }  
    ?></td>
    <td class="f_s_14 f_w_400 color_text_3">&#8358; <?php echo number_format($row['price']); ?></td>
                                        </tr>
    <?php
    $i++;

}
    ?>
                                        
                                    </tbody>
                                </table>
                                <!-- <a href="#" class="badge_btn_semi mt_30 ml_15">View All</a> -->
                            </div>
                        </div>
                    </div>
                </div>

            <?php
        }else {
            ?>
            <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_20 ">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Available Dues</h3>
                                </div>
                                <!-- <div class="header_more_tool">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                          <i class="ti-more-alt"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                          <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                          <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                          <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                          <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                        </div>
                                      </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="white_card_body QA_section">
                            <div class="QA_table ">
                                <!-- table-responsive -->
                                <table class="table lms_table_active2 p-0">
                                    <thead>
                                        <tr>
                                        <th scope="col">S/N</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
include '_include/connect.php';
$email = $_SESSION['email'];
$query = mysqli_query( $con, "SELECT * FROM due ORDER BY id DESC LIMIT 5" );
$i = 1;
while ( $row = mysqli_fetch_array($query) ) {

    ?>
    <tr>
    <td class="f_s_14 f_w_400 color_text_3"><?php echo $i; ?></td>
    <td class="f_s_14 f_w_400 color_text_3"><?php echo $row['cdate']; ?></td>
    <td class="f_s_14 f_w_400 color_text_3"><?php echo $row['descs']; ?></td>
    <td class="f_s_14 f_w_400 color_text_3"><?php
    if ($row['category'] == "1") {
        echo "Staylite";
    }elseif ($row['category'] == "2") {
        echo "Fresher";
    }else {
        echo "Both Staylite & Fresher";
        
    }  
    ?></td>
    <td class="f_s_14 f_w_400 color_text_3">&#8358; <?php echo number_format($row['price']); ?></td>
                                        </tr>
    <?php
    $i++;

}
    ?>
                                        
                                    </tbody>
                                </table>
                                <!-- <a href="#" class="badge_btn_semi mt_30 ml_15">View All</a> -->
                            </div>
                        </div>
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