$(document).ready(function() {
    student_info()
    student_application()
    student_requirements()
    student_payment('#student-payment')
    fetchRegions()
    showTab(currentTab)
    applicationFormLayout()
    bsCustomFileInput.init();


})

var currentTab = 0; // Current tab is set to be the first tab (0)
var titleBar = ["Student Information", "Application Form", "Requirement Forms", "Payment", "Finish"]

function showTab(index) {
    $("#header").text(titleBar[index].toUpperCase())
    var x = document.getElementsByClassName("tab");
    x[index].style.display = "block";
    $(".step-" + index).addClass("step-active")

}

function nextForm() {
    $(".step-" + currentTab).removeClass("step-active")
    $(".step-" + currentTab).addClass("step-finish")
    var x = document.getElementsByClassName("tab");
    x[currentTab].style.display = "none";
    currentTab += 1

    showTab(currentTab)
}

$(".btn-back").click(function(evt) {
    $(".step-" + currentTab).removeClass("step-active")
    var x = document.getElementsByClassName("tab");
    x[currentTab].style.display = "none";
    currentTab -= 1
    $(".step-" + currentTab).removeClass("step-finish")
    $(".step-" + currentTab).addClass("step-active")
    showTab(currentTab)
    evt.preventDefault()
})

// For Student Information Step Validation
function student_info() {
    $.validator.setDefaults({
        submitHandler: function() {
            var data = $('form').serialize();
            $.post('/client/save/info', data, function(rst) {
                var data = JSON.parse(rst);
                if (data) {
                    toastr.success(data.message)
                    nextForm()
                }
            })
        }
    });
    $('#student-information').validate({
        rules: {
            input_1: "required",
            input_2: "required",
            input_5: "required",
            input_6: "required",
            input_7: "required",
            input_8: "required",
            input_9: "required",
            a_input_1: "required",
            a_input_2: {
                required: true,
            },
            a_input_3: {
                required: true,
            },
            a_input_4: {
                required: true,
            },
            a_input_5: {
                required: true,
            },
            a_input_6: {
                required: true,
            },
            f_input_1: {
                required: true,
            },
            f_input_2: {
                required: true,
            },
            m_input_1: {
                required: true,
            },
            m_input_2: {
                required: true,
            },
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
// For Student Enrollment Step Validation
function student_application() {
    $.validator.setDefaults({
        submitHandler: function() {
            var data = $('#student-application').serialize();
            $.post('/client/save/application', data, function(rst) {
                var data = JSON.parse(rst);
                if (data) {
                    toastr.success(data.message)
                    nextForm()
                }
            })
        }
    });
    $('#student-application').validate({
        rules: {
            "course": "required",
            "year_level": "required",
            "average": "required",
            "lrn": "required",
            "schoolname[]": "required",
            "address[]": "required",
            "year[]": "required"


        },
        messages: {
            "year_level": {
                min: "This field is required"
            },
            "course": {
                min: "This field is required"
            },
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
// For Student Requirements Step Validation
function student_requirements() {
    $("#student-requirements").submit(function(evt) {
        var form = this;
        $(this).validate({
            submitHandler: function() {
                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "/client/save/requirements",
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(rst) {
                        var data = JSON.parse(rst);
                        if (data) {
                            toastr.success(data.message)
                            nextForm()
                        }
                        console.info(rst)
                    },
                    error: function(e) {

                        toastr.error(e)
                    }
                })
            },
            rules: {
                "file_attach_0": { required: true, extension: "png|jpeg|jpg" },
                "file_attach_1": "required",
                "file_attach_2": "required",
                "file_attach_3": "required",
                "file_attach_4": "required",
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
        })

        evt.preventDefault()
    })

}
// For Payment Step Validation
function student_payment(form) {
    $(form).submit(function(evt) {
        var form = this;
        $(this).validate({
            submitHandler: function() {
                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "/client/save/requirements",
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(rst) {
                        var data = JSON.parse(rst);
                        if (data.result > 0) {
                            toastr.success(data.message)
                            nextForm()
                        } else {
                            toastr.error(data.message)
                        }
                        console.info(data.message)
                    },
                    error: function(e) {
                        toastr.error(e)
                    }
                })
            },
            rules: {
                "file_attach_0": "required",
                "file_attach_2": "required",
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
        })

        evt.preventDefault()
    })
}
// For Exam
function applicationFormLayout() {
    var check = $('#input-dept').find(':selected').data('value')
    if (check > 0) {
        $('.btn-next').prop('disabled', false)
    } else {
        $('.btn-next').prop('disabled', true)
    }

    $("#input-dept").change(function(evt) {
        var data = $(this).find(':selected').data('value')
        var widget = "#form-application"
        $('.btn-next').prop('disabled', false)
        $(widget).empty()
        var layout
        if (data == 1)
            layout = '<h2 for="">SENIOR HIGH</h2>' +
            '<input type="hidden" name="dept" value="shs">' +
            '<div class="row"><div class="form-group col-md col-sm-12"><label for="">STRAND</label><select name="course" class="form-control"><option value="">Select Strand</option><option value="3">PBM Specialization</option></select></div><div class="form-group col-md col-sm-12"><label for="">Year Level</label><select name="year_level" class="form-control"><option value="" selected>Select Year Level</option><option value="11">Grade 11</option></select></div></div>' +
            '<h4 for="">EDUCATIONAL BACKGROUND</h4>' +
            '<div class="row"><div class="form-group col-md col-sm-12"><label for="">LRN</label><input type="text" class="form-control" placeholder="Enter your Lrn" name="lrn"></div><div class="form-group col-md col-sm-12"><label for="">General Average</label><input type="text" class="form-control" placeholder="Junior high General Average"name="avg_grade"></div></div>' +
            '<label for="">Elementary</label>' +
            '<div class="row"><div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="Name of School" name="schoolname[]"></div><div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="School' + "'" + 's Complete Address" name="address[]"></div><div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="Year Graduated" name="year[]"></div></div>' +
            '<label for="">Junior High School</label>' +
            '<div class="row"><div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="Name of School" name="schoolname[]"></div><div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="School' + "'" + 's Complete Address" name="address[]"></div><div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="Year Graduated" name="year[]"></div></div>' +
            ''
        else if (data == 2)
            layout = '<h2 for="">COLLEGE</h2>' +
            '<input type="hidden" name="college">' +
            '<div class="row"><div class="form-group col-md col-sm-12"><label for="">COURSE</label><select name="course" class="form-control"><option value="">Select Strand</option><option value="1">BS MARINE ENGINEERING</option><option value="2">BS MARINE TRANSPORTATION</option></select></div><div class="form-group col-md col-sm-12"><label for="">YEAR LEVEL</label><select name="year_level" class="form-control"><option value="">Select Year Level</option><option value="1ST">1ST YEAR</option></select></div></div>' +
            '<h4 for="">EDUCATIONAL BACKGROUND</h4>' +
            '<label for="">Elementary</label>' +
            '<div class="row"><div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="Name of School" name="schoolname[]"></div><div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="School' + "'" + 's Complete Address" name="address[]"></div><div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="Year Graduated" name="year[]"></div></div>' +
            '<label for="">Junior High School</label>' +
            '<div class="row"><div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="Name of School" name="schoolname[]"></div><div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="School' + "'" + 's Complete Address" name="address[]"></div><div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="Year Graduated" name="year[]"></div></div>' +
            '<label for="">Senior High School</label>' +
            '<div class="row"><div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="Name of School" name="schoolname[]"></div><div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="School' + "'" + 's Complete Address" name="address[]"></div><div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="Year Graduated" name="year[]"></div></div>' +
            ''
        $(widget).append(layout)
        evt.preventDefault()
    })
}

function load() {
    var student_code = $('#code').val()
    $.get('/inquire/' + student_code, function(rslt) {
        console.log(rslt)
    })
}

// This method is for new user to navigate or to instruct the user
function newUser() {
    $('body').css({
        "background": "black",
        "opacity": "0.5",
    })
}

// Set the Addresses
var dataAddress = []

function fetchRegions() {
    onClickWidget("#input-region", "#input-province", "Province")
    onClickWidget1("#input-province", "#input-city", "City")
    onClickWidget2("#input-city", "#input-barangay", "Barangay")
}

function onClickWidget2(widget_base, widget_append, selectInput) {
    $(widget_base).change(function(evt) {
        var index = $(this).val()
        console.log(index)
        $.getJSON("/assets/app/address.json", function(data) {
            appendData(widget_append, dataAddress[index].barangay_list, selectInput)
            console.log(dataAddress[index].barangay_list)
        })
        evt.preventDefault()
    })

}

function onClickWidget1(widget_base, widget_append, selectInput) {
    $(widget_base).change(function(evt) {
        var index = $(this).val()
        console.log(index)
        $.getJSON("/assets/app/address.json", function(data) {
            console.log(dataAddress[index].municipality_list)

            appendData(widget_append, dataAddress[index].municipality_list, selectInput)
            dataAddress = dataAddress[index].municipality_list
        })
        evt.preventDefault()
    })

}

function onClickWidget(widget_base, widget_append, selectInput) {
    $(widget_base).change(function(evt) {
        var index = $(this).find(':selected').data('value')

        $.getJSON("/assets/app/address.json", function(data) {
            dataAddress = data[index].province_list
            appendData(widget_append, data[index].province_list, selectInput)
        })
        evt.preventDefault()
    })

}

function appendData(widget, data, selectInput) {
    $(widget).find('option').remove().end().append('<option value="" disabled selected>Select ' + selectInput + '</option>')
    $.each(data, function(key, values) {
        if (selectInput == "Barangay") {
            $(widget).append(
                '<option value="' + values + '">' + values + '</option>'
            )
        } else {
            $(widget).append(
                '<option value="' + key + '">' + key + '</option>'
            )
        }

    })
}