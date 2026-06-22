@extends('layout.master')

@section('customCSS')
    <style>
        /* 📍 Leaflet Popup එක Apple Style එකට Soft blur එකක් සහ shadow එකක් දීම */
        .leaflet-popup-content-wrapper {
            border-radius: 20px !important;
            padding: 8px !important;
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(12px) !important;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.08) !important;
            border: 1px solid rgba(255, 255, 255, 0.6);
        }
        .leaflet-popup-tip {
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(12px) !important;
        }
    </style>
@endsection

@section('content')
<div class="font-sans h-[calc(100vh-64px)] w-full relative overflow-hidden flex flex-col bg-slate-900">

    <div id="map" class="absolute inset-0 w-full h-full z-0"></div>

    <div class="absolute bottom-6 inset-x-0 w-full px-4 z-[999] pointer-events-none flex justify-center">

        <div class="w-full max-w-xl bg-slate-900/90 backdrop-blur-xl rounded-3xl p-4 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] border border-slate-700/40 pointer-events-auto flex flex-col sm:flex-row items-center gap-4 transition-all duration-300 hover:border-amber-500/30">

            <div class="flex items-center gap-3 w-full sm:w-auto shrink-0 border-b sm:border-b-0 sm:border-r border-slate-700/50 pb-3 sm:pb-0 sm:pr-4">
                <div class="w-9 h-9 rounded-2xl bg-gradient-to-tr from-amber-500 to-orange-400 flex items-center justify-center shadow-md shadow-orange-500/20">
                    <svg class="w-5 h-5 text-white animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xs font-black tracking-wider uppercase text-slate-200">Live Radar</h1>
                    <p class="text-[10px] text-slate-400 font-medium">Find services around you</p>
                </div>
            </div>

            <div class="w-full relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <span class="flex h-2 w-2 relative mr-1">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-amber-500"></span>
                    </span>
                </div>

                <input type="text" id="txtLocation" placeholder="Type a location (e.g. Kalutara)..."
                       class="w-full bg-slate-800/60 border border-slate-700/30 rounded-2xl pl-9 pr-4 py-3 text-xs text-slate-200 font-semibold placeholder-slate-500 focus:border-amber-500 focus:bg-slate-900 focus:ring-4 focus:ring-amber-500/10 focus:outline-none transition duration-300 shadow-inner">
            </div>

        </div>
    </div>

</div>
@endsection

@section('customJS')
    <script
        src="{{ asset('controllers/map-finder.js') }}?v={{ filemtime(public_path('controllers/map-finder.js')) }}">
    </script>
@endsection
