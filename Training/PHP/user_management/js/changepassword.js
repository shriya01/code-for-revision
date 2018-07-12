$(document).ready(function() {
    $('#changepasswordform').validate({
        debug: true,
        rules: {
            oldpwd: {
                required: true
            },
            newpwd: {
                required: true,
                minlength: 8,
                maxlength: 15
            },
            newpwd2: {
                required: true,
                minlength: 8,
                maxlength: 15,
                equalTo: newpwd
            }
        },
        errorClass: "text-danger",
        submitHandler: submitForm
    });

    function submitForm() {
        var data = $("#changepasswordform").serialize();
        console.log(data);
        $.ajax({
            type: 'POST',
            url: 'validation.php',
            data: data,
            dataType: "json",
            beforeSend: function() {
                $("#error").fadeOut();
                $("#btnChangePwd").html('<span class="glyphicon glyphicon-transfer"></span>please wait ...');
            },
            success: function(response) {
                console.log(response);

                if (response == "3") {
                    $("#error").fadeIn(1000, function() {
                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> your password is incorrect!</div>');
                        $("#btnChangePwd").html('Login');
                    });
                } else if (response == "password-changed") {
                    $("#btnChangePwd").html('<img src="images/ajax-loader.png" style="width:30px; height:30px;" />  Changing Password ...');
                    $("#success").html('<div class="alert alert-success">Password Updated Successfully</div>');

                    setTimeout(function() {
                        $('#success').fadeOut('fast');
                    }, 1000);
                } else {
                    console.log('response' + response);
                }
            },
            error: function(xhr) {
                console.log(xhr);
            }
        });
        return false;
    }

});