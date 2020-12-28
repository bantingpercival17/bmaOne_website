function funLogin() {
    $(".login").submit(function(evt) {
        var code = $('.icode').val();
        if (code) {
            $.get("/login/" + code, function(result) {
                var arr = JSON.parse(result);
                if (arr['return'] == 'true') {
                    location.href = "/inquire";
                } else {

                    $(".icode").addClass("is-invalid")
                    $(".input-group-text").addClass("text-danger")
                    $(".error").text(arr['message']);
                }
                $('.icode').text('')
            });
        } else {
            $(".icode").addClass("is-invalid")
            $(".input-group-text").addClass("text-danger")
            $(".error").text('Please enter you Student Code');
        }

        evt.preventDefault();
    })
}


function registerValidate() {
    $.validator.setDefaults({
        submitHandler: function() {
            var data = $('form').serialize();
            console.log(data)
            $.post('/auth/register', data, function(rst) {
                console.log(rst)
                    /* var data = JSON.parse(rst); */
                if (rst['result']) {
                    console.log('true')
                    location.href = "/inquire/" + rst['code']
                } else {
                    console.log('false')
                }
            })
            alert("Form successful submitted!");
        }
    });
    $('#quickForm').validate({
        rules: {
            input_1: {
                required: true
            },
            input_2: {
                required: true
            },
            input_3: {
                required: true,
                email: true,
            },
            input_4: {
                required: true,
                minlength: 9,
                maxlength: 10,
            },
            password: {
                required: true,
                minlength: 5
            },
            terms: {
                required: true
            },
        },
        messages: {
            input_1: {
                required: "Please enter your firstname"
            },
            input_2: {
                required: "Please enter your lastname"
            },
            input_3: {
                required: "Please enter a email address",
                email: "Please enter a vaild email address"
            },
            terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
}

function inputError(element) {
    if (element[0] == "") {
        $(element[1]).addClass("is-invalid")
        $(element[1] + " .input-group-text").addClass("text-danger")
            /* $(".error").text('Please enter you Student Code'); */
    }
}