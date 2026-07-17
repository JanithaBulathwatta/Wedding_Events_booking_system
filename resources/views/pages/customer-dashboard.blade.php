@extends('layout.master')

@section('customCSS')
    <style>
        @keyframes marquee {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 15s linear infinite;
        }

        .animate-marquee:hover {
            animation-play-state: paused;
        }

        .fc .fc-highlight {
            background: #22c55e !important;
            opacity: 1 !important;
        }


        .fc-daygrid-day:has(.fc-highlight) .fc-daygrid-day-number {
            color: #ffffff !important;
            font-weight: bold !important;
        }

    </style>

@endsection

@section('content')
    <div class="bg-slate-50 min-h-screen text-slate-800 font-sans pb-12">
        <div class="relative bg-white py-12 px-4 sm:px-6 lg:px-8 text-center overflow-hidden bg-cover bg-center transition-all duration-1000 ease-in-out min-h-[250px] flex items-center justify-center"
            style="background-image: url('{{ asset('storage/images/wed1.jpg') }}');">
            <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-[2px]"></div>
            <div
                class="absolute inset-0 bg-[radial-gradient(circle_at_top,_var(--tw-gradient-stops))] from-amber-500/5 via-transparent to-transparent">
            </div>

            <div class="relative max-w-3xl mx-auto z-10">
                <h1 class="text-3xl font-black tracking-tight text-white sm:text-4xl drop-shadow-md">
                    To the wedding of your dreams <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-amber-500 to-yellow-500">Best
                        services</span>
                </h1>
                <p class="mt-3 text-xs text-slate-200 max-w-xl mx-auto font-medium drop-shadow-sm">
                    Find Sri Lanka's best photographers, caterers and wedding planners in one place.
                </p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-3 mb-8">
            <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 items-end">

                    <!-- Search Input -->
                    <div>
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-1.5">Keyword Search</label>
                    <div class="relative">
                        <input type="text" id="txtSearch" placeholder="Search provider name..."
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-4 pr-10 py-2 text-xs text-slate-700 focus:border-amber-500/50 focus:ring-2 focus:ring-amber-500/10 focus:outline-none transition">
                    </div>
                </div>

                    <!-- Category Dropdown -->
                    <div>
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-1.5">Service
                            Category</label>
                        <select
                            id="cmbCategory" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-xs text-slate-700 focus:border-amber-500/50 focus:ring-2 focus:ring-amber-500/10 focus:outline-none transition">
                            <option value="">All Categories</option>
                            @foreach ($serviceTypes as $serviceType)
                                <option value="{{ $serviceType->id }}">{{ $serviceType->display_name_si }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Location Dropdown -->
                    <div>
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-1.5">Location
                            (District)</label>
                        <select
                            id = "cmbDistricts" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-xs text-slate-700 focus:border-amber-500/50 focus:ring-2 focus:ring-amber-500/10 focus:outline-none transition">
                            <option value="">All Districts</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-center justify-between mb-6">
                <p class="text-xs text-slate-500">
                    Showing <span class="text-slate-900 font-bold"> {{ count($providers) }} </span> verified providers
                </p>
            </div>

            <div id="providersContainer" class="transition-opacity duration-200 w-full">
                @include('partials.providers_list')
            </div>

            {{-- <div class="text-center mt-8">
                <button id="btnLoadMore" data-page="1" class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 px-6 rounded-xl text-xs transition shadow-md shadow-amber-500/20">
                    Load More Verified Providers
                </button>
            </div> --}}
        </div>
    </div>

    {{-- modal --}}
    <div id="bookingModal"
        class="fixed inset-0 z-[1000] hidden overflow-y-auto bg-slate-900/60 backdrop-blur-sm items-center justify-center p-4">

        <div
            class="bg-white rounded-3xl shadow-2xl border border-slate-100 w-full max-w-7xl h-[90vh] flex flex-col overflow-hidden animate-in fade-in zoom-in-95 duration-200">

            <div class="absolute top-4 right-4 z-50">
                <button type="button" id="btnCloseModal"
                    class="w-8 h-8 rounded-full bg-white/80 backdrop-blur-md text-slate-700 hover:bg-slate-100 flex items-center justify-center shadow-md transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="relative h-44 bg-slate-100 shrink-0">
                <img src=""
                    class="w-full h-full object-cover" id="imgCoverImage">

                <div class="absolute -bottom-10 left-8 flex items-end gap-4 z-10">
                    <img src=""
                        class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg" id="imgProfileImage">
                    <div class="mb-2 bg-white/90 backdrop-blur-md px-3 py-1 rounded-xl border border-white/20 shadow-sm">
                        <h2 class="text-base font-black text-slate-800" id="txtProviderName"></h2>
                        <p class="text-[11px] text-amber-600 font-bold flex items-center gap-1" id="txtMobile"></p>
                    </div>
                </div>

                <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-slate-900/40 to-transparent"></div>
            </div>

            <div class="flex-1 overflow-y-auto flex flex-col md:flex-row bg-slate-50/50 pt-12">

                <div class="flex-1 p-6 border-b md:border-b-0 md:border-r border-slate-100">
                    <div class="bg-white rounded-2xl p-4 border border-slate-200/60 shadow-sm">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-700">Select an Available Date
                            </h3><br>
                            <span class="w-2 h-2 rounded-full bg-red-600"></span>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-700">Already Booked Bate
                            </h3>
                        </div>

                        <div id="providerCalendar" class="text-xs"></div>
                    </div>
                </div>

                <div class="w-full md:w-[380px] p-6 flex flex-col justify-between gap-6 shrink-0 bg-white">

                    <div class="space-y-4">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-700">Select Service</h3>
                        </div>

                        <div class="space-y-2.5 max-h-[220px] overflow-y-auto pr-1" id="servicesList">

                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-100 space-y-4">
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-400 font-medium">Selected Date:</span>
                            <span id="txtSelectedDateDisplay"
                                class="font-bold text-slate-700 bg-slate-100 px-2.5 py-1 rounded-lg">None</span>
                        </div>

                        <form id="frmConfirmBooking" method="">
                            @csrf
                            <input type="hidden" name="provider_id" id="hidProviderId" >
                            <input type="hidden" name="service_name" id="hidServiceName">
                            <input type="hidden" name="booking_date" id="hidBookingDate">
                            <input type="hidden" name="hdnAllBookingDates" id="hdnAllBookingDates">
                            @auth
                                <button id="btnSubmitBooking" disabled
                                    class="w-full bg-slate-200 text-slate-400 font-bold text-xs py-3 rounded-xl transition duration-200 cursor-not-allowed uppercase tracking-wider shadow-md">
                                    Confirm Booking
                                </button>
                            @else
                                <div class="p-6 text-center">
                                    <a href="{{ route('login') }}" class="inline-block bg-gradient-to-r from-amber-400 to-amber-500 text-slate-950 font-bold px-6 py-2.5 rounded-xl text-xs">
                                        Login to Book Now
                                    </a>
                                </div>
                            @endauth

                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection

@section('customJS')
    <script
        src="{{ asset('controllers/customer-dashboard.js') }}?v={{ filemtime(public_path('controllers/customer-dashboard.js')) }}">
    </script>
    <script>
        window.dashboardFilterUrl = "{{ route('customer.dashboard') }}";
    </script>
@endsection
