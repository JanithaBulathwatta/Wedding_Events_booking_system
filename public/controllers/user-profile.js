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
        let district = $('#cmbDistrict').val();
        let city = $('#txtCity').val();
        let profileType = $("input[name='profile_type']:checked").val();
        let groupName = $('#txtGroupName').val();
        let profileImage = $('#fileProfilePic')[0].files[0];
        let coverImage = $('#fileCoverPic')[0].files[0];

        let formData = new FormData();

        formData.append('txtFullName', fullName);
        formData.append('txtAddress', address);
        formData.append('txtMobile', mobile);
        formData.append('cmbDistrict', district);
        formData.append('txtCity', city);
        formData.append('profile_type', profileType);
        formData.append('txtGroupName', groupName ? groupName : '');
        if (profileImage) {
            formData.append('fileProfilePic', profileImage);
        }
        if(coverImage){
            formData.append('fileCoverPic', coverImage);
        }

        if($('#frmProfileSetup').valid()){
            setUserProfile(formData);
        }
    });

    $("input[name='profile_type']").on('change', function() {

        let selectedValue = $(this).val();

        if (selectedValue === 'group') {
            $('#group-name-wrapper').removeClass('hidden');
            $('#txtGroupName').attr('required', true);
        } else {
            $('#group-name-wrapper').addClass('hidden');
            $('#txtGroupName').attr('required', false).val('');
        }
    });

    $('.image-uploader').on('change', function() {
        let file = this.files[0];

        let previewDiv = $(this).data('target-preview');
        let imgTag = $(this).data('target-img');
        let textTag = $(this).data('target-text');

        if (file) {
            $(textTag).text(file.name);
            let reader = new FileReader();
            reader.onload = function(e) {
                $(imgTag).attr('src', e.target.result);
            }
            reader.readAsDataURL(file);


            $(previewDiv).removeClass('hidden').addClass('flex');
        } else {
            $(previewDiv).addClass('hidden').removeClass('flex');
        }
    });


    $('.btn-remove-preview').on('click', function(e) {
        e.preventDefault();

        let inputId = $(this).data('input');
        let previewDiv = $(this).data('preview');
        let imgTag = $(this).data('img');
        let textTag = $(this).data('text');

        $(inputId).val('');
        $(imgTag).attr('src', '');
        $(textTag).text('');
        $(previewDiv).addClass('hidden').removeClass('flex');
    });
}

function resetImagePreview() {

    $('#fileProfilePic').val('');
    $('#img-preview').attr('src', '');
    $('#file-name-text').text('');
    $('#file-name-preview').addClass('hidden').removeClass('flex');
}

function setUserProfile(data){
    $.ajax({
        type: "POST",
        url: "/set-user-profile",
        data: data,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (response) {
            if(response.status == 200){
                $('#frmProfileSetup')[0].reset();
                Swal.fire({
                    title:"Success!",
                    text:response.message,
                    icon:"success",
                    timer:1500,
                    showConfirmButton:false
                }).then(()=>{
                    window.location.href = response.redirect;
                });
            }
            else{
                Swal.fire('Error!',response.message,'error');
            }
        },
        error:function(xhr){
            console.log(xhr.responseText);
        }
    });
}
