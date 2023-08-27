<?php
$pagename = "Registration";
include 'include/db.php';
include 'include/header.php';
$reg_error = "";
$VB_value = '';

$email = $pass = $username = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = ($_POST['password']) ? $_POST['password'] : '';



    ($_POST['password']) ? $_POST['password'] : '';

    if (empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        $reg_error = "All Fields Are required";
    }


    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        //validate email
        $reg_error = "Invalid email format";
    } else {
        $email = $_POST["email"];

        $sql = "SELECT * FROM users WHERE email = '$email'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $reg_error = "Email Already Exist";
        } else {
            $reg_error = "";
        }
    }


    //validate username
    if (!preg_match("/^[a-zA-Z]*$/", $_POST["username"])) {

        $reg_error = "Invalid Username format";
    } else {
        $username = $_POST["username"];

        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $reg_error = "username Already Exist";
        } else {
            $reg_error = "";
        }
    }

    //validate password
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $_POST["password"])) {

        $reg_error = "password invalid";
    } else {
        $pass = $_POST["password"];
        $password = password_hash($pass, PASSWORD_DEFAULT);

    }
    if (empty($reg_error)) {
        $sql = "INSERT INTO users (`username`, `email`, `password`) VALUES ('$username','$email','$password')";

        if (mysqli_query($conn, $sql)) {
            header('location: login.php');
          } else {
            $reg_error = 'An error occured, try again later';
          }
    }
}


?>


<body>
    <div class="container">
        <h2>User Registration</h2>
        <?php echo $reg_error; 

        
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="password" value="<?php echo $pass; ?>" name="password">
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-primary" name='registration-btn'>Register</button>
        </form>
    </div>
</body>

<?php include 'include/footer.php'; ?>