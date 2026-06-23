    let calendar; // FullCalendar Variable එක
    let selectedDate = null;
    let selectedService = null;
function init(){

}
function validations(){

}
function events(){

    $(document).on('click','.btnViewProfile', function() {
        $('#bookingModal').removeClass('hidden').addClass('flex');
        let name = $(this).data('name');
        let profilePic = $(this).data('profilepic');
        let coverPic = $(this).data('coverimage');
        let mobile = $(this).data('mobile');
        let services = $(this).data('services');
        let descriptions = $(this).data('descriptions');
        let prices = $(this).data('prices');
        let packageTypes = $(this).data('packagetypes');

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
                        data-desc="${serviceDesc}">

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
        $('#bookingModal').removeClass('flex').addClass('hidden');
    });

}

function checkFormValidity() {
    // 🔍 දැනට සිලෙක්ට් වෙලා තියෙන චෙක්බොක්ස් ගණන ගන්නවා
    let checkedServicesCount = $('.chk-service:checked').length;

    // 💡 දිනයක් සිලෙක්ට් වෙලා තියෙන්න ඕනේ + අඩුම ගානේ එක සර්විස් එකක් හරි සිලෙක්ට් වෙලා තියෙන්න ඕනේ
    if (selectedDate && checkedServicesCount > 0) {

        // 🚀 Global variable එකට සිලෙක්ට් කරපු සර්විස් එක True (හෝ අගයක්) විදිහට මාර්ක් කරනවා වැලිඩේෂන් එක පාස් වෙන්න
        selectedService = true;

        $('#btnSubmitBooking')
            .removeAttr('disabled')
            .removeClass('bg-slate-200 text-slate-400 cursor-not-allowed')
            .addClass('bg-amber-500 hover:bg-amber-600 text-slate-950 font-black cursor-pointer');
    }
    // 🚫 දිනය නැත්නම් හෝ එකම සර්විස් එකක්වත් සිලෙක්ට් කරලා නැත්නම් බටන් එක ලොක් කරනවා
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

        // කලින් කැලැන්ඩරයක් හැදිලා තිබ්බොත් ඒක අයින් කරලා අලුතෙන් හදනවා (ලෙඩ නැති වෙන්න)
        if (calendar) { calendar.destroy(); }

        calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            height: 380, // මොඩල් එකට ගැලපෙන උස
            selectable: true,
            unselectAuto: false,
            headerToolbar: {
                left: 'title',
                center: '',
                right: 'prev,next'
            },
            // 🚫 දැනටමත් බුක් වෙලා තියෙන දවස් පෙන්වන්න (Backend එකෙන් අරන් දාන්න පුළුවන්)
            // events: [
            //     { start: '2026-06-25', display: 'background', color: '#fee2e2' }, // බ්ලොක් කරපු දවසක්
            // ],
            // 🎯 යූසර් කැලැන්ඩරෙන් දවසක් ක්ලික් කරපු වෙලාව
            select: function(info) {
                selectedDate = info.startStr;

                // යූසර්ට පේන්න දිනය අප්ඩේට් කරනවා
                $('#txtSelectedDateDisplay').text(selectedDate).addClass('bg-amber-50 text-amber-600 border border-amber-200/50');
                $('#hidBookingDate').val(selectedDate); // Hidden input එකට දානවා

                checkFormValidity(); // බටන් එක ඇක්ටිව් කරන්න පුළුවන්ද බලනවා
            }
        });

        calendar.render();
    }

 function rebindServiceEvents() {

    // කාඩ් එක උඩ ක්ලික් කරද්දී චෙක්බොක්ස් එක Toggle කරනවා
    $(document).off('click', '.service-card').on('click', '.service-card', function(e) {
        if (!$(e.target).is('input[type="checkbox"]')) {
            let checkbox = $(this).find('.chk-service');
            checkbox.prop('checked', !checkbox.prop('checked')).trigger('change');
            return;
        }
    });

    // චෙක්බොක්ස් එක වෙනස් වෙද්දී (Checked / Unchecked) ක්‍රියාත්මක වන කොටස
    $(document).off('change', '.chk-service').on('change', '.chk-service', function() {
        let card = $(this).closest('.service-card');

        if ($(this).is(':checked')) {
            // 🟥 සිලෙක්ට් කරපු කාඩ් එකේ බෝඩර් එක විතරක් රතු කරනවා (අනිත් ඒවා uncheck කරන්නේ නෑ!)
            card.addClass('border-red-500 bg-red-50/30 ring-2 ring-red-500/10');
        } else {
            // චෙක් එක අයින් කරොත් රතු පාට අයින් කරනවා
            card.removeClass('border-red-500 bg-red-50/30 ring-2 ring-red-500/10');
        }

        // 🔄 හැම වෙලාවෙම බටන් එක ඇක්ටිව්ද කියලා චෙක් කරනවා
        checkFormValidity();
    });
}

