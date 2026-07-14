@extends('layout.provider')

@section('customCSS')
@endsection

@section('content')
    <div class="min-h-screen text-slate-100 font-sans pb-24 md:pb-12">

        <!-- 🔝 Top Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-slate-950 tracking-wide">Manage Packages</h1>
                <p class="text-sm text-slate-500 mt-1">Manage your services and packages here.</p>
            </div>
            <!-- Add New Button -->
            <button id="btnAddNew"
                class="w-full sm:w-auto bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-slate-950 font-semibold px-5 py-3 rounded-xl shadow-lg shadow-amber-500/10 flex items-center justify-center space-x-2 transition duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                </svg>
                <span>Add New Package</span>
            </button>
        </div>

        <div class="flex items-center space-x-2 overflow-x-auto pb-3 mb-6 scrollbar-none select-none">
            <button
                class="filter-btn active px-4 py-2 text-xs md:text-sm font-semibold rounded-full bg-amber-500 text-slate-950 shadow-sm transition"
                data-category="all">All</button>

            @foreach ($serviceTypes as $type)
                <button
                    class="filter-btn px-4 py-2 text-xs md:text-sm font-medium rounded-full bg-slate-100 text-slate-600 hover:bg-slate-200 hover:text-amber-600 transition"
                    data-category="{{ $type->id }}">
                    {{ $type->display_name_si }}
                </button>
            @endforeach
        </div>

        <div id="packagesGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        </div>


    </div>

    <div id="packageModal"
        class="fixed inset-0 z-50 invisible flex items-center justify-center opacity-0 transition-all duration-300">
        <div class="absolute inset-0 bg-slate-950/80 backdrop-blur-sm modal-close-trigger"></div>

        <div
            class="absolute bottom-0 md:relative w-full h-[90vh] md:h-auto md:max-w-xl bg-slate-900 border-t md:border border-slate-800 rounded-t-3xl md:rounded-2xl shadow-2xl flex flex-col overflow-hidden transform translate-y-10 md:translate-y-0 transition-all duration-300">

            <div
                class="px-6 py-4 border-b border-slate-800 flex justify-between items-center bg-slate-900/50 sticky top-0 backdrop-blur-md">
                <h2 id="modalTitle" class="text-lg font-bold text-amber-400">Add New Package</h2>
                <button class="text-slate-400 hover:text-slate-200 modal-close-trigger">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form id="packageForm" class="p-6 space-y-4 overflow-y-auto flex-1">
                <input type="hidden" id="packageId" name="id">

                <div class="flex flex-col space-y-1.5">
                    <label class="text-xs font-semibold text-slate-400 tracking-wide">Service Type</label>
                    <select id="cmbServiceType" name="cmbServiceType"
                        class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 rounded-xl px-4 py-3 text-sm text-slate-200 focus:outline-none transition">
                        <option selected>--Select--</option>
                        @foreach ($serviceTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col space-y-1.5">
                    <label class="text-xs font-semibold text-slate-400 tracking-wide">Package Type</label>
                    <select id="cmbPackageType" name="cmbPackageType"
                        class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 rounded-xl px-4 py-3 text-sm text-slate-200 focus:outline-none transition">
                        <option selected>--Select--</option>
                        @foreach ($packageTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col space-y-1.5">
                    <label class="text-xs font-semibold text-slate-400 tracking-wide">Price (LKR)</label>
                    <input type="number" id="txtPackagePrice" name="txtPackagePrice" placeholder="e.g., 50000"
                        class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 rounded-xl px-4 py-3 text-sm text-slate-200 focus:outline-none transition">
                </div>

                <div class="flex flex-col space-y-1.5">
                    <label class="text-xs font-semibold text-slate-400 tracking-wide">Description</label>
                    <textarea id="txtPackageDescription" name="txtPackageDescription" rows="3" placeholder="Enter package details..."
                        class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 rounded-xl px-4 py-3 text-sm text-slate-200 focus:outline-none transition resize-none"></textarea>
                </div>

            </form>

            <div class="px-6 py-4 border-t border-slate-800 bg-slate-950/40 flex items-center space-x-3 sticky bottom-0">
                <button
                    class="flex-1 border border-slate-700 text-slate-300 font-medium py-3 rounded-xl hover:bg-slate-800 transition modal-close-trigger">Cancel</button>
                <button id="btnSavePackage"
                    class="flex-1 bg-amber-500 text-slate-950 font-bold py-3 rounded-xl hover:bg-amber-600 transition">Save
                    Package</button>
                <button id="btnUpdatePackage"
                    class="flex-1 bg-amber-500 text-slate-950 font-bold py-3 rounded-xl hover:bg-amber-600 transition hidden">Update
                    Package</button>
            </div>

        </div>
    </div>
@endsection

@section('customJS')
    <script
        src="{{ asset('controllers/manage-package.js') }}?v={{ filemtime(public_path('controllers/manage-package.js')) }}">
    </script>
@endsection
