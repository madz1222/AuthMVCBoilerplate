$(document).ready(function() {
    var controller_dir = "../controller/";

    var data = {
        token: $("#token").val()
    };

    $.ajax({
        type: "POST",
        url: controller_dir + "controller_new_password.php",
        dataType: 'json',
        data: {
            'action': 'controller_token_checker', // Indicate the controller method to call
            'data': JSON.stringify(data)
        },
        success: function(response) {
            if (response.success === 'valid') {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Hooray!',
                    text: 'You can now reset your password!',
                    showConfirmButton: 'Great!',
                });
            }
            else if (response.error === 'invalid') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Invalid Token',
                    text: 'Sorry, invalid token. Please request a new email link reset password.',
                    showConfirmButton: false,
                });

                // Add a delay before reloading the page
                setTimeout(function() {
                    window.location.href = 'login.php'; 
                }, 500000);
            }
            else if (response.error === 'expired') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Expired Token',
                    text: 'Sorry, expired token. Please request a new email link reset password.',
                    showConfirmButton: false,
                });

                // Add a delay before reloading the page
                setTimeout(function() {
                    window.location.href = 'login.php'; 
                }, 5000);
            }
            else if (response.error === 'reset_password_error') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Something went wrong1',
                    showConfirmButton: false,
                });

            }
        }
    });

    $("#new_password_form").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        var data = {
            token: $("#token").val(),
            password: $("#password").val()
        };

        $.ajax({
            type: "POST",
            url: controller_dir + "controller_new_password.php",
            dataType: 'json',
            data: {
                'action': 'controller_new_password',
                'data': JSON.stringify(data)
            },
            success: function(response) {
                if (response.success === 'success') {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Hooray!',
                        text: 'Password update success!',
                        showConfirmButton: 'Great!',
                    });
    
                    // Add a delay before reloading the page
                    setTimeout(function() {
                        window.location.href = 'login.php'; 
                    }, 3000);
                }
                else if (response.error === 'invalid') {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Invalid Token',
                        text: 'Sorry, invalid token. Please request a new email link reset password.',
                        showConfirmButton: false,
                    });
    
                    // Add a delay before reloading the page
                    // setTimeout(function() {
                    //     window.location.href = 'login.php'; 
                    // }, 5000);
                }
                else if (response.error === 'expired') {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Expired Token',
                        text: 'Sorry, expired token. Please request a new email link reset password.',
                        showConfirmButton: false,
                    });
    
                    // Add a delay before reloading the page
                    // setTimeout(function() {
                    //     window.location.href = 'login.php'; 
                    // }, 5000);
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
                }
                else if (response.error === 'reset_password_error') {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Something went wrong2',
                        showConfirmButton: false,
                    });
    
                }
            }
        });
    });


});
