function init(){

}
function validations(){

}

function events(){
    $('.btnHandler').each(function(){
        let container = $(this);
        let status = parseInt(container.data('status'));
        let id = container.data('id');

        buttonHandler(status, id, container);

        let badgeContainer = $(`#badgeHandler-${id}`);

        renderStatusBadge(badgeContainer, status);
    });

    $(document).on('click','.btn-status-update',function(){

        let button  = $(this);
        let bookingId = button.data('booking-id');

        Swal.fire({
            title: 'Warning!',
            text: 'Do you want to Cancel the Request?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed){

                let data = {
                    bookingId:bookingId
                }

                $.ajax({
                    type: "POST",
                    url: "/set-customer-booking-status",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 200){
                            Swal.fire({
                                title: "Success!",
                                text: response.message,
                                icon: "success",
                                confirmButtonText: "OK",
                                allowOutsideClick:false,
                                allowEscapeKey:false
                            }).then((result)=>{
                                if(result.isConfirmed){
                                    window.location.reload();
                                }
                            });
                        }else{
                            Swal.fire({
                                title: "Error!",
                                text: response.message,
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    error:function(xhr){
                        console.log(xhr.responseText);
                    }
                });
            }
        });

    });
}

function buttonHandler(status, bookingId, container){
    container.empty();

    if(status == 0){
        container.html(`
            <button data-booking-id="${bookingId}" data-status="0" class="btn-status-update flex-1 lg:flex-none px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-200/60 text-xs font-semibold rounded-xl transition duration-150 m-3">
                Cancel Request
            </button>
        `);
    }

}

function renderStatusBadge(container, status) {
    container.empty();

    if (status === 0) {
        container.html(`
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-600 border border-amber-200/60">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5 animate-pulse"></span> Pending
            </span>
        `);
    }
    else if (status === 1) {
        container.html(`
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-600 border border-blue-200/60">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-1.5"></span> Approved
            </span>
        `);
    }
    else if (status === 2) {
        container.html(`
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-600 border border-emerald-200/60">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span> Completed Task
            </span>
        `);
    }
    else if (status === 3) {
        container.html(`
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-600 border border-red-200/60">
                <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5"></span> Rejected
            </span>
        `);
    }
}
