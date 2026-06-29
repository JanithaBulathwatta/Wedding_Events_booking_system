let calendar;
function init(){

    initModalCalendar();
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
        let newStatus = parseInt(button.data('new-status'));
        let container = $(`#btnHandler-${bookingId}`);
        let badgeContainer = $(`#badgeHandler-${bookingId}`);
        container.data('status', newStatus);

        let message = "";
        if(newStatus == '1'){
            message = "Do you want approve the Request?";
        }
        else if(newStatus == 2){
            message = "Do you want complete the task?";
        }
        else if(newStatus == 3){
            message = "Do you want Reject the Request?";
        }

        Swal.fire({
            title: 'Are you sure?',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed){

                buttonHandler(newStatus,bookingId,container);
                renderStatusBadge(badgeContainer, newStatus);

                let data = {
                    status:newStatus,
                    bookingId:bookingId
                }

                $.ajax({
                    type: "POST",
                    url: "/set-booking-status",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 400){
                            Swal.fire('Error!',response.message,'error');
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
            <button data-booking-id="${bookingId}" data-new-status="3" class="btn-status-update flex-1 lg:flex-none px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-200/60 text-xs font-semibold rounded-xl transition duration-150">
                Reject
            </button>
            <button data-booking-id="${bookingId}" data-new-status="1" class="btn-status-update flex-1 lg:flex-none px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl shadow-sm shadow-emerald-600/10 transition duration-150">
                Approve Request
            </button>
        `);
    }
    else if(status == 1){
        container.html(`
            <button data-booking-id="${bookingId}" data-new-status="2" class="btn-status-update w-full lg:w-auto px-5 py-2 bg-slate-800 hover:bg-slate-900 text-white text-xs font-semibold rounded-xl transition-colors duration-150">
                 <i class="fa-solid fa-circle-check mr-1.5"></i> Mark As Completed
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

function getBookingDates(){
    $.ajax({
        type: "GET",
        url: "/get-booking-dates",
        dataType: "json",
        success: function (response) {

        }
    });
}
function initModalCalendar() {
        var calendarEl = document.getElementById('bookingCalendar');

        if (calendar) { calendar.destroy(); }

        calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            height: 380,
            selectable: true,
            unselectAuto: false,
            headerToolbar: {
                left: 'title',
                center: '',
                right: 'prev,next'
            },
            // events:calenderEvents,

            // selectAllow: function(selectInfo) {
            //     let clickedDate = selectInfo.startStr;
            //     if (bookingDates.includes(clickedDate)) {
            //         return false;
            //     }
            //     return true;
            // },

            // select: function(info) {
            //     selectedDate = info.startStr;

            //     $('#txtSelectedDateDisplay').text(selectedDate).addClass('bg-amber-50 text-amber-600 border border-amber-200/50');
            //     $('#hidBookingDate').val(selectedDate);

            //     checkFormValidity();
            // }
        });

        calendar.render();
}
