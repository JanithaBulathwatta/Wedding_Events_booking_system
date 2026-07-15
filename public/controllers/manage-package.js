function init(){
    getPackageDetails();
}
function validations(){

}

function events(){

        $('#btnAddNew').on('click', function(e) {
            e.preventDefault();
            $('#packageForm')[0].reset();
            $('#packageId').val('');
            $('#btnUpdatePackage').hide();
            $('#btnSavePackage').show();
            $('#modalTitle').text('Add New Package');
            resetFeaturesContainer();
            openModal();
        });

        $(document).on('click', '.btn-edit', function() {
            let packageId = $(this).data('id');
            let serviceType = $(this).data('service-type');
            let packageType = $(this).data('package-type');
            let description = $(this).data('description');
            let price = $(this).data('price');

            $('#cmbServiceType').val(serviceType);
            $('#cmbPackageType').val(packageType);
            $('#txtPackagePrice').val(price);
            $('#txtPackageDescription').val(description);
            $('#packageId').val(packageId);

            $('#btnUpdatePackage').show();
            $('#btnSavePackage').hide();
            $('#modalTitle').text('Edit Package');
            openModal();
        });

        $(document).on('click','#btnUpdatePackage',function(e){
            e.preventDefault();
            let serviceType = $('#cmbServiceType').val();
            let packageType = $('#cmbPackageType').val();
            let price = $('#txtPackagePrice').val();
            let description = $('#txtPackageDescription').val();
            let packageId = $('#packageId').val();

            let data = {
                serviceType:serviceType,
                packageType:packageType,
                price:price,
                description:description,
                packageId:packageId
            }

            $.ajax({
                type: "post",
                url: "/set-update-package-details",
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200){
                        closeModal();
                        Swal.fire({
                            title:"Success!",
                            text:response.message,
                            icon:"success",
                            confirmButtonText:'Ok',
                            allowOutsideClick:false,
                            allowEscapeKey:false
                        }).then((result)=>{
                            if(result.isConfirmed){
                                window.location.reload();
                            }
                        });
                    }else{
                        Swal.fire({
                            title:"Error!",
                            text:response.message,
                            icon:"error",
                            confirmButtonText:"ok"
                        });
                    }
                },
                error:function(xhr){
                    console.log(xhr.responseText);
                }
            });
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
            let PackageType  = $('#cmbPackageType').val();
            let packagePrice = $('#txtPackagePrice').val();
            let description  = $('#txtPackageDescription').val();

            let data = {
                "serviceType" :serviceType,
                "PackageType" :PackageType,
                "packagePrice":packagePrice,
                "description" :description
            }

            $.ajax({
                type: "POST",
                url: "/set-package-details",
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200){
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                closeModal();
                                getPackageDetails();
                            }
                        });
                    }else{
                        Swal.fire({
                            title: 'Warning!',
                            text: response.message,
                            icon: 'warning',
                            confirmButtonText: 'ok'
                        })
                    }
                },
                error:function(xhr){
                    console.log(xhr.responseText);
                }
            });

        });

        $(document).on('click', '.filter-btn', function() {
            $('.filter-btn')
                .removeClass('active bg-amber-500 text-slate-950 font-semibold shadow-sm')
                .addClass('bg-slate-100 text-slate-600 hover:bg-slate-200 hover:text-amber-600 font-medium');

            $(this)
                .addClass('active bg-amber-500 text-slate-950 font-semibold shadow-sm')
                .removeClass('bg-slate-100 text-slate-600 hover:bg-slate-200 hover:text-amber-600 font-medium');


            let category = $(this).data('category');


            if(category == 'all') {
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

function getPackageDetails(){
    $.ajax({
        type: "GET",
        url: "/get-package-details",
        dataType: "json",
        success: function (response) {
            if(response.status == 200){
                let result = response.resultSet;
                console.log(result);
                $('#packagesGrid').empty();
                result.forEach(function(pkg){
                    let htmlItem =
                    `<div class="package-card bg-slate-900 border border-slate-800 rounded-2xl p-5 flex flex-col justify-between hover:border-amber-500/30 transition duration-300 shadow-xl relative overflow-hidden group"
                        data-type="${pkg.service_type_id}">

                        <div class="absolute top-0 right-0 bg-amber-500/10 text-amber-400 text-[11px] font-semibold px-3 py-1 rounded-bl-xl border-l border-b border-amber-500/10">
                            ${pkg.service_type_name}
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-slate-100 group-hover:text-amber-400 transition mt-2">
                                ${pkg.package_type_name}
                            </h3>
                            <p class="text-sm text-slate-400 mt-2 line-clamp-2">
                                ${pkg.description}
                            </p>
                            <div class="text-xl font-black text-amber-400 mt-4">
                                Rs. ${pkg.price}.00
                            </div>
                        </div>

                        <div class="flex space-x-3 mt-6 border-t border-slate-800/60 pt-4">
                            <button class="btn-edit flex-1 bg-slate-800 hover:bg-slate-700 text-amber-400 text-xs font-semibold py-2.5 rounded-xl flex items-center justify-center space-x-1.5 transition"
                                data-id="${pkg.id}" data-service-type="${pkg.service_type_id}" data-package-type="${pkg.package_type_id}" data-description="${pkg.description}" data-price="${pkg.price}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                                <span>Edit</span>
                            </button>

                            <button class="btn-delete flex-1 bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 text-xs font-semibold py-2.5 rounded-xl flex items-center justify-center space-x-1.5 transition"
                                data-id="${pkg.id}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                <span>Delete</span>
                            </button>
                        </div>
                    </div>`

                    $('#packagesGrid').append(htmlItem);
                });
            }
        }
    });
}
