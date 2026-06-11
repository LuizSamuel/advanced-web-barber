
<?php require('./phpincludes/profile.inc.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Icon Upload</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>

<body>
    <h1>Upload Your Profile Icon</h1>
    <form id="uploadForm" enctype="multipart/form-data" method="POST" action="./phpincludes/profile.inc.php">
        <input type="file" name="profileIcon" accept="image/*" required>
        <button type="submit">Upload</button>
    </form>
    <div id="result"></div>

    <script>
        // Optional: Handle form submission with JavaScript
        document.getElementById('uploadForm').onsubmit = async (e) => {
            e.preventDefault(); // Prevent the default form submission

            const formData = new FormData(e.target);
            const response = await fetch('./phpincludes/profile.inc.php', {
                method: 'POST',
                body: formData,
            });

            const result = await response.text();
            document.getElementById('result').innerText = result; // Display response
        };
    </script>
</body>

</html>