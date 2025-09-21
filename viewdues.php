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
                                        <h3 class="m-0">Registered Dues</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">

                                <h6 class="card-subtitle mb_20">List of Registerd Dues</h6>
                                <div class="table-responsive m-b-30">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">S/N</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Association Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
include '_include/connect.php';
if ($_SESSION['user_type'] == '0') {
    $query = mysqli_query( $con, 'SELECT * FROM due' );
}else{
    include '_include/connect.php';
$email = $_SESSION['email'];
    $query = mysqli_query( $con, "SELECT * FROM due WHERE user_id = '$email'" );
}
$i = 1;
while ( $row = mysqli_fetch_array($query) ) {
    ?>
    <tr>
                                                <th scope="row"><?php echo $i; ?></th>
                                                <td><?php echo $row['cdate'];?></td>
                                                <td><?php echo $row['assoc_name']; ?></td>
                                                <td><?php echo $row['descs']; ?></td>
                                                <td><?php
                                                if ($row['category'] == "1") {
                                                    echo "Staylite";
                                                }elseif ($row['category'] == "2") {
                                                    echo "Fresher";
                                                }else {
                                                    echo "Both";
                                                    
                                                } 
                                                
                                                
                                                ?></td>
                                                <td>&#8358; <?php echo number_format($row['price']); ?></td>
                                                <td>
                                    <a onclick="return confirm('Are You Sure You want to Edit This Due');" href='editdue.php?id=<?php echo $row['id']; ?>'
                                        type='button' class='btn btn-primary'>
                                        Edit
                                    </a>
                                    <a onclick="return confirm('Are You Sure You want to Delete This Due');" href='deletedue.php?id=<?php echo $row['id']; ?>'
                                        type='button' class='btn btn-danger'>
                                        Delete
                                    </a>
                                </td>
                                            </tr>
    <?php
    $i++;
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