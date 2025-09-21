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
                                <h3 class="f_s_30 f_w_700 text_white">Invoice</h3>
                                <ol class="breadcrumb page_bradcam mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Due </a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">invoice</li>
                                </ol>
                            </div>
                            <a href="javascript:void(0);" class="white_btn3" onclick="printInvoice()">Print</a>
                        </div>
                    </div>
                </div>
                <?php
                include '_include/connect.php';
                $id = $_GET['id'];
                $query = mysqli_query( $con, "SELECT * FROM payment WHERE due_id = '$id'" );
                $row = mysqli_fetch_array($query);
                ?>
                <div class="row ">
                    <div class="col-12 QA_section">
                        <div class="card QA_table ">
                            <div class="card-header">
                                Invoice
                                <strong><?php echo $row['cdate']; ?></strong>
                                <span class="float-end"> <strong>Status:</strong> Success</span>

                            </div>
                            <?php
                include '_include/connect.php';
                $ids = $row['due_id'];
                $que = mysqli_query( $con, "SELECT * FROM due WHERE id = '$ids'" );
                $rw = mysqli_fetch_array($que);
                ?>
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <h6 class="mb-3">From:</h6>
                                        <div>
                                            <strong>Association</strong>
                                        </div>
                                        <div>Name: <b><?php echo $rw['assoc_name']; ?></b></div>
                                        <div>Category: <b><?php
                                        if ($rw['category'] == "1") {
                                            echo "Staylite";
                                        }elseif ($rw['category'] == "2") {
                                            echo "Fresher";
                                        }else {
                                            echo "Both Staylite and Fresher";
                                            
                                        }  
                                        ?></b></div>
                                        <div>Amount: <b>&#8358;<?php echo number_format($rw['price']); ?></b></div>
                                        <div>Email: <b><?php echo $rw['user_id']; ?></b></div>
                                    </div>

                                    <div class="col-sm-6">
                                        <h6 class="mb-3">To:</h6>
                                        <div>
                                            <strong>Student</strong>
                                        </div>
                                        <div>Full Name:<b><?php
                                        $em = $row['email'];
                                        $quer = mysqli_query( $con, "SELECT * FROM users WHERE email = '$em'" );
                                        $rwr = mysqli_fetch_array($quer);
                                        echo $rwr['lname']." ".$rwr['fname'];
                                        ?></b></div>
                                        <div>Email:<b><?php echo $row['email']; ?></b>
                                        </div>
                                        
                                    </div>



                                </div>

                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th>Association Name</th>
                                            <th>Category</th>
                                                <th>Description</th>
                                                <th class="center">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
include '_include/connect.php';
$quer = mysqli_query( $con, "SELECT * FROM due WHERE id = '$id'" );
while ( $rr = mysqli_fetch_array($quer) ) {
    ?>
    <tr>
                                                <td class="center"><?php echo $rr['assoc_name']; ?></td>
                                                <td class="left strong"><?php
                                                 if ($rr['category'] == "1") {
                                                    echo "Staylite";
                                                }elseif ($rr['category'] == "2") {
                                                    echo "Fresher";
                                                }else {
                                                    echo "Both Staylite and Fresher";
                                                    
                                                } 
                                                ?></td>
                                                <td class="left"><?php echo $rr['descs']; ?></td>

                                                <td class="right">&#8358; <?php echo number_format($rr['price']); ?></td>
                                            </tr>
    <?php

}
    ?>

                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-lg-4 col-sm-5">

                                    </div>

                                    <div class="col-lg-4 col-sm-5 ms-auto QA_section">
                                        <table class="table table-clear QA_table">
                                            <tbody>
                                                <tr>
                                                    <td class="left">
                                                        <strong>Subtotal</strong>
                                                    </td>
                                                    <td class="right">$8.497,00</td>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong>Discount (20%)</strong>
                                                    </td>
                                                    <td class="right">$1,699,40</td>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong>VAT (10%)</strong>
                                                    </td>
                                                    <td class="right">$679,76</td>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong>Total</strong>
                                                    </td>
                                                    <td class="right">
                                                        <strong>$7.477,36</strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer part -->
        <?php include "_include/footer.php" ?>
        <script>
function printInvoice() {
    // Create a new window for the print layout
    var printWindow = window.open('', '', 'height=800, width=800');

    // Get the content of the invoice (table)
    var contentToPrint = document.querySelector('.QA_section').innerHTML;

    // Write the content into the new window
    printWindow.document.write('<html><head><title>Invoice</title>');

    // Add styles to make sure the table looks good when printed
    printWindow.document.write('<style>');
    printWindow.document.write('body { font-family: Arial, sans-serif; margin: 20px; }');
    printWindow.document.write('table { width: 100%; border-collapse: collapse; }');
    printWindow.document.write('table, th, td { border: 1px solid black; }');
    printWindow.document.write('th, td { padding: 12px; text-align: left; }');
    printWindow.document.write('th { background-color: #f2f2f2; }');
    printWindow.document.write('tr:nth-child(even) { background-color: #f9f9f9; }');
    printWindow.document.write('td.right { text-align: right; }');
    printWindow.document.write('td.center { text-align: center; }');
    printWindow.document.write('h3 { text-align: center; font-size: 24px; margin-bottom: 20px; }');
    printWindow.document.write('</style>');

    // Insert the content into the print window
    printWindow.document.write('</head><body>');
    printWindow.document.write('<h3>Invoice</h3>');
    printWindow.document.write(contentToPrint);
    printWindow.document.write('</body></html>');

    // Close the document and initiate the print dialog
    printWindow.document.close();
    printWindow.print();
}
</script>
