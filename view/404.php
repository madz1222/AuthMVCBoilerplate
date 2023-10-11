<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS for the error page -->
    <style>
        body {
        }

        .error-container {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
        }

        .error-message {
            font-size: 1.5rem;
            margin-top: 10px;
        }

        .error-image {
            max-width: 400px;
        }

        .error-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container error-container">
        <p class="error-message">Oops! Page not found.</p>
        <img src="https://img.freepik.com/free-vector/page-found-concept-illustration_114360-1869.jpg?w=826&t=st=1696096638~exp=1696097238~hmac=aeafdf01dfc5f8431d49cc953ccc632ff31ab8f1b23f88637dd79c8ecb676d16" alt="404 Image" class="error-image">
        <p class="error-message">The page you are looking for might have been removed or does not exist.</p>
        <a href="/mvcprac/" class="btn btn-primary error-button">Go to Homepage</a>
    </div>
</body>
</html>
