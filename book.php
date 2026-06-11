<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... your existing head section ... -->
    <title>Book Now</title>
</head>
<body>

<!-- Your booking form -->
<form action="process_booking.php" method="post">
    <label for="services">Select a Service:</label>
    <select name="services" id="services">
        <!-- Add options dynamically based on services from studio.php -->
        <option value="hair_extension">Hair Extension</option>
        <!-- Add more options for other services -->
    </select>

    <label for="search">Search Services:</label>
    <input type="text" name="search" id="search" placeholder="Search services...">

    <label for="custom_service">Enter Your Own Service:</label>
    <input type="text" name="custom_service" id="custom_service" placeholder="Enter your own service">

    <input type="submit" value="Submit">
</form>

<!-- ... your existing scripts ... -->
</body>
</html>
