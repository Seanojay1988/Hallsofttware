<?php
$pagename = "login";
include 'include/db.php';
include 'include/header.php';




$reg_error = "";
$VB_value = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["user_details"]) || empty($_POST["password"])) {
        $reg_error = "All Fields Are required";
       
    }else{
        $password = $_POST["password"];
    }


    if (!filter_var($_POST["user_details"], FILTER_VALIDATE_EMAIL)) {
        //validate email
        $reg_error = "Invalid Logina Details";
    } else {
        $user_details = $_POST["user_details"];
    }

    if(empty($reg_error)){

        $sql = "SELECT * FROM users WHERE email = '$user_details'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            $reg_error = "User does not exist";
        } else {
            
            while($row = mysqli_fetch_assoc($result)) {
                $password_db = $row["password"];
                $pass_check = password_verify($password, $password_db);

                if($pass_check === false){
                    $id = $row["id"];
                    $username = $row["username"];
                    $level = $row['user_level'];
                    $email = $row['email'];

                    session_start();
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    $_SESSION['user_level'] = $level;

                    if($_SESSION['user_level'] == 0){
                        //send them to userpanel
                        header('location: user/index.php');
                    }else if($_SESSION['user_level'] == 1){
                        //send to admin panel

                        header('location: admin/index.php');
                    }
                }else{
                    $reg_error = "The Password Is Wrong";
                }

                
              }



        }


    }

}

?>


<body>
    <div class="container">
        <h2>User Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        
        <div class="alert alert-danger"><?php echo $reg_error; ?></div>
            <div class="form-group">
                <label for="email">Email / Username</label>
                <input type="text" class="form-control" id="user_details" name="user_details" >
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control"  id="password" name="password" required>
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <button type="submit" name="btn" class="btn btn-primary">Register</button>
        </form>
    </div> 
</body>

    <?php include 'include/footer.php' ; ?>