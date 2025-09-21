<?php include "_include/head.php" ?>

<!-- main content part here -->

<!-- sidebar  -->
<?php include "_include/nav.php" ?>
<!--/ sidebar  -->

<?php
$id = $_GET['id'];
include "_include/connect.php";
$qry = mysqli_query($con, "SELECT * FROM due WHERE id = '$id'");
$fet = mysqli_fetch_array($qry);

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
                                    <h6 class="m-0">Pay For Due</h6>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">

                            <form method="POST" action="">
                                <div class="mb-3 row">
                                    <label for="inputEmail3" class="form-label col-sm-2 col-form-label">Association
                                        Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" name="assoc_name"
                                            value="<?php echo $fet['assoc_name']; ?>" readonly>
                                        <input type="hidden" id="due_id" value="<?php echo $fet['id']; ?>"
                                            class="form-control" name="due_id" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail3" class="form-label col-sm-2 col-form-label">Category</label>

                                    <div class="col-sm-10">
                                        <input type="text" value="<?php
                                            if ($fet['category'] == "1") {
                                                echo "Staylite";
                                            }elseif ($fet['category'] == "2") {
                                                echo "Fresher";
                                            }else {
                                                echo "Both Fresher and Staylite";
                                                
                                            } 
                                            ?>" class="form-control" id="inputEmail3" name="category" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail3" class="form-label col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo $fet['cdate']; ?>" class="form-control"
                                            id="inputEmail3" name="cdate" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail3"
                                        class="form-label col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo $fet['descs']; ?>" name="desc"
                                            class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail3" class="form-label col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="price" id="price"
                                            value="<?php echo $fet['price']; ?>" class="form-control" readonly>
                                        <input type="text" name="price"
                                            value="&#8358; <?php echo number_format($fet['price']); ?>"
                                            class="form-control" readonly>
                                    </div>
                                </div>


                                <div class=" row">
                                    <div class="col-sm-4">
                                        <script src="https://js.paystack.co/v1/inline.js"></script>
                                        <button type="submit" onclick="payWithPaystack(event);"
                                            class="btn btn-success">Make Payment</button>
                                        <!-- <button type="submit" onclick="payWithPaystack();" class="btn btn-success">Make Payment</button> -->

                                    </div>
                                    <div class="col-sm-6">
                                        <a href="box.php" class="btn btn-primary">Back</a>
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
    <script>
    function payWithPaystack(event) {
        // Prevent form submission
        event.preventDefault();

        // Get price and due_id from the page
        var price = document.getElementById("price").value;
        var due_id = document.getElementById("due_id").value;

        // Ensure that the price and due_id are not empty
        if (!price || !due_id) {
            alert("Price or Due ID is missing");
            return;
        }

        var handler = PaystackPop.setup({
            key: 'pk_test_b04fbb7505efdf5918fcc2e3ff69c3614feb4503', // Change to your live key when ready

            email: '<?php echo $_SESSION['email']; ?>',
            amount: price * 100, // Convert the amount to kobo (since Paystack uses kobo, not naira)
            currency: "NGN",
            ref: 'MY' + Math.floor((Math.random() * 1000000000) + 1), // Unique reference

            callback: function(response) {
                let message = 'Payment Completed! ref is ' + response.reference;
                window.location.href = 'verify_transaction.php?reference=' + response.reference +
                    '&price=' + price + '&due_id=' + due_id;
            },
            onClose: function() {
                alert('Payment window closed');
            }
        });

        handler.openIframe(); // Open the Paystack modal window
    }
    </script>