function init(){

}
function validations(){

}
function events(){

    $('.btnHandler').each(function(){
        let container = $(this);
        let status = parseInt(container.data('status'));
        let id = container.data('id');

        buttonHandler(status, id, container)
    });

    $(document).on('click','.btn-status-update',function(){
        let button  = $(this);
        let bookingId = button.data('booking-id');
        let newStatus = parseInt(button.data('new-status'));
        let container = $(`#btnHandler-${bookingId}`);

        container.data('status', newStatus);

        buttonHandler(newStatus,bookingId,container);


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
