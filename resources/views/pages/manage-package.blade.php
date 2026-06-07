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

        <!-- 🔍 Category Filter Tabs -->
        <div class="flex items-center space-x-2 overflow-x-auto pb-3 mb-6 scrollbar-none select-none">
            <button
                class="filter-btn active px-4 py-2 text-xs md:text-sm font-medium rounded-full bg-amber-500 text-slate-950 shadow-md transition"
                data-category="all">All</button>
            <button
                class="filter-btn px-4 py-2 text-xs md:text-sm font-medium rounded-full bg-slate-800 text-slate-400 hover:bg-slate-700 hover:text-amber-400 transition"
                data-category="ashtaka">Ashtaka (අෂ්ටක)</button>
            <button
                class="filter-btn px-4 py-2 text-xs md:text-sm font-medium rounded-full bg-slate-800 text-slate-400 hover:bg-slate-700 hover:text-amber-400 transition"
                data-category="decorations">Poruwa & Decoration</button>
            <button
                class="filter-btn px-4 py-2 text-xs md:text-sm font-medium rounded-full bg-slate-800 text-slate-400 hover:bg-slate-700 hover:text-amber-400 transition"
                data-category="dancing">Traditional Dancing</button>
            <button
                class="filter-btn px-4 py-2 text-xs md:text-sm font-medium rounded-full bg-slate-800 text-slate-400 hover:bg-slate-700 hover:text-amber-400 transition"
                data-category="photography">Photography</button>
            <button
                class="filter-btn px-4 py-2 text-xs md:text-sm font-medium rounded-full bg-slate-800 text-slate-400 hover:bg-slate-700 hover:text-amber-400 transition"
                data-category="drumming">Udarata Bera</button>
        </div>

        <div id="packagesGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="package-card bg-slate-900 border border-slate-800 rounded-2xl p-5 flex flex-col justify-between hover:border-amber-500/30 transition duration-300 shadow-xl relative overflow-hidden group"
                data-type="ashtaka">
                <div
                    class="absolute top-0 right-0 bg-amber-500/10 text-amber-400 text-[11px] font-semibold px-3 py-1 rounded-bl-xl border-l border-b border-amber-500/10">
                    Ashtaka
                </div>
                <div>
                    <h3 class="text-lg font-bold text-slate-100 group-hover:text-amber-400 transition mt-2">Premium Ashtaka
                        Combo</h3>
                    <p class="text-sm text-slate-400 mt-2 line-clamp-2">සාම්ප්‍රදායික චාරිත්‍ර වාරිත්‍ර සියල්ල ඇතුළත්
                        සම්පූර්ණ අෂ්ටක සේවාව.</p>
                    <div class="text-xl font-black text-amber-400 mt-4">LKR 45,000</div>
                </div>
                <div class="flex space-x-3 mt-6 border-t border-slate-800/60 pt-4">
                    <button
                        class="btn-edit flex-1 bg-slate-800 hover:bg-slate-700 text-amber-400 text-xs font-semibold py-2.5 rounded-xl flex items-center justify-center space-x-1.5 transition"
                        data-id="1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                            </path>
                        </svg>
                        <span>Edit</span>
                    </button>
                    <button
                        class="btn-delete flex-1 bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 text-xs font-semibold py-2.5 rounded-xl flex items-center justify-center space-x-1.5 transition"
                        data-id="1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                            </path>
                        </svg>
                        <span>Delete</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="packageModal"
        class="fixed inset-0 z-50 invisible flex items-center justify-center opacity-0 transition-all duration-300">
        <div class="absolute inset-0 bg-slate-950/80 backdrop-blur-sm modal-close-trigger"></div>

        <div
            class="absolute bottom-0 md:relative w-full h-[90vh] md:h-auto md:max-w-xl bg-slate-900 border-t md:border border-slate-800 rounded-t-3xl md:rounded-2xl shadow-2xl flex flex-col overflow-hidden transform translate-y-10 md:translate-y-0 transition-all duration-300">

            <!-- Modal Header -->
            <div
                class="px-6 py-4 border-b border-slate-800 flex justify-between items-center bg-slate-900/50 sticky top-0 backdrop-blur-md">
                <h2 id="modalTitle" class="text-lg font-bold text-amber-400">Add New Package</h2>
                <button class="text-slate-400 hover:text-slate-200 modal-close-trigger">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body (Scrollable form) -->
            <form id="packageForm" class="p-6 space-y-4 overflow-y-auto flex-1">
                <input type="hidden" id="packageId" name="id">

                <!-- 1. Service Type Dropdown -->
                <div class="flex flex-col space-y-1.5">
                    <label class="text-xs font-semibold text-slate-400 tracking-wide">Service Type / සේවා වර්ගය</label>
                    <select id="cmbServiceType" name="cmbServiceType"
                        class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 rounded-xl px-4 py-3 text-sm text-slate-200 focus:outline-none transition">
                        <option value="" disabled selected>Select Service Type...</option>
                        <option value="ashtaka">Ashtaka (අෂ්ටක)</option>
                        <option value="decorations">Poruwa & Decoration (පෝරුව ඩෙකරේෂන්)</option>
                        <option value="dancing">Traditional Dancing (උඩරට නැටුම්)</option>
                        <option value="photography">Photography (ඡායාරූපකරණය)</option>
                        <option value="drumming">Udarata Bera Wadana (උඩරට බෙර වාදනය)</option>
                    </select>
                </div>

                <!-- 2. Package Name -->
                <div class="flex flex-col space-y-1.5">
                    <label class="text-xs font-semibold text-slate-400 tracking-wide">Package Name / පැකේජයේ නම</label>
                    <input type="text" id="txtPackageName" name="txtPackageName" placeholder="e.g., Gold, Silver, Basic Combo"
                        class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 rounded-xl px-4 py-3 text-sm text-slate-200 focus:outline-none transition">
                </div>

                <!-- 3. Price -->
                <div class="flex flex-col space-y-1.5">
                    <label class="text-xs font-semibold text-slate-400 tracking-wide">Price (LKR) / මිල</label>
                    <input type="number" id="txtPackagePrice" name="txtPackagePrice" placeholder="e.g., 50000"
                        class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 rounded-xl px-4 py-3 text-sm text-slate-200 focus:outline-none transition">
                </div>

                <!-- 4. Description -->
                <div class="flex flex-col space-y-1.5">
                    <label class="text-xs font-semibold text-slate-400 tracking-wide">Description / හැඳින්වීම</label>
                    <textarea id="txtPackageDescription" name="txtPackageDescription" rows="3" placeholder="Enter package details..."
                        class="w-full bg-slate-950 border border-slate-800 focus:border-amber-500 rounded-xl px-4 py-3 text-sm text-slate-200 focus:outline-none transition resize-none"></textarea>
                </div>

            </form>

            <!-- Modal Footer -->
            <div class="px-6 py-4 border-t border-slate-800 bg-slate-950/40 flex items-center space-x-3 sticky bottom-0">
                <button
                    class="flex-1 border border-slate-700 text-slate-300 font-medium py-3 rounded-xl hover:bg-slate-800 transition modal-close-trigger">Cancel</button>
                <button id="btnSavePackage"
                    class="flex-1 bg-amber-500 text-slate-950 font-bold py-3 rounded-xl hover:bg-amber-600 transition">Save
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
