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
        console.log(descriptions);



        $('#txtProviderName').text(name);
        $('#imgProfileImage').attr('src',profilePic);
        $('#imgCoverImage').attr('src',coverPic);
        $('#txtMobile').text(mobile);


        $('#servicesList').empty();
        services.forEach(function(service, index) {
            let serviceName = service ? service.trim() : '';

            let servicePrice = (prices && prices[index]) ? prices[index].trim() : 'Contact';
            let serviceDesc = (descriptions && descriptions[index]) ? descriptions[index].trim() : 'No description available.';
            // 🎯 Index එක අනුව අදාළ පැකේජ් ටයිප් එක ගන්නවා
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


        initModalCalendar();
    });

    $('#btnCloseModal').on('click', function() {
        $('#bookingModal').removeClass('flex').addClass('hidden');
    });

    $('.service-card').on('click', function() {
        // කලින් සිලෙක්ට් වෙලා තිබ්බ එක අයින් කරලා අලුත් එකට Active ක්ලාස් දානවා
        $('.service-card').removeClass('border-amber-500 bg-amber-50/30 ring-2 ring-amber-500/10');
        $(this).addClass('border-amber-500 bg-amber-50/30 ring-2 ring-amber-500/10');

        selectedService = $(this).find('h4').text();
        let price = $(this).data('price');
        let desc = $(this).data('desc');

        // 📝 දකුණු පැත්තේ තියෙන Dynamic Details Box එක අප්ඩේට් කරලා පෙන්වනවා
        $('#selectedServiceName').text(selectedService);
        $('#selectedServiceDesc').text(desc);
        $('#selectedServicePrice').text('Rs. ' + price);
        $('#serviceDetailsBox').removeClass('hidden');

        // Form hidden input එකට දානවා
        $('#hidServiceName').val(selectedService);

        checkFormValidity(); // බටන් එක ඇක්ටිව් කරන්න පුළුවන්ද බලනවා
    });

}

function checkFormValidity() {
        if (selectedDate && selectedService) {
            $('#btnSubmitBooking')
                .removeAttr('disabled')
                .removeClass('bg-slate-200 text-slate-400 cursor-not-allowed')
                .addClass('bg-amber-500 hover:bg-amber-600 text-slate-950 font-black cursor-pointer');
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
            headerToolbar: {
                left: 'title',
                center: '',
                right: 'prev,next'
            },
            // 🚫 දැනටමත් බුක් වෙලා තියෙන දවස් පෙන්වන්න (Backend එකෙන් අරන් දාන්න පුළුවන්)
            events: [
                { start: '2026-06-25', display: 'background', color: '#fee2e2' }, // බ්ලොක් කරපු දවසක්
            ],
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

