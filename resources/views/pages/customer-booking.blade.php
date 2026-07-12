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
    </div>
    @if (count($bookings) == 0)
        <div class="w-full max-w-6xl bg-white border border-slate-200 rounded-2xl p-8 text-center shadow-sm mx-auto">
            <p class="text-slate-500">You haven't placed any bookings yet.</p>
        </div>
    @endif
</div>
@endsection

@section('customJS')
    <script
        src="{{ asset('controllers/customer-bookings.js') }}?v={{ filemtime(public_path('controllers/customer-bookings.js')) }}">
    </script>
@endsection
