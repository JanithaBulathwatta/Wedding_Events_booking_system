function init(){

}

function validations(){
    $('#frmProfileSetup').validate({

        rules:{
            txtFullName:{
                required: true,
                minlength: 3,
                text: true
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
                required: function(){
                    return isServiceProvider === 1;
                }
            },
            txtServiceArea:{
                required: function(){
                    return isServiceProvider === 1;
                },
                minlength: 3
            }
        },
        messages:{
            txtFullName:{
                required: "This field is required.",
                minlength: "At least three letters need",
                text:"only letters"
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
            errorClass: "!text-red-600 !text-xs !block !mt-1 !font-semibold",

            highlight: function(element) {
                $(element)
                    .addClass('!border-red-500 !focus:ring-red-500 !focus:border-red-500')
                    .removeClass('border-white/50 focus:ring-indigo-600 focus:border-indigo-600');
            },
            unhighlight: function(element) {
                $(element)
                    .removeClass('!border-red-500 !focus:ring-red-500 !focus:border-red-500')
                    .addClass('border-white/50 focus:ring-indigo-600 focus:border-indigo-600');
            }
        }
    });
}

function events(){

    $('#btnSubmitProfile').click(function(e){
        e.preventDefault();

        let fullName = $('#txtFullName').val();
        let address = $('#txtAddress').val();
        let mobile = $('#txtMobile').val();
        let category = $('#cmbCategory').val();
        let serviceArea = $('#txtServiceArea').val();

        data = {
            "fullName":fullName,
            "address":address,
            "mobile":mobile,
            "category":category,
            "serviceArea":serviceArea
        }




    });
}
