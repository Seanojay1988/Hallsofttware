<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pagename; ?></title>
    <!-- <link rel="stylesheet" type="text/css" > -->
    <!-- Add your CSS file(s) here -->

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/style.css">
</head>
<!-- Header section -->
<header>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Add your navigation menu items here -->
        <!-- Brand -->
        <a class="navbar-brand" href="index.php">SOA Hall Booking</a>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="registration.php">Registration</a></li>
                <li class="nav-item"><a class="nav-link" href="booking.php">Book a Hall</a></li>
            </ul>
        </div>
    </nav>
</header>