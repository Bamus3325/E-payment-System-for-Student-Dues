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
                                        <h3 class="m-0">Registered Users</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">

                                <h6 class="card-subtitle mb_20">List of Registerd Users</h6>
                                <div class="table-responsive m-b-30">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">S/N</th>
                                                <th scope="col">FULL Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
include '_include/connect.php';
$query = mysqli_query( $con, 'SELECT * FROM users' );
$i = 1;
while ( $row = mysqli_fetch_array($query) ) {
    ?>
    <tr>
                                                <th scope="row"><?php echo $i; ?></th>
                                                <td><?php echo $row['fname'].' '.$row['lname']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php
                                                if ($row['category'] == "1") {
                                                    echo "Student";
                                                }elseif ($row['category'] == "2") {
                                                    echo "Association";
                                                }else {
                                                    echo "Admin";
                                                    
                                                } 
                                                
                                                
                                                ?></td>
                                                <td>
                                    <a onclick="return confirm('Are You Sure You want to Edit This user');" href='edituser.php?id=<?php echo $row['id']; ?>'
                                        type='button' class='btn btn-primary'>
                                        Edit
                                    </a>
                                    <a onclick="return confirm('Are You Sure You want to Delete This user');" href='deleteuser.php?id=<?php echo $row['id']; ?>'
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