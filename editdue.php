<?php include "_include/head.php" ?>

<!-- main content part here -->

<!-- sidebar  -->
<?php include "_include/nav.php" ?>
<!--/ sidebar  -->

<?php
include "_include/connect.php";
$id = $_GET['id'];
$query = mysqli_query( $con, "SELECT * FROM due WHERE id = '$id'" );
$row = mysqli_fetch_array($query);

if(isset($_POST['submit'])){

	$assoc_name = mysqli_real_escape_string($con, $_POST['assoc_name']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
	$cdate = mysqli_real_escape_string($con, $_POST['cdate']);
	$desc = mysqli_real_escape_string($con, $_POST['desc']);
	$price = mysqli_real_escape_string($con, $_POST['price']);
	$user_id = mysqli_real_escape_string($con, $_POST['user_id']);
	
	$sql = "UPDATE due SET assoc_name = '$assoc_name', category = '$category', cdate = '$cdate', descs = '$desc', price = '$price', user_id = '$user_id' WHERE id = '$id'";
	$query = mysqli_query($con, $sql);

	if ($query == TRUE) {
		echo "<script>alert('Due updated Successful ✔✔✔'); window.location='viewdues.php'; </script>";
	}else {
		echo "<script>alert('Due Not updated Successful'); </script>";

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
                                    <h6 class="m-0">Edit Due</h6>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">

                            <form method="POST" action="">
                            <div class="mb-3 row">
                                    <label for="inputEmail3" class="form-label col-sm-2 col-form-label">Association Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3"
                                            name="assoc_name" value="<?php echo $row['assoc_name']; ?>" required>
                                            <input type="text" value="bamus3325@gmail.com" class="form-control" id="inputEmail3"
                                            name="user_id" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail3" class="form-label col-sm-2 col-form-label">Category</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name="category" required>
                                            <option value="">--Select Category--</option>
                                            <option value="1">Staylite</option>
                                            <option value="2">Fresher</option>
                                            <option value="3">Both</option>
                                            <select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail3" class="form-label col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="inputEmail3"
                                            name="cdate" value="<?php echo $row['cdate'] ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail3"
                                        class="form-label col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="desc" value="<?php echo $row['descs'] ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail3" class="form-label col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="price" value="<?php echo $row['price'] ?>" class="form-control" required>
                                    </div>
                                </div>


                                <div class=" row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-primary">Update Due</button>
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