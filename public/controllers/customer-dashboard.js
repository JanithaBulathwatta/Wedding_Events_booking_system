    let calendar;
    let selectedDate = null;
    let selectedService = null;
function init(){

}
function validations(){

}
function events(){

    $(document).on('click','.btnViewProfile', function() {
        selectedDate = null;
        selectedService = null;

        $('#txtSelectedDateDisplay')
            .text('Select a Date')
            .removeClass('bg-green-50 text-green-600 border-green-200/50 bg-amber-50 text-amber-600 border-amber-200/50'); // පරණ CSS ඔක්කොම අයින් කරනවා

        $('#hidBookingDate').val('');
        $('#hidServiceName').val('');


        checkFormValidity();

        $('#bookingModal').removeClass('hidden').addClass('flex');

        let name = $(this).data('name');
        let profilePic = $(this).data('profilepic');
        let coverPic = $(this).data('coverimage');
        let mobile = $(this).data('mobile');
        let services = $(this).data('services');
        let descriptions = $(this).data('descriptions');
        let prices = $(this).data('prices');
        let packageTypes = $(this).data('packagetypes');
        let providerId = $(this).data('providerid');

        $('#hidProviderId').val(providerId);
        $('#txtProviderName').text(name);
        $('#imgProfileImage').attr('src',profilePic);
        $('#imgCoverImage').attr('src',coverPic);
        $('#txtMobile').text(mobile);


        $('#servicesList').empty();
        services.forEach(function(service, index) {
            let serviceName = service ? service.trim() : '';

            let servicePrice = (prices && prices[index]) ? prices[index].trim() : 'Contact';
            let serviceDesc = (descriptions && descriptions[index]) ? descriptions[index].trim() : 'No description available.';

            let packageType = (packageTypes && packageTypes[index]) ? packageTypes[index].trim() : 'Standard';

            if (serviceName !== '') {
                let serviceCardHtml = `
                    <div class="service-card border border-slate-200 rounded-2xl p-3 cursor-pointer transition hover:border-red-500/50 flex justify-between items-center bg-slate-50/50 gap-3 select-none"
                        data-price="${servicePrice}"
                        data-desc="${serviceDesc}"
                        data-servicename = "${serviceName}"
                        data-packagetype = "${packageType}">

                        <div class="flex items-center gap-3 w-full">
                            <div class="relative flex items-center justify-center shrink-0">
                                <input type="checkbox" class="chk-service accent-red-500 w-4 h-4 rounded border-slate-300 text-red-500 focus:ring-red-500/30 cursor-pointer">
                            </div>

                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <h4 class="text-xs font-bold text-slate-800 truncate">${serviceName}</h4>

                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[9px] font-medium bg-red-50 text-red-600 border border-red-100/80">
                                        ${packageType}
                                    </span>
                                </div>

                                <p class="text-[10px] text-slate-500 mt-1 italic line-clamp-2">${serviceDesc}</p>
                            </div>
                        </div>

                        <span class="text-xs font-black text-slate-700 shrink-0 ml-2">Rs. ${servicePrice}</span>
                    </div>
                `;

                $('#servicesList').append(serviceCardHtml);
            }
        });

        rebindServiceEvents();
        initModalCalendar();
    });

    $('#btnCloseModal').on('click', function() {
        let selectedDate = null;
        let selectedService = null;
        $('#bookingModal').removeClass('flex').addClass('hidden');
    });

    $('#btnSubmitBooking').click(function(e){
        e.preventDefault();

        let providerId = $('#hidProviderId').val();
        let bookingDate = $('#hidBookingDate').val();
        let selectedList = [];
        let totalPrice = 0;

        $('.chk-service:checked').each(function(){
            let card = $(this).closest('.service-card');

            let price = parseFloat(card.data('price') || 0);
            let description = card.data('desc');
            let serviceName = card.data('servicename');
            let packageType = card.data('packagetype');

            selectedList.push({
               price:price,
               description:description,
               serviceName:serviceName,
               packageType:packageType
            });
            totalPrice+=price;
        });

        let dataSet = {
            providerId:providerId,
            totalPrice:totalPrice,
            bookingDate:bookingDate,
            selectedList:selectedList
        }

        $.ajax({
            type: "POST",
            url: "/set-booking-details",
            data: dataSet,
            dataType: "json",
            success: function (response) {
                if(response.status == 200){
                    swal.fire({
                        title:'Success!',
                        text:response.message,
                        icon:'success',
                        confirmButtonText:'ok'
                    });
                    $('#btnCloseModal').click();
                }else{
                    swal.fire({
                        title:'Warning!',
                        text:response.message,
                        icon:'warning',
                        confirmButtonText:'ok'
                    });
                }
            },
            error:function(xhr){
                console.log(xhr.responseText);
            }
        });

    });
}

function checkFormValidity() {

    let checkedServicesCount = $('.chk-service:checked').length;

    if (selectedDate && checkedServicesCount > 0) {

        selectedService = true;

        $('#btnSubmitBooking')
            .removeAttr('disabled')
            .removeClass('bg-slate-200 text-slate-400 cursor-not-allowed')
            .addClass('bg-amber-500 hover:bg-amber-600 text-slate-950 font-black cursor-pointer');
    }
    else {
        selectedService = null;

        $('#btnSubmitBooking')
            .attr('disabled', 'disabled')
            .removeClass('bg-amber-500 hover:bg-amber-600 text-slate-950 font-black cursor-pointer')
            .addClass('bg-slate-200 text-slate-400 cursor-not-allowed');
    }
}

function initModalCalendar() {
        var calendarEl = document.getElementById('providerCalendar');

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

            select: function(info) {
                selectedDate = info.startStr;

                $('#txtSelectedDateDisplay').text(selectedDate).addClass('bg-amber-50 text-amber-600 border border-amber-200/50');
                $('#hidBookingDate').val(selectedDate);

                checkFormValidity();
            }
        });

        calendar.render();
    }

 function rebindServiceEvents() {

    $(document).off('click', '.service-card').on('click', '.service-card', function(e) {
        if (!$(e.target).is('input[type="checkbox"]')) {
            let checkbox = $(this).find('.chk-service');
            checkbox.prop('checked', !checkbox.prop('checked')).trigger('change');
            return;
        }
    });

    $(document).off('change', '.chk-service').on('change', '.chk-service', function() {
        let card = $(this).closest('.service-card');

        if ($(this).is(':checked')) {
            card.addClass('border-red-500 bg-red-50/30 ring-2 ring-red-500/10');
        } else {
            card.removeClass('border-red-500 bg-red-50/30 ring-2 ring-red-500/10');
        }
        checkFormValidity();
    });
}

