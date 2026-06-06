function init(){

}

function validations(){
    $('#frmProfileSetup').validate({

        rules:{
            txtFullName:{
                required: true,
                minlength: 3,
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
        },
        errorElement: "span",
        errorClass: "error",

        highlight: function(element) {
            $(element).removeClass('border-white/50 focus:ring-indigo-600 focus:border-indigo-600');
        },
        unhighlight: function(element) {
            $(element).addClass('border-white/50 focus:ring-indigo-600 focus:border-indigo-600');
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
        if($('#frmProfileSetup').valid()){
            setUserProfile(data);
        }
    });
}

function setUserProfile(data){
    $.ajax({
        type: "POST",
        url: "/set-user-profile",
        data: data,
        dataType: "json",
        success: function (response) {
            if(response.status == 200){
                console.log(response);
                alert(response.message);
                window.location.href = response.redirect;
                $('#frmProfileSetup')[0].reset();
            }
        },
        error:function(xhr){
            console.log(xhr.responseText);
        }
    });
}
