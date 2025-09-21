<?php include "_include/head.php" ?>

<!-- main content part here -->
 
 <!-- sidebar  -->
 <?php include "_include/nav.php" ?>
 <!--/ sidebar  -->

 <?php
include "_include/connect.php";
$email = $_SESSION['email'];
$query = mysqli_query( $con, "SELECT * FROM users WHERE email ='$email'" );
$row = mysqli_fetch_array($query);
if(isset($_POST['submit'])){

	//$email = mysqli_real_escape_string($con, $_POST['email']);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
	$lname = mysqli_real_escape_string($con, $_POST['lname']);
	//$category = mysqli_real_escape_string($con, $_POST['category']);
	$username = mysqli_real_escape_string($con, $_POST['username']);
//$password = mysqli_real_escape_string($con, $_POST['password']);
	
	$sql = "UPDATE users SET fname = '$fanme, lname = '$lnmae', username = '$username' WHERE email = '$email'";
	$query = mysqli_query($con, $sql);

	if ($query == TRUE) {
		echo "<script>alert('User Updated Successful ✔✔✔'); window.location='viewusers.php'; </script>";
	}else {
		echo "<script>alert('User Not Updated Successful'); </script>";

	}
}

?>
<section class="main_content dashboard_part large_header_bg">
        <!-- menu  -->
        <?php include "_include/header.php" ?>
        <!--/ menu  -->
        <div class="main_content_iner ">
            <div class="container-fluid p-0 sm_padding_15px">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h6 class="m-0">Edit your Profile</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                
                                <form method="POST" action="">
                                    <!-- <div class="mb-3 row">
                                        <label for="inputEmail3"
                                            class="form-label col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail3"
                                                value="<?php echo $row['email'] ?>" name="email" required>
                                        </div>
                                    </div> -->
                                    <div class="mb-3 row">
                                        <label for="inputEmail3"
                                            class="form-label col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="fname" value="<?php echo $row['fname'] ?>" class="form-control"
                                            required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail3"
                                            class="form-label col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="lname" value="<?php echo $row['lname'] ?>" class="form-control"
                                            required>
                                        </div>
                                    </div>
                                    <!-- <div class="mb-3 row">
                                        <label for="inputEmail3"
                                            class="form-label col-sm-2 col-form-label">Category</label>
                                            
                                        <div class="col-sm-10">
                                        <select class="form-control" name="category" required>
                                        <option value="">--Select Category--</option>    
                                        <option value="1">Student</option>    
                                        <option value="2">Association</option>    
                                            <select>
                                        </div>
                                    </div> -->
                                    <div class="mb-3 row">
                                        <label for="inputEmail3"
                                            class="form-label col-sm-2 col-form-label">Username/Matric N0</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username" value="<?php echo $row['username'] ?>" class="form-control"
                                            required>
                                        </div>
                                    </div>
                                    <!-- <div class="mb-3 row">
                                        <label for="inputEmail3"
                                            class="form-label col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control"
                                            required>
                                        </div>
                                    </div> -->
                                    <div class=" row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer part -->
        <?php include "_include/footer.php" ?>