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

    </style>

@endsection

@section('content')
    <div class="bg-slate-50 min-h-screen text-slate-800 font-sans pb-12">
        <div class="relative bg-white py-12 px-4 sm:px-6 lg:px-8 text-center overflow-hidden bg-cover bg-center transition-all duration-1000 ease-in-out min-h-[250px] flex items-center justify-center rounded-b-3xl"
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

        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 mb-8">
            <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 items-end">

                    <!-- Search Input -->
                    {{-- <div>
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-1.5">Keyword Search</label>
                    <div class="relative">
                        <input type="text" placeholder="Search provider name..."
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-4 pr-10 py-2 text-xs text-slate-700 focus:border-amber-500/50 focus:ring-2 focus:ring-amber-500/10 focus:outline-none transition">
                    </div>
                </div> --}}

                    <!-- Category Dropdown -->
                    <div>
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-1.5">Service
                            Category</label>
                        <select
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-xs text-slate-700 focus:border-amber-500/50 focus:ring-2 focus:ring-amber-500/10 focus:outline-none transition">
                            <option value="">All Categories</option>
                            <option value="photography">Photography & Videography</option>
                            <option value="catering">Catering & Food</option>
                            <option value="decorating">Decorating & Flora</option>
                            <option value="costume">Dress Designing & Makeup</option>
                        </select>
                    </div>

                    <!-- Location Dropdown -->
                    <div>
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-1.5">Location
                            (District)</label>
                        <select
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-xs text-slate-700 focus:border-amber-500/50 focus:ring-2 focus:ring-amber-500/10 focus:outline-none transition">
                            <option value="">All Districts</option>
                            <option value="kandy">Kandy</option>
                            <option value="colombo">Colombo</option>
                            <option value="galle">Galle</option>
                            <option value="jaffna">Jaffna</option>
                        </select>
                    </div>

                    <!-- Budget Dropdown -->
                    {{-- <div>
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-1.5">Budget Range</label>
                    <select class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-xs text-slate-700 focus:border-amber-500/50 focus:ring-2 focus:ring-amber-500/10 focus:outline-none transition">
                        <option value="">Any Budget</option>
                        <option value="under_50">Below Rs. 50,000</option>
                        <option value="50_100">Rs. 50,000 - Rs. 100,000</option>
                        <option value="above_100">Above Rs. 100,000</option>
                    </select>
                </div> --}}

                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-center justify-between mb-6">
                <p class="text-xs text-slate-500">Showing <span class="text-slate-900 font-bold">
                        {{ count($providers) }}
                    </span> verified
                    providers</p>
                <div class="flex items-center space-x-2">
                    <button class="text-xs text-amber-600 font-bold hover:underline mr-2">Clear Filters</button>
                    <select
                        class="bg-white border border-slate-200 rounded-xl px-3 py-1.5 text-xs text-slate-600 focus:outline-none shadow-sm">
                        <option>Sort by: Featured</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @foreach ($providers as $provider)
                    <div
                        class="group bg-white border-2 border-amber-500/40 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:border-amber-500 transition duration-300 relative">

                        <span
                            class="absolute top-3 left-3 z-10 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-black text-[9px] uppercase tracking-wider px-2 py-0.5 rounded-full shadow-md">
                            Featured
                        </span>

                        <div class="h-40 bg-slate-100 overflow-hidden relative">
                            <img src="{{ $provider->cover_image ? asset('storage/' . $provider->cover_image) : asset('storage/images/photo.png') }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                alt="Cover Image">
                        </div>

                        <div class="p-4 relative">
                            <div
                                class="absolute -top-8 right-3 h-12 w-12 rounded-full border-2 border-white bg-slate-200 overflow-hidden shadow-md">
                                <img src="{{ $provider->profile_picture ? asset('storage/' . $provider->profile_picture) : asset('storage/images/user.png') }}"
                                    class="w-full h-full object-cover" alt="{{ $provider->name }}'s Profile Picture">
                            </div>

                            @php
                                $serviceList = explode(',', $provider->services);
                                $serviceCount = count($serviceList);
                            @endphp

                            @if ($serviceCount > 1)
                                <div class="mt-2 overflow-hidden relative w-full ">
                                    <div
                                        class="absolute inset-y-0 left-0 w-6 bg-gradient-to-r from-slate-50 to-transparent z-10 pointer-events-none">
                                    </div>
                                    <div
                                        class="absolute inset-y-0 right-0 w-6 bg-gradient-to-l from-slate-50 to-transparent z-10 pointer-events-none">
                                    </div>

                                    <div class="animate-marquee gap-2">
                                        @php
                                            $doubleServices = array_merge($serviceList, $serviceList);
                                        @endphp

                                        @foreach ($doubleServices as $service)
                                            <span
                                                class="inline-block bg-white text-amber-700 text-[9px] px-2.5 py-0.5 rounded-md font-bold border border-amber-200/70 uppercase tracking-wide whitespace-nowrap shadow-sm mx-0.5">
                                                {{ trim($service) }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="mt-2 flex flex-wrap gap-1.5">
                                    @foreach ($serviceList as $service)
                                        <span
                                            class="inline-block bg-amber-50 text-amber-700 text-[9px] px-2.5 py-0.5 rounded-md font-bold border border-amber-200/60 uppercase tracking-wide">
                                            {{ trim($service) }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                            @if ($provider->group_name == null)
                                <h4 class="text-sm font-bold text-slate-900 mt-2 truncate pr-10">
                                    {{ $provider->name }}
                                </h4>
                            @else
                                <h4 class="text-sm font-bold text-slate-900 mt-2 truncate pr-10">
                                    {{ $provider->group_name }}
                                </h4>
                            @endif

                            <div class="flex items-center space-x-3 mt-2 text-[11px] text-slate-500">
                                <span class="flex items-center">
                                    <svg class="w-3 h-3 text-slate-400 mr-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    {{ $provider->city }} </span>
                                <span class="flex items-center text-amber-500 font-bold">
                                    ⭐ 4.9 <span class="text-slate-400 font-normal ml-0.5">(42)</span>
                                </span>
                            </div>

                            <div class="border-t border-slate-100 my-3"></div>

                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">Contact</p>
                                    <p class="text-sm font-black text-slate-900">{{ $provider->mobile }}</p>
                                </div>
                                <button
                                    class="px-3 py-1.5 text-[11px] font-bold rounded-xl bg-slate-900 text-white hover:bg-amber-500 hover:text-slate-950 transition duration-200 no-underline btnViewProfile"
                                    data-name = "{{ $provider->name }}" data-groupname = "{{ $provider->group_name }}" data-mobile = "{{ $provider->mobile }}"
                                    data-profilepic = "{{ $provider->profile_picture ? asset('storage/' . $provider->profile_picture) : asset('storage/images/user.png') }}"
                                    data-coverimage = "{{ asset('storage/' . $provider->cover_image) }}"
                                    >
                                    View Profile
                            </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div id="bookingModal"
        class="fixed inset-0 z-[1000] hidden overflow-y-auto bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">

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
                <img src="https://images.unsplash.com/photo-1542038784456-1ea8e935640e?q=80&w=1200"
                    class="w-full h-full object-cover" id="providerCover">

                <div class="absolute -bottom-10 left-8 flex items-end gap-4 z-10">
                    <img src=""
                        class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg" id="imgProfileImage">
                    <div class="mb-2 bg-white/90 backdrop-blur-md px-3 py-1 rounded-xl border border-white/20 shadow-sm">
                        <h2 class="text-base font-black text-slate-800" id="txtProviderName"></h2>
                        <p class="text-[11px] text-amber-600 font-bold flex items-center gap-1">⭐ 4.9 <span
                                class="text-slate-400 font-normal">(42 Reviews)</span></p>
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
                            <div class="service-card border border-slate-200 rounded-xl p-3 cursor-pointer transition hover:border-amber-500/50 flex justify-between items-center bg-slate-50/50"
                                data-price="65,000"
                                data-desc="සම්පූර්ණ විවාහ උත්සවයම ආවරණය වන පරිදි, Premium ඡායාරූප සහ Unlimited ඩිජිටල් කොපි ඇතුළත් වේ.">
                                <div>
                                    <h4 class="text-xs font-bold text-slate-800">Wedding Photography</h4>
                                    <p class="text-[10px] text-slate-400 mt-0.5">Full Day Coverage</p>
                                </div>
                                <span class="text-xs font-black text-slate-700">Rs. 65,000</span>
                            </div>

                            <div class="service-card border border-slate-200 rounded-xl p-3 cursor-pointer transition hover:border-amber-500/50 flex justify-between items-center bg-slate-50/50"
                                data-price="35,000"
                                data-desc="Pre-wedding Shoot එකක් සහ ලස්සන Mini-album එකක් ඇතුළත් වේ. පැය 5ක කාලයක් වෙන් කෙරේ.">
                                <div>
                                    <h4 class="text-xs font-bold text-slate-800">Pre-Wedding Shoot</h4>
                                    <p class="text-[10px] text-slate-400 mt-0.5">Outdoor Location</p>
                                </div>
                                <span class="text-xs font-black text-slate-700">Rs. 35,000</span>
                            </div>
                        </div>

                        <div id="serviceDetailsBox"
                            class="hidden bg-slate-50 border border-slate-100 rounded-2xl p-4 animate-in fade-in duration-300">
                            <h4 class="text-xs font-bold text-slate-800" id="selectedServiceName">Service Name</h4>
                            <p class="text-[11px] text-slate-400 mt-1 leading-relaxed" id="selectedServiceDesc">
                                Description text...</p>
                            <div class="flex justify-between items-center mt-3 pt-3 border-t border-slate-200/60">
                                <span class="text-[11px] text-slate-500 font-medium">Price:</span>
                                <span class="text-sm font-black text-amber-600" id="selectedServicePrice">Rs. 0</span>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-100 space-y-4">
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-400 font-medium">Selected Date:</span>
                            <span id="txtSelectedDateDisplay"
                                class="font-bold text-slate-700 bg-slate-100 px-2.5 py-1 rounded-lg">None</span>
                        </div>

                        <form id="frmConfirmBooking" action="/bookings/store" method="POST">
                            @csrf
                            <input type="hidden" name="provider_id" id="hidProviderId" value="1">
                            <input type="hidden" name="service_name" id="hidServiceName">
                            <input type="hidden" name="booking_date" id="hidBookingDate">

                            <button type="submit" id="btnSubmitBooking" disabled
                                class="w-full bg-slate-200 text-slate-400 font-bold text-xs py-3 rounded-xl transition duration-200 cursor-not-allowed uppercase tracking-wider shadow-md">
                                Confirm Booking
                            </button>
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
@endsection
