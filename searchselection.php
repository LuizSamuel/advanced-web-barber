<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">

    <style>
        /* Add your custom styles here */
    </style>
</head>

<body>

    <div class="container mt-5">
        <select id="select_page" style="width: 200px;" class="form-select">
            <option value="" data-cost="0" data-details="">Book a Service...</option>
            <option value="alpha" data-image="toner.jpg" data-cost="10" data-details=
            "Details for alpha service">alpha</option>
            <option value="beta"  data-image="makeup.jpg" data-cost="12" data-details=
            "Details for beta service">beta</option>
            <option value="theta" data-image="salon.jpg" data-cost="13" data-details=
            "Details for theta service">theta</option>
            <option value="omega" data-image="christmas.jpg" data-cost="21" data-details=
            "Details for omega service">omega</option>
        </select>

        <div id="service-details" style="display: none; padding-top: 5%; padding-left: 3%;">
            <div class="card" style="width: 14rem;">
                <img id="service-image" class="card-img-top" alt="Service Image">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <!-- Display cost and details here -->
                    Cost: $<span id="cost">0</span><br>
                    Details: <span id="details"></span>
            <p style="padding-top: 5%; padding-left: 3%; justify-content: space-between;">
                <a href="searchselection.php" class="btn btn-primary" style="margin-right: 15px;">Back</a>
                <a href="bookingpayments.php" class="btn btn-primary" style="margin-left: 15px;">Continue</a>
            </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery (moved to footer) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Select2 JS (moved to footer) -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
    function openbookingpayments() {
            // Assuming you have a separate HTML page for entering phone number, e.g., "phonenumber.html"

            // Make an AJAX request to the server-side PHP script
            $.ajax({
                type: 'POST',
                url: 'payment.php', // Update with the correct path to your PHP script
                success: function (response) {
                    // Handle the response from the server
                    alert(response);
                },
                error: function (error) {
                    // Handle any errors
                    alert('Error: ' + error.statusText);
                }
            });
        }

    $(document).ready(function () {
            // Change select boxes to selectize mode to be searchable
            $("select").select2();

            // Add change event listener to the select element
            $("#select_page").change(function () {
                // Get the selected option
                var selectedOption = $(this).find(":selected");

                // Update the cost and details based on the selected option
                var cost = selectedOption.data("cost");
                var details = selectedOption.data("details");
                var imagePath = selectedOption.data("image");

                // Display the updated cost and details
                $("#service-image").attr("src", imagePath);
                $("#cost").text(cost); // Update the cost text
                $("#details").text(details); // Update the details text

                // Show the service details
                $("#service-details").show();
            });
        });
    </script>

</body>

</html>