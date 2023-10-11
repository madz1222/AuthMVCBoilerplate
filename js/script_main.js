$(document).ready(function() {
    var controller_dir = "../controller/";
    
    let datauser = {};

    $('#btn_insert').click(function(event) {
        event.preventDefault(); 
        $('#insert_form').submit();
    });

    $('#insert_form').submit(function(event) {
        event.preventDefault();

        var datauser = {
            name: $("#name").val(),
            month: $("#month").val(),
            year: $("#year").val(),
            minlate: $("#minlate").val(),
            counts: $("#counts").val()

        };

        $.ajax({
            type: "POST",
            url: controller_dir + "controller_main.php",
            dataType: 'json',
            data: {
                'action': 'controller_insert', // Indicate the controller method to call
                'data': JSON.stringify(datauser)
            },
            success: function(response) {
                if (response.success === 'success') {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Hooray! Insert Successful',
                        toast: true,
                        timer: 2500,
                        showConfirmButton: false,
                    });
                    setTimeout(function() {
                        // Reload the page
                        location.reload();
                    }, 3000);
                }
                else if (response.error === 'insert_failed') {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Invalid Token',
                        text: 'Sorry, insert unsuccessful',
                        toast: true,
                    });
    
                    // Add a delay before reloading the page
                    setTimeout(function() {
                        window.location.href = 'main.php'; 
                    }, 2000);
                }
                else if (response.error === 'failed') {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Something went wrong',
                        toast: true,
                    });

                    setTimeout(function() {
                        window.location.href = 'login.php'; 
                    }, 2000);
                }
            }
        });

    });
    
   
    $(document).find('#datatableLate').empty();
    $(document).find('#datatableLate').show();
    $(document).find('#datatableLate').append('<table class="mt-2 table table-light table-hover table-striped table-borderless dataTable no-footer tbllatemaster" style="width:100%; letter-spacing: 1px;"><thead class="table-dark"></thead><tbody class="pointer"></tbody></table><br><br>');
    $(document).find('.tbllatemaster').attr("id", "tbllatemasterfile");

    ajx_tbllatemaster();
   

    function ajx_tbllatemaster(type){
        switch(type){
        case 'draw':
            table.draw();
            break;
    
        case 'clear':
            table.clear().draw();
            break;
    
        default:
            table = $(document).find('#tbllatemasterfile').DataTable({    
    
            searching: true,
            paging: true,
            ordering: true,
            info: false,
            retrieve: true,
            processing: true,
            serverSide: true,
            scrollY: true,  
            scrollX: true,
            scrollCollapse: true,
            language: {
                processing: '<i class="fa fa-spinner fa-spin"></i> Loading...', // Custom loading message or indicator
            },
            ajax: {
                url: controller_dir + "controller_main.php",
                type: 'POST',
                data: {
                    'action': 'controller_fetch', // Indicate the controller method to call
                    'data': JSON.stringify(datauser)
                },
            },  
            columns: [
                { data: 'id', type: 'num' },
                { data: 'name', type: 'string' },
                { data: 'month', type: 'string' },
                { data: 'year', type: 'string' },
                { data: 'minlate', type: 'string' },
                { data: 'counts', type: 'string' },
            ],
            columnDefs: [
                { title   : "EMPLOYEENO",		targets:[0]},
                { title   : "EMPLOYEENAME",		targets:[1]},
                { title   : "MONTH",			targets:[2]},
                { title   : "YEAR",				targets:[3]},
                { title   : "MINLATE",			targets:[4]},
                { title   : "COUNTS",			targets:[5]},
                { visible : false, 				targets:[0]},
            ],  
            // data: [
            //     {
            //         tempno: 1,
            //         name: 'John',
            //         month: 'January',
            //         year: 2023,
            //         minlate: 10,
            //         counts: 5
            //     },
            //     {
            //         tempno: 2,
            //         name: 'Alice',
            //         month: 'February',
            //         year: 2023,
            //         minlate: 5,
            //         counts: 7
            //     },
            //     // Add more data objects as needed
            // ],

            rowCallback: function (row, data, index) {
                $(row).off('click');
                $(row).on('click', function () {
                    $('#temptno').val(data.temptno);
                    if($(row).hasClass('selected')){
                        $(row).removeClass('selected');
                    } else {
                        $(row).siblings().removeClass('selected');
                        $(row).addClass('selected');
                    }
                });
            }
        });
            break;
        }
    }   








    // $.ajax({
    //     type: "POST",
    //     url: controller_dir + "controller_login.php",
    //     dataType: 'json',
    //     data: {
    //         'action': 'controller_login', // Indicate the controller method to call
    //         'data': JSON.stringify(credentials)
    //     },
    //     success: function(response) {
    //         Swal.fire({
    //             toast: true,
    //             position: 'top',
    //             icon: 'success',
    //             title: 'Log-in Successful',
    //             showConfirmButton: false,
    //         });

    //         // Add a delay before reloading the page
    //         setTimeout(function() {
    //             location.reload();
    //         }, 1500);
    //     }
    // });
});




