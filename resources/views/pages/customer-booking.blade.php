@extends('layout.master')

@section('customCSS')
@endsection

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">

    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-900">My Bookings</h1>
        <p class="text-xs text-slate-500 mt-1">Track, manage, and check the status of your event bookings.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($bookings as $booking)
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-md transition duration-200 overflow-hidden flex flex-col justify-between">
            <div class="p-6">
                <div class="flex items-start justify-between gap-3 mb-4">
                    <div>
                        <h3 class="font-bold text-slate-900 text-base leading-snug">{{ $booking->full_name }}</h3>

                    </div>
                    <div id="badgeHandler-{{ $booking->id }}">

                    </div>
                    {{-- <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold bg-amber-50 text-amber-700 rounded-full border border-amber-200 shrink-0">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5"></span>Pending
                    </span> --}}
                </div>

                <div class="space-y-3 pt-3 border-t border-slate-100">
                    <div class="flex justify-between items-center text-xs">
                        <span class="text-slate-400">Event Date</span>
                        <span class="font-semibold text-slate-700">{{ $booking->booking_date }}</span>
                    </div>
                    @php
                        $services = json_decode($booking->services,true) ?? [];

                    @endphp
                    <div class="flex flex-col gap-2 pt-2 border-t border-slate-100">
                        <span class="text-xs text-slate-400 block mb-1">Booked Services:</span>

                        @foreach ($services as $service)
                            <div class="flex justify-between items-center text-xs gap-4">
                                <span class="font-medium text-slate-700 truncate max-w-[150px]" title="{{ $service['serviceName'] }}">
                                    {{ $service['serviceName'] }}
                                </span>

                                <span class="font-semibold text-slate-900 shrink-0">
                                    Rs. {{ number_format($service['price'] ?? 0, 2) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex justify-between items-center text-xs pt-1">
                        <span class="text-slate-400">Total Price</span>
                        <span class="text-sm font-extrabold text-slate-900">Rs. {{ number_format($booking->total_price) ?? 0,2 }}.00</span>
                    </div>
                </div>
            </div>

            <div class="flex space-x-2 w-full lg:w-auto mt-4 lg:mt-0 btnHandler"
                id="btnHandler-{{ $booking->id }}" data-status = "{{ $booking->status }}"
                data-id = "{{ $booking->id }}">
            </div>
        </div>
        @endforeach

        {{-- <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-md transition duration-200 overflow-hidden flex flex-col justify-between">
            <div class="p-6">
                <div class="flex items-start justify-between gap-3 mb-4">
                    <div>
                        <h3 class="font-bold text-slate-900 text-base leading-snug">Magul Gedara Caterers</h3>
                        <span class="text-[10px] font-semibold text-slate-400">ID: #BKG-9721</span>
                    </div>
                    <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold bg-emerald-50 text-emerald-700 rounded-full border border-emerald-200 shrink-0">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span>Approved
                    </span>
                </div>

                <div class="space-y-3 pt-3 border-t border-slate-100">
                    <div class="flex justify-between items-center text-xs">
                        <span class="text-slate-400">Event Date</span>
                        <span class="font-semibold text-slate-700">2026-09-02</span>
                    </div>
                    <div class="flex justify-between items-start text-xs">
                        <span class="text-slate-400 shrink-0 mr-4">Services</span>
                        <span class="font-medium text-slate-700 text-right truncate max-w-[180px]" title="Buffet Menu B, Welcome Drinks">Buffet Menu B, Welcome Drinks</span>
                    </div>
                    <div class="flex justify-between items-center text-xs pt-1">
                        <span class="text-slate-400">Total Price</span>
                        <span class="text-sm font-extrabold text-slate-900">Rs. 380,000.00</span>
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100 flex justify-center items-center h-[53px]">
                <span class="text-xs text-emerald-600 font-bold flex items-center gap-1">
                    ✓ Confirmed & Locked
                </span>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-md transition duration-200 overflow-hidden flex flex-col justify-between">
            <div class="p-6">
                <div class="flex items-start justify-between gap-3 mb-4">
                    <div>
                        <h3 class="font-bold text-slate-900 text-base leading-snug">Grand Flora Decorations</h3>
                        <span class="text-[10px] font-semibold text-slate-400">ID: #BKG-9604</span>
                    </div>
                    <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold bg-rose-50 text-rose-700 rounded-full border border-rose-200 shrink-0">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500 mr-1.5"></span>Rejected
                    </span>
                </div>

                <div class="space-y-3 pt-3 border-t border-slate-100">
                    <div class="flex justify-between items-center text-xs">
                        <span class="text-slate-400">Event Date</span>
                        <span class="font-semibold text-slate-700">2026-08-20</span>
                    </div>
                    <div class="flex justify-between items-start text-xs">
                        <span class="text-slate-400 shrink-0 mr-4">Services</span>
                        <span class="font-medium text-slate-700 text-right truncate max-w-[180px]" title="Poruwa Setup, Table Decors">Poruwa Setup, Table Decors</span>
                    </div>
                    <div class="flex justify-between items-center text-xs pt-1">
                        <span class="text-slate-400">Total Price</span>
                        <span class="text-sm font-extrabold text-slate-900">Rs. 95,000.00</span>
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100 flex justify-center items-center h-[53px]">
                <span class="text-xs text-slate-400 font-medium">Booking Rejected by Provider</span>
            </div>
        </div>

        <div class="bg-white/60 border border-slate-200 rounded-2xl shadow-sm overflow-hidden flex flex-col justify-between">
            <div class="p-6 opacity-75">
                <div class="flex items-start justify-between gap-3 mb-4">
                    <div>
                        <h3 class="font-bold text-slate-500 text-base leading-snug line-through">DJ Nalin & Sounds</h3>
                        <span class="text-[10px] font-semibold text-slate-400">ID: #BKG-9512</span>
                    </div>
                    <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold bg-slate-100 text-slate-500 rounded-full border border-slate-200 shrink-0">
                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400 mr-1.5"></span>Canceled
                    </span>
                </div>

                <div class="space-y-3 pt-3 border-t border-slate-100">
                    <div class="flex justify-between items-center text-xs">
                        <span class="text-slate-400">Event Date</span>
                        <span class="font-semibold text-slate-400 line-through">2026-10-10</span>
                    </div>
                    <div class="flex justify-between items-start text-xs">
                        <span class="text-slate-400 shrink-0 mr-4">Services</span>
                        <span class="font-medium text-slate-400 text-right line-through truncate max-w-[180px]" title="4-Hour DJ Set, Smoke Machine">4-Hour DJ Set, Smoke Machine</span>
                    </div>
                    <div class="flex justify-between items-center text-xs pt-1">
                        <span class="text-slate-400">Total Price</span>
                        <span class="text-sm font-extrabold text-slate-400 line-through">Rs. 45,000.00</span>
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 bg-slate-50/20 border-t border-slate-100 flex justify-center items-center h-[53px]">
                <span class="text-xs text-slate-400 font-medium">You canceled this booking</span>
            </div>
        </div> --}}

    </div>
</div>
@endsection

@section('customJS')
    <script
        src="{{ asset('controllers/customer-bookings.js') }}?v={{ filemtime(public_path('controllers/customer-bookings.js')) }}">
    </script>
@endsection
