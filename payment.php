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
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Payment History</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">

                                <h6 class="card-subtitle mb_20">List of Payments made</h6>
                                <div class="table-responsive m-b-30">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">S/N</th>
                                                <th scope="col">Date</th>
                                                <?php
                                                if ($_SESSION['user_type'] == '0') {
                                                    ?>
                                                    <th scope="col">Student_id</th>
                                                    <th scope="col">Association_id</th>
                                                    <?php

                                                }elseif ($_SESSION['user_type'] == '1' && $_SESSION['category'] == '2') {
                                                    ?>
                                                    <th scope="col">Student_id</th>
                                                    <?php

                                                } 
                                                ?>
                                                
                                                <th scope="col">Description</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Channel</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
            if ($_SESSION['user_type'] == '0') {
            ?>
            <?php
include '_include/connect.php';
$email = $_SESSION['email'];
$query = mysqli_query( $con, "SELECT * FROM payment" );
$i = 1;
while ( $row = mysqli_fetch_array($query) ) {
    $dueid = $row['due_id'];
    $due = mysqli_query($con, "SELECT * FROM due WHERE id = '$dueid'");
    $rw = mysqli_fetch_assoc($due);
    ?>
    <tr>
                                                <th scope="row"><?php echo $i; ?></th>
                                                <td><?php echo $row['cdate']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $rw['user_id']; ?></td>
                                                <td><?php echo $rw['descs']; ?></td>
                                                <td>&#8358; <?php echo number_format($row['amount']); ?></td>
                                                <td><?php echo $row['channel']; ?></td>
                                                
                                                
                                            </tr>
    <?php
    $i++;
}
?>
            <?php
        }elseif ($_SESSION['user_type'] == '1' && $_SESSION['category'] == '2') {
            ?>
            <?php
include '_include/connect.php';
$email = $_SESSION['email'];
$query = "
            SELECT p.email, p.*, d.assoc_name, d.descs, d.category, d.price 
            FROM payment p
            INNER JOIN due d ON p.due_id = d.id 
            WHERE d.user_id = '$email'
        ";

        $result = mysqli_query($con, $query);
$i = 1;
while ( $row = mysqli_fetch_assoc($result) ) {
    ?>
    <tr>
                                                <th scope="row"><?php echo $i; ?></th>
                                                <td><?php echo $row['cdate']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['descs']; ?></td>
                                                <td>&#8358; <?php echo number_format($row['amount']); ?></td>
                                                <td><?php echo $row['channel']; ?></td>
                                                
                                                
                                            </tr>
    <?php
    $i++;
}
?>

            <?php
        }else {
            ?>
            <?php
include '_include/connect.php';
$email = $_SESSION['email'];
$query = mysqli_query( $con, "SELECT * FROM payment WHERE email ='$email'" );
$i = 1;
while ( $row = mysqli_fetch_array($query) ) {
    $dueid = $row['due_id'];
    $due = mysqli_query($con, "SELECT * FROM due WHERE id = '$dueid'");
    $rw = mysqli_fetch_assoc($due);
    ?>
    <tr>
                                                <th scope="row"><?php echo $i; ?></th>
                                                <td><?php echo $row['cdate']; ?></td>
                                                <td><?php echo $rw['descs']; ?></td>
                                                <td>&#8358; <?php echo number_format($row['amount']); ?></td>
                                                <td><?php echo $row['channel']; ?></td>
                                                
                                                
                                            </tr>
    <?php
    $i++;
}
?>
            <?php
        }
        ?>


                                        
                                            
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer part -->
        <?php include "_include/footer.php" ?>
        