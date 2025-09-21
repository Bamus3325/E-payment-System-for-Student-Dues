<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="dashboard.php"><img src="img/logo.png" style="height: 60px;" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="">
            <a href="dashboard.php" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/dashboard.svg" alt="">
                </div>
                <span>Dashboard</span>
            </a>
        </li>
        <?php
        if ($_SESSION['user_type'] == '0') {
            ?>
            <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">

                <div class="icon_menu">
                    <img src="img/menu-icon/4.svg" alt="">
                </div>
                <span>Users Management</span>
            </a>
            <ul>
            <li><a href="adduser.php">Add User</a></li>
            <li><a href="viewusers.php">View Users</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">

                <div class="icon_menu">
                    <img src="img/menu-icon/4.svg" alt="">
                </div>
                <span>Dues Management</span>
            </a>
            <ul>
            <li><a href="adddue.php">Add Dues</a></li>
            <li><a href="viewdues.php">View Dues</a></li>
            </ul>
        </li>
            <?php
        }elseif ($_SESSION['user_type'] == '1' && $_SESSION['category'] == '2') {
            ?>
            <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">

                <div class="icon_menu">
                    <img src="img/menu-icon/4.svg" alt="">
                </div>
                <span>Dues Management</span>
            </a>
            <ul>
            <li><a href="adddue.php">Add Dues</a></li>
            <li><a href="viewdues.php">View Dues</a></li>
            </ul>
        </li>

            <?php
        }
        ?>
        
        <!-- <li class="">
            <a href="Board.html" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/5.svg" alt="">
                </div>
                <span>Available Receipts</span>
            </a>
        </li> -->
        
        <?php
        if ($_SESSION['user_type'] == '1' && $_SESSION['category'] == '1') {
            ?>
            <li class="">
            <a href="box.php" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/14.svg" alt="">
                </div>
                <span>Available Dues</span>
            </a>
        </li>
            <?php
        }
        ?>
        <li class="">
            <a href="invoice.php" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/6.svg" alt="">
                </div>
                <span>Invoice</span>
            </a>
        </li>
        <li class="">
            <a href="payment.php" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/14.svg" alt="">
                </div>
                <span>Payment History</span>
            </a>
        </li>
        <li class="">
            <a href="profilebox.php" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/5.svg" alt="">
                </div>
                <span>Settings</span>
            </a>
        </li>
        <li class="">
            <a href="logout.php" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/5.svg" alt="">
                </div>
                <span>Logout</span>
            </a>
        </li>


    </ul>
</nav>