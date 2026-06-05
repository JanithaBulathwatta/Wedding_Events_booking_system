function init(){

}

function validations(){
    $('#frmProfileSetup').validate({

        rules:{
            txtFullName:{
                required: true,
                minlength: 3
            },
            txtAddress:{
                required: true
            },
            txtMobile:{
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            cmbCategory:{
                required: true
            },
            txtServiceArea:{
                required: true,
                minlength: 3
            }
        },
        messages:{
            txtFullName:{
                required: "This field is required.",
                minlength: "At least three letters need"
            },
            txtAddress:{
                required: "This field is required."
            },
            txtMobile:{
                required: "This field is required.",
                digits: "only digits",
                minlength: "10 digits should include"
            },
            cmbCategory:{
                required: "This field is required.",
            },
            txtServiceArea:{
                required: "This field is required.",
                minlength: "At least three letters need"
            },
            errorElement: "span",
            errorClass: "text-danger small d-block mt-1",

            highlight: function(element) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            }
        }
    });
}

function events(){
    $('#btnSubmitProfile').click(function(){
        alert('hello');
    });
}
