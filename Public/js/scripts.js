// Empty JS for your own code to be here


$(document).ready(function() {

    // process the form
    $('form').submit(function(event) {

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'username'      : $('input[name="username"]').val(),
            'userpassword'  : $('input[name=userpassword]').val(),
            'requestAPI'    : $("#requestapi").val()
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'process.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode      : true
        })
        // using the done callback
        .done(function(data) {

		    // here we will handle errors and validation messages
		    if ( ! data.success) 
            {
                if (data.errors.username) 
                {
                    $('.result_data').append('<div class="alert alert-danger">' + data.errors.username + '</div>');
                }
                else if (data.errors.userpassword) 
                {
                    $('.result_data').append('<div class="alert alert-danger">Incorrect Password</div>');
                }
                else if (data.errors.requestAPI) 
                {
                    $('.result_data').append('<div class="alert alert-danger">' + data.errors.requestAPI + '</div>');
                }
                else
                {
		            $('.result_data').append('<div class="alert alert-danger">' + data.errors.message + '</div>');      
                } 

		    } 
            else 
            {
		        // Display the product data!
		        $('.result_data').append(data.details);		       
		    }

		});

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});
