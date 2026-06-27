@extends('layout.provider')

@section('customCSS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection

@section('content')
<div class="p-6 max-w-7xl mx-auto space-y-6">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between border-b border-slate-100 pb-5">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Booking Requests</h1>
            <p class="text-sm text-slate-500 mt-1">Manage and track your customer service orders.</p>
        </div>
        <div class="flex space-x-2 mt-4 md:mt-0 bg-slate-100 p-1 rounded-xl text-xs font-medium">
            <button class="px-4 py-2 rounded-lg bg-white text-slate-800 shadow-sm font-semibold">All Requests</button>
            <button class="px-4 py-2 rounded-lg text-slate-600 hover:text-slate-800">Pending</button>
            <button class="px-4 py-2 rounded-lg text-slate-600 hover:text-slate-800">Approved</button>
            <button class="px-4 py-2 rounded-lg text-slate-600 hover:text-slate-800">Completed</button>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6">

        @foreach ($bookings as $booking)

        <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-200 flex flex-col lg:flex-row justify-between gap-6">

            <div class="space-y-4 flex-1">
                <div class="flex items-center space-x-3">
                    <div class="h-10 w-10 rounded-full bg-amber-500/10 flex items-center justify-center text-amber-600 font-bold text-sm">
                        {{ substr($booking->full_name, 0, 1) }}
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-800 text-base">{{ $booking->full_name }}</h3>
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-slate-500 mt-0.5">
                            <span><i class="fa-solid fa-phone mr-1"></i> {{ $booking->mobile }}</span>
                            <span><i class="fa-solid fa-location-dot mr-1"></i> {{ $booking->address }}</span>
                            <span><i class="fa-solid fa-calendar-days mr-1"></i> Booked Date: <b>{{ $booking->booking_date }}</b></span>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50/80 border border-slate-100 rounded-xl p-4">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400 block mb-2">Requested Services</span>
                    @php
                        $services = json_decode($booking->services,true) ?? [];
                    @endphp
                    <div class="flex flex-wrap gap-2">
                        @foreach ($services as $service)
                            <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-medium bg-white border border-slate-200 text-slate-700 shadow-sm">
                                {{ $service['serviceName'] }} : {{ $service['packageType'] }} - Rs. {{ number_format($service['price'] ?? 0), 2 }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="flex flex-col justify-between items-end min-w-[200px] border-t lg:border-t-0 pt-4 lg:pt-0 border-slate-100">
                <div class="flex lg:flex-col items-center lg:items-end justify-between w-full gap-2">
                    @if ($booking->status == 0)
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-600 border border-amber-200/60">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5 animate-pulse"></span> Pending
                        </span>
                    @elseif ($booking->status == 1)
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-600 border border-blue-200/60">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-1.5"></span> Approved
                        </span>
                    @elseif ($booking->status == 2)
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-600 border border-emerald-200/60">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span> Completed Task
                        </span>
                    @elseif ($booking->status == 3)
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-600 border border-red-200/60">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5"></span>  Rejected
                        </span>
                    @endif

                    <div class="lg:mt-2 text-right">
                        <span class="text-xs text-slate-400 block">Total Price</span>
                        <span class="text-xl font-bold text-slate-800">Rs. {{ $booking->total_price ?? 0 }}</span>
                    </div>
                </div>

                <div class="flex space-x-2 w-full lg:w-auto mt-4 lg:mt-0 btnHandler"
                id="btnHandler-{{ $booking->id }}"
                data-status = "{{ $booking->status }}"
                data-id = "{{ $booking->id }}"
                >
                    {{-- <button class="flex-1 lg:flex-none px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-200/60 text-xs font-semibold rounded-xl transition-colors duration-150">
                        Reject
                    </button>
                    <button class="flex-1 lg:flex-none px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl shadow-sm shadow-emerald-600/10 transition-colors duration-150">
                        Approve Request
                    </button> --}}
                </div>
            </div>
        </div>
        @endforeach


        {{-- <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-200 flex flex-col lg:flex-row justify-between gap-6">
            <div class="space-y-4 flex-1">
                <div class="flex items-center space-x-3">
                    <div class="h-10 w-10 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-600 font-bold text-sm">
                        KP
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-800 text-base">Kamal Perera</h3>
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-slate-500 mt-0.5">
                            <span><i class="fa-solid fa-phone mr-1"></i> +94 7Y YYY YYYY</span>
                            <span><i class="fa-solid fa-location-dot mr-1"></i> Digana, Kandy</span>
                            <span><i class="fa-solid fa-calendar-days mr-1"></i> Booked Date: <b>2026-07-02</b></span>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50/80 border border-slate-100 rounded-xl p-4">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400 block mb-2">Requested Services</span>
                    <div class="flex flex-wrap gap-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-medium bg-white border border-slate-200 text-slate-700 shadow-sm">
                            <i class="fa-solid fa-camera text-blue-500 mr-1.5 text-[10px]"></i> Commercial Photography
                        </span>
                    </div>
                </div>
            </div>

            <div class="flex flex-col justify-between items-end min-w-[200px] border-t lg:border-t-0 pt-4 lg:pt-0 border-slate-100">
                <div class="flex lg:flex-col items-center lg:items-end justify-between w-full gap-2">
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-600 border border-blue-200/60">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-1.5"></span> Approved / Active
                    </span>
                    <div class="lg:mt-2 text-right">
                        <span class="text-xs text-slate-400 block">Total Price</span>
                        <span class="text-xl font-bold text-slate-800">Rs. 35,000.00</span>
                    </div>
                </div>

                <div class="w-full lg:w-auto mt-4 lg:mt-0">
                    <button class="w-full lg:w-auto px-5 py-2 bg-slate-800 hover:bg-slate-900 text-white text-xs font-semibold rounded-xl transition-colors duration-150">
                        <i class="fa-solid fa-circle-check mr-1.5"></i> Mark As Completed
                    </button>
                </div>
            </div>
        </div>


        <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm opacity-85 hover:opacity-100 transition-all duration-200 flex flex-col lg:flex-row justify-between gap-6">
            <div class="space-y-4 flex-1">
                <div class="flex items-center space-x-3">
                    <div class="h-10 w-10 rounded-full bg-emerald-500/10 flex items-center justify-center text-emerald-600 font-bold text-sm">
                        NS
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-800 text-base">Nimal Silva</h3>
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-slate-500 mt-0.5">
                            <span><i class="fa-solid fa-phone mr-1"></i> +94 7Z ZZZ ZZZZ</span>
                            <span><i class="fa-solid fa-location-dot mr-1"></i> Peradeniya, Kandy</span>
                            <span><i class="fa-solid fa-calendar-days mr-1"></i> Booked Date: <b>2026-05-15</b></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col justify-between items-end min-w-[200px]">
                <div class="flex lg:flex-col items-center lg:items-end justify-between w-full gap-2">
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-600 border border-emerald-200/60">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span> Completed Task
                    </span>
                    <div class="lg:mt-2 text-right">
                        <span class="text-xs text-slate-400 block">Total Price</span>
                        <span class="text-xl font-bold text-slate-600 line-through">Rs. 50,000.00</span>
                    </div>
                </div>
                <div class="text-xs text-slate-400 italic mt-2">
                    Closed on 2026-05-16
                </div>
            </div>
        </div> --}}

    </div>
</div>
@endsection

@section('customJS')
    <script
        src="{{ asset('controllers/provider-bookings.js') }}?v={{ filemtime(public_path('controllers/provider-bookings.js')) }}">
    </script>

@endsection
