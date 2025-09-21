<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        height: 100vh;
        background-image: url('back3.jpg');
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .login-box {
        background-color: rgba(255, 255, 255, 0.9);
        /* Slightly transparent white */
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        width: 300px;
        text-align: center;
    }

    h2 {
        margin-bottom: 20px;
        color: #000000;
    }

    .input-group {
        margin-bottom: 15px;
        text-align: left;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #000;
    }

    input,
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .login-btn {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #5cb85c;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .login-btn:hover {
        background-color: #4cae4c;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        include '_include/connect.php';

        $username = mysqli_real_escape_string($con, $_POST['user']);
        $password = mysqli_real_escape_string($con, $_POST['pass']);
        $category = mysqli_real_escape_string($con, $_POST['category']);
        if ($category == "") {
            echo "<script>alert('Select a Category!!!');</script>";
        } else {
            $sql = "SELECT  * FROM users WHERE username='$username' and password='$password' and category='$category'";
            $query = mysqli_query($con, $sql);

            $dd = mysqli_fetch_array($query);

            if ($row = mysqli_num_rows($query) > 0) {

                session_start();

                $_SESSION['email'] = $dd['email'];
                $_SESSION['category'] = $dd['category'];
                $_SESSION['user_type'] = $dd['user_type'];

                //header(location: dashboard.php);

                echo "<script>alert('login successful'); window.location='dashboard.php'; </script>";
            } else {
                echo "<script> alert('Username and Password not correct')</script>";
            }
        }
    }
    ?>
    <div class="login-container">
        <div class="login-box">
            <h2>Login Now!</h2>
            <form method="POST" action="">
                <div class="input-group">
                    <label for="username">Matric N0/Application No/Username</label>
                    <input type="text" id="username" name="user" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="pass" required>
                </div>
                <div class="input-group">
                    <label for="password">Category</label>
                    <select name="category">
                        <option value="">--Select Category--</option>
                        <option value="0">Admin</option>
                        <option value="1">Student</option>
                        <option value="2">Association</option>
                    </select>
                    <!-- <input type="password" id="password" name="pass"required> -->
                </div>
                <button type="submit" class="login-btn" name="submit">Login</button><br><br>
                or
                <!-- <a href="index.php?page=home" class="login-btn">Home</a> -->
                <a href="register.php">Register to Create Account</a>
            </form>
        </div>
    </div>
</body>

</html>