function init(){

}
function validations(){

}

function events(){

    $('#btnAddNew').on('click', function(e) {
        e.preventDefault();
        $('#packageForm')[0].reset();
        $('#packageId').val('');
        $('#modalTitle').text('Add New Package');
        resetFeaturesContainer();
        openModal();
    });

        $(document).on('click', '.btn-edit', function() {
            let id = $(this).data('id');
            $('#modalTitle').text('Edit Package');
            // $.get('/provider/packages/' + id, function(data) { ... binding logic }
            openModal();
        });

        $(document).on('click', '.btn-delete', function() {
            let id = $(this).data('id');
            if(confirm('Are you sure you want to delete this package?')) {
                // $.ajax logic here
                alert('Deleted id: ' + id);
            }
        });

        $('#btnSavePackage').on('click', function(e) {
            e.preventDefault();

            let serviceType  = $('#cmbServiceType').val();
            let PackageName  = $('#txtPackageName').val();
            let packagePrice = $('#txtPackagePrice').val();
            let description  = $('#txtPackageDescription').val();

            let data = {
                "serviceType" :serviceType,
                "PackageName" :PackageName,
                "packagePrice":packagePrice,
                "description" :description
            }

            $.ajax({
                type: "POST",
                url: "url",
                data: data,
                dataType: "json",
                success: function (response) {
                    closeModal();
                },
                error:function(xhr){
                    console.log(xhr.responseText);
                }
            });

        });

        // 📑 5. Filter Tabs Logic
        $('.filter-btn').on('click', function() {
            $('.filter-btn').removeClass('active bg-amber-100 text-slate-950 font-semibold').addClass('bg-slate-100 text-slate-600 hover:text-amber-400 font-medium');
            $(this).addClass('active bg-amber-500 text-slate-100 font-semibold').removeClass('bg-slate-100 text-slate-600 font-medium');

            let category = $(this).data('category');
            if(category === 'all') {
                $('.package-card').fadeIn(200);
            } else {
                $('.package-card').hide();
                $('.package-card[data-type="' + category + '"]').fadeIn(200);
            }
        });

        function openModal() {
            $('#packageModal').removeClass('invisible opacity-0');
            $('#packageModal > div:last-child').removeClass('translate-y-10').addClass('translate-y-0');
        }

        function closeModal() {
            $('#packageModal').addClass('invisible opacity-0');
            $('#packageModal > div:last-child').removeClass('translate-y-0').addClass('translate-y-10');
        }

        $('.modal-close-trigger').on('click', function() { closeModal(); });

        function resetFeaturesContainer() {
            $('#featuresContainer').html(`<div class="flex space-x-2">
                <input type="text" name="features[]" placeholder="e.g., 2 Drummers included" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-amber-500 transition">
                <button type="button" class="btn-remove-feature p-2 text-rose-500 hover:bg-rose-50 rounded-xl transition"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
            </div>`);
        }

}
