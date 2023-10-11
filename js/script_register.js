$(document).ready(function() {
    var controller_dir = "../controller/";

    $("#register_form").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get user inputs
        var credentials = {
            email: $("#email").val(),
            password: $("#password").val()
        };

        // Send AJAX request to the controller
        $.ajax({
            type: "POST",
            url: controller_dir + "controller_register.php",
            dataType: 'json',
            data: {
                'action': 'controller_register', // Indicate the controller method to call
                'data': JSON.stringify(credentials)
            },
            success: function(response) {
                if (response.success === 'success') {
                    Swal.fire({
                        toast: true,
                        position: 'center',
                        icon: 'success',
                        title: 'Registration Successful',
                        showConfirmButton: false,
                    });
    
                    // Add a delay before reloading the page
                    setTimeout(function() {
                        window.location.href = 'login.php'; 
                    }, 2000);
                    
                }
                else if (response.error === 'email_registered') {
                        Swal.fire({
                            toast: true,
                            position: 'center',
                            icon: 'error',
                            title: 'Email is already registered',
                            showConfirmButton: false,
                            timer: 2000,
                        });
                }
                else if (response.error === 'password_short') {
                    Swal.fire({
                        toast: true,
                        position: 'center',
                        icon: 'error',
                        title: 'Password is too short',
                        text: 'Use at least 7 characters',
                        showConfirmButton: false,
                        timer: 2000,
                    });        
                } else {
                    // Handle other cases or errors
                }
            }
            
        });
    });
});
