$(document).ready(function() {
    var controller_dir = "../controller/";

    $("#login_form").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get user inputs
        var credentials = {
            email: $("#email").val(),
            password: $("#password").val()
        };

        // Send AJAX request to the controller
        $.ajax({
            type: "POST",
            url: controller_dir + "controller_login.php",
            dataType: 'json',
            data: {
                'action': 'controller_login', // Indicate the controller method to call
                'data': JSON.stringify(credentials)
            },
            success: function(response) {
                if (response.success === 'success') {
                    Swal.fire({
                        toast: true,
                        position: 'center',
                        icon: 'success',
                        title: 'Log in Successful',
                        showConfirmButton: false,
                    });
    
                    // Add a delay before reloading the page
                    setTimeout(function() {
                        window.location.href = 'login.php'; 
                    }, 2000);
                    
                }
                else if (response.error === 'login_failed') {
                        Swal.fire({
                            toast: true,
                            position: 'center',
                            icon: 'error',
                            title: 'Wrong Credentials',
                            showConfirmButton: false,
                            timer: 2000,
                        });
                }
            }
        });
    });
});
