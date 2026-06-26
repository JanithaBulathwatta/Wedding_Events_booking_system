@extends('layout.provider')

@section('customCSS')

@endsection


@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1: Bookings -->
        <div class="bg-slate-900 border border-slate-800/60 rounded-2xl p-6 relative overflow-hidden shadow-xl">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Bookings</p>
            <h3 class="text-3xl font-black text-slate-100 mt-2 counter-value" data-target="{{ $bookingCount }}">0</h3>
            <p class="text-xs text-emerald-400 font-semibold mt-1 flex items-center">
                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
                +3 new orders
            </p>
        </div>
        <!-- Card 2: Active Packages -->
        <div class="bg-slate-900 border border-slate-800/60 rounded-2xl p-6 relative overflow-hidden shadow-xl">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Active Packages</p>
            <h3 class="text-3xl font-black text-slate-100 mt-2 counter-value" data-target="{{ $packageCount }}">0</h3>
            <p class="text-xs text-slate-500 font-medium mt-1">Active services live</p>
        </div>
        <!-- Card 3: Total Earnings -->
        <div class="bg-slate-900 border border-slate-800/60 rounded-2xl p-6 relative overflow-hidden shadow-xl">
            <p class="text-xs font-bold text-amber-400/80 uppercase tracking-wider">Toatal Income</p>
            <h3 class="text-3xl font-black text-amber-400 mt-2">Rs. 185,000</h3>
            <p class="text-xs text-emerald-400 font-semibold mt-1 flex items-center">
                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
                this month +12%
            </p>
        </div>
        <!-- Card 4: Profile Views -->
        <div class="bg-slate-900 border border-slate-800/60 rounded-2xl p-6 relative overflow-hidden shadow-xl">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Profile view</p>
            <h3 class="text-3xl font-black text-slate-100 mt-2">1,420</h3>
            <p class="text-xs text-slate-500 font-medium mt-1">Monthly profile visitors</p>
        </div>
    </div>
@endsection


@section('customJS')
    <script
        src="{{ asset('controllers/service-provider-dashboard.js') }}?v={{ filemtime(public_path('controllers/service-provider-dashboard.js')) }}">
    </script>
@endsection
