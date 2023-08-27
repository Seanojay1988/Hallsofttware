<?php
$pagename = "Book Hall";
include 'include/db.php';
include 'include/header.php';
?>


<body>
    <div class="container">
        <h2>Booking</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="hall_id" value="<?php echo $hall_id; ?>">
        <!-- Add booking form fields, such as event date, time, user details, etc. -->
        <div class="form-group">
            <label for="event_date">Event Date:</label>
            <input type="date" id="event_date" name="event_date" required>
        </div>
        <br>
        <div class="form-group">
            <label for="event_time">Event Time:</label>
            <input type="time" id="event_time" name="event_time" required>
        </div>

        <!-- Add more booking form fields as needed -->

        <button style="margin-top: 10px; " type="submit">Book Now</button>
    </form>
    </div>
</body>

<?php include 'include/footer.php'; ?>