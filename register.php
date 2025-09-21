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
    background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white */
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

input,select {
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
    <title>Register Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include "_include/connect.php";

if(isset($_POST['submit'])){

	$email = mysqli_real_escape_string($con, $_POST['email']);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
	$lname = mysqli_real_escape_string($con, $_POST['lname']);
	$category = mysqli_real_escape_string($con, $_POST['category']);
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

    $sqll = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($sqll) > 0) {
        echo "<script>alert('Sorry the Email Already Exist!'); </script>";
    }else {
        $sql = "INSERT INTO users(email, fname, lname, category, username, password) VALUES('$email','$fname','$lname','$category','$username','$password')";
	$query = mysqli_query($con, $sql);

	if ($query == TRUE) {
		echo "<script>alert('User Added Successful ✔✔✔'); window.location='index.php'; </script>";
	}else {
		echo "<script>alert('User Not Added Successful'); </script>";

	}
    }
	
	
}

?>
    <div class="login-container">
        <div class="login-box">
            <h2>Register to Create an Account Now!</h2>
            <form method="POST" action="">
                <div class="input-group">
                    <label for="username">Email</label>
                    <input type="text" id="username" name="email" required>
                </div>
                <div class="input-group">
                    <label for="username">First Name</label>
                    <input type="text" id="username" name="fname" required>
                </div>
                <div class="input-group">
                    <label for="username">Last Name</label>
                    <input type="text" id="username" name="lname" required>
                </div>
                <div class="input-group">
                    <label for="username">Matric No/Application No/Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"required>
                </div>
                <div class="input-group">
                    <label for="password">Category</label>
                    <select name="category" required>
                    <option  value="">--Select Category--</option>
                    <option value="">--Select Category--</option>    
                    <option value="1">Student</option>    
                    <option value="2">Association</option> 
                    </select>
                    <!-- <input type="password" id="password" name="pass"required> -->
                </div>
                <button type="submit" name="submit" class="login-btn" name="submit">Sign Up</button><br><br>
                
                <a href="index.php" class="login-btn">Home</a>
            </form>
            
        </div>
    </div>
</body>
</html>
