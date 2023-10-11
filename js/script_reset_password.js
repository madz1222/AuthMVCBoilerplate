$(document).ready(function() {
    var controller_dir = "../controller/";

    var isAJAXInProgress = false; // Flag to track whether an AJAX request is in progress

    $("#reset_password_form").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Check if an AJAX request is already in progress
        if (isAJAXInProgress) {
            return; // Do nothing if an AJAX request is already running
        }

        // Get user inputs
        var credentials = {
            email: $("#email").val(),
        };

        // Set the flag to true to indicate that an AJAX request is in progress
        isAJAXInProgress = true;

        // Send AJAX request to the controller
        $.ajax({
            type: "POST",
            url: controller_dir + "controller_reset_password.php",
            dataType: 'json',
            data: {
                'action': 'controller_reset_password', // Indicate the controller method to call
                'data': JSON.stringify(credentials)
            },
            success: function(response) {
                // Reset the flag to false when the AJAX request completes
                isAJAXInProgress = false;

                if (response.success === 'success') {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Email Sent',
                        text: 'An email with instructions on how to reset your password has been sent to your registered email address. Please check your inbox and follow the provided instructions.',
                        showConfirmButton: 'Great!',
                    });

                    // Add a delay before reloading the page
                    setTimeout(function() {
                        window.location.href = 'login.php'; 
                    }, 3000);
                }
                else if (response.error === 'no_email') {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Email Sent',
                        text: 'An email with instructions on how to reset your password has been sent to your registered email address. Please check your inbox and follow the provided instructions.',
                        showConfirmButton: 'Great!',
                    });

                    // Add a delay before reloading the page
                    setTimeout(function() {
                        window.location.href = 'login.php'; 
                    }, 10000);
                }
                else if (response.error === 'email_error') {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Email Sent',
                        text: 'An email with instructions on how to reset your password has been sent to your registered email address. Please check your inbox and follow the provided instructions.',
                        showConfirmButton: 'Great!',
                    });

                    // Add a delay before reloading the page
                    setTimeout(function() {
                        window.location.href = 'login.php'; 
                    }, 10000);
                }
            }
        });
    });

});
