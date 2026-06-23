    let calendar; // FullCalendar Variable එක
    let selectedDate = null;
    let selectedService = null;
function init(){

}
function validations(){

}
function events(){

    $('.provider-card, #btnViewProfile').on('click', function() {
        $('#bookingModal').removeClass('hidden').addClass('flex');

        // 🗓️ මොඩල් එක ඇතුළේ තියෙන FullCalendar එක Initialize කිරීම
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

