@extends('layout.master')

@section('customCSS')
    <style>
        .leaflet-popup-content-wrapper {
            border-radius: 12px !important;
            padding: 4px !important;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1) !important;
        }
    </style>
@endsection

@section('content')
<div class="bg-slate-50 font-sans h-[calc(100vh-64px)] overflow-hidden flex flex-col">

    <div class="flex flex-1 flex-col md:flex-row overflow-hidden relative">

        <div class="w-full md:w-[380px] bg-white border-r border-slate-200 flex flex-col h-full z-10 shadow-lg">

            <div class="p-4 border-b border-slate-100 bg-white">
                <h1 class="text-lg font-black text-slate-900 mb-1">Find Nearby Services</h1>
                <p class="text-xs text-slate-500 mb-3">ඔබට ආසන්නයේම සිටින සේවා සපයන්නන් සොයන්න.</p>

                <div class="space-y-3">
                    <div class="relative">
                        <input type="text" id="user-location-input" placeholder="Enter your location (e.g. Kandy)..."
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-4 pr-10 py-2 text-xs text-slate-700 focus:border-amber-500/50 focus:ring-2 focus:ring-amber-500/10 focus:outline-none transition">
                    </div>

                    <select class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-xs text-slate-700 focus:outline-none">
                        <option value="">All Categories</option>
                        <option value="photography">Photography</option>
                        <option value="catering">Catering</option>
                        <option value="decorating">Decorating</option>
                    </select>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto p-4 space-y-4 bg-slate-50/50" id="provider-list">

                <div class="provider-card bg-white border border-slate-200 rounded-xl p-3 shadow-sm hover:border-amber-500 cursor-pointer transition duration-200"
                     data-lat="7.2906" data-lng="80.6337" data-id="1">
                    <div class="flex items-start space-x-3">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=100" class="w-12 h-12 rounded-full object-cover border border-slate-100">
                        <div class="flex-1 min-w-0">
                            <span class="text-[9px] font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-full uppercase">Photography</span>
                            <h3 class="text-sm font-bold text-slate-900 mt-1 truncate">JB Photography</h3>
                            <p class="text-xs text-slate-500 flex items-center mt-0.5">📍 Kandy Town (0.5 km away)</p>
                            <div class="flex items-center justify-between mt-2 pt-2 border-t border-slate-100">
                                <span class="text-xs font-black text-slate-900">Rs. 65,000 up</span>
                                <span class="text-xs text-amber-500 font-bold">⭐ 4.9</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="provider-card bg-white border border-slate-200 rounded-xl p-3 shadow-sm hover:border-amber-500 cursor-pointer transition duration-200"
                     data-lat="7.2950" data-lng="80.6400" data-id="2">
                    <div class="flex items-start space-x-3">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=100" class="w-12 h-12 rounded-full object-cover border border-slate-100">
                        <div class="flex-1 min-w-0">
                            <span class="text-[9px] font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-full uppercase">Catering</span>
                            <h3 class="text-sm font-bold text-slate-900 mt-1 truncate">Royal Taste Catering</h3>
                            <p class="text-xs text-slate-500 flex items-center mt-0.5">📍 Peradeniya (2.1 km away)</p>
                            <div class="flex items-center justify-between mt-2 pt-2 border-t border-slate-100">
                                <span class="text-xs font-black text-slate-900">Rs. 1,200/pp</span>
                                <span class="text-xs text-amber-500 font-bold">⭐ 4.7</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="map" class="flex-1 h-full z-0"></div>

    </div>
</div>
@endsection

@section('customJS')
    <script
        src="{{ asset('controllers/map-finder.js') }}?v={{ filemtime(public_path('controllers/map-finder.js')) }}">
    </script>
@endsection
