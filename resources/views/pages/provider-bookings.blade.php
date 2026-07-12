@extends('layout.provider')

@section('customCSS')
@endsection

@section('content')
    <div class="p-6 max-w-7xl mx-auto space-y-6">

        <div class="flex-1 p-6 border-b md:border-b-0 md:border-r border-slate-100">
            <div class="bg-white rounded-2xl p-4 border border-slate-200/60 shadow-sm">
                <div class="flex items-center gap-2 mb-3">
                    <span class="w-2 h-2 rounded-full bg-red-600"></span>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-700">Already Booked Bate
                    </h3>
                </div>

                <div id="bookingCalendar" class="text-xs"></div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row md:items-center md:justify-between border-b border-slate-100 pb-5">
            <div>
                <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Booking Requests</h1>
                <p class="text-sm text-slate-500 mt-1">Manage and track your customer service orders.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6">

            @foreach ($bookings as $booking)
                <div
                    class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-200 flex flex-col lg:flex-row justify-between gap-6">

                    <div class="space-y-4 flex-1">
                        <div class="flex items-center space-x-3">
                            <div
                                class="h-10 w-10 rounded-full bg-amber-500/10 flex items-center justify-center text-amber-600 font-bold text-sm">
                                {{ substr($booking->full_name, 0, 1) }}
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-800 text-base">{{ $booking->full_name }}</h3>
                                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-slate-500 mt-0.5">
                                    <span><i class="fa-solid fa-phone mr-1"></i> {{ $booking->mobile }}</span>
                                    <span><i class="fa-solid fa-location-dot mr-1"></i> {{ $booking->address }}</span>
                                    <span><i class="fa-solid fa-calendar-days mr-1"></i> Booked Date:
                                        <b>{{ $booking->booking_date }}</b></span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-slate-50/80 border border-slate-100 rounded-xl p-4">
                            <span class="text-xs font-semibold uppercase tracking-wider text-slate-400 block mb-2">Requested
                                Services</span>
                            @php
                                $services = json_decode($booking->services, true) ?? [];
                            @endphp
                            <div class="flex flex-wrap gap-2">
                                @foreach ($services as $service)
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-medium bg-white border border-slate-200 text-slate-700 shadow-sm">
                                        {{ $service['serviceName'] }} : {{ $service['packageType'] }} - Rs.
                                        {{ number_format($service['price'] ?? 0), 2 }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex flex-col justify-between items-end min-w-[200px] border-t lg:border-t-0 pt-4 lg:pt-0 border-slate-100">
                        <div class="flex lg:flex-col items-center lg:items-end justify-between w-full gap-2">
                            <div id="badgeHandler-{{ $booking->id }}">

                            </div>
                            <div class="lg:mt-2 text-right">
                                <span class="text-xs text-slate-400 block">Total Price</span>
                                <span class="text-xl font-bold text-slate-800">Rs. {{ $booking->total_price ?? 0 }}</span>
                            </div>
                        </div>

                        <div class="flex space-x-2 w-full lg:w-auto mt-4 lg:mt-0 btnHandler"
                            id="btnHandler-{{ $booking->id }}" data-status = "{{ $booking->status }}"
                            data-id = "{{ $booking->id }}" data-date = "{{ $booking->booking_date }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('customJS')
    <script
        src="{{ asset('controllers/provider-bookings.js') }}?v={{ filemtime(public_path('controllers/provider-bookings.js')) }}">
    </script>
@endsection
