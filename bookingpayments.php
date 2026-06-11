<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Payment Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

</head>

<body>

    <div class="container mt-5">
        <h2>Enter Your Phone Number</h2>
        <form>
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phoneNumber" placeholder="Enter your phone number" required>
            </div>
            <input type="hidden" id="mpesaTillNumber" value="YOUR_MPESA_TILL_NUMBER">

            <button type="button" class="btn btn-primary" onclick="sendSTKPush()">Send STK Push</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery (moved to footer) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        function sendSTKPush() {
            // Get the phone number entered by the user
            var phoneNumber = $('#phoneNumber').val();

            // Get the M-Pesa Till number from the hidden field
            var mpesaTillNumber = $('#mpesaTillNumber').val();

            // Perform an AJAX request to your server-side endpoint
            $.ajax({
                url: './mpesatrans/payment.trans.php', // Replace with your actual PHP endpoint
                method: 'POST',
                data: {
                    phoneNumber: phoneNumber,
                    mpesaTillNumber: mpesaTillNumber
                },
                success: function(response) {
                    // Handle the success response from the server
                    alert('STK push sent successfully!');
                },
                error: function(error) {
                    // Handle the error response from the server
                    alert('Error sending STK push. Please try again.');
                }
            });
        }
    </script>

</body>

</html>