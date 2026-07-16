<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

    @forelse ($providers as $provider)
        <div class="group bg-white border-2 border-amber-500/40 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:border-amber-500 transition duration-300 relative">

            <span class="absolute top-3 left-3 z-10 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-black text-[9px] uppercase tracking-wider px-2 py-0.5 rounded-full shadow-md">
                Featured
            </span>

            <div class="h-40 bg-slate-100 overflow-hidden relative">
                <img src="{{ $provider->cover_image ? asset('storage/' . $provider->cover_image) : asset('storage/images/photo.png') }}"
                     class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                     alt="Cover Image">
            </div>

            <div class="p-4 relative">
                <div class="absolute -top-8 right-3 h-12 w-12 rounded-full border-2 border-white bg-slate-200 overflow-hidden shadow-md">
                    <img src="{{ $provider->profile_picture ? asset('storage/' . $provider->profile_picture) : asset('storage/images/user.png') }}"
                         class="w-full h-full object-cover" alt="{{ $provider->name }}'s Profile Picture">
                </div>

                @php
                    $serviceList = explode(',', $provider->services);
                    $prices = explode(',',$provider->prices);
                    $descriptions = explode(',',$provider->descriptions);
                    $packageTypes = explode(',',$provider->package_names);
                    $bookingDtaes = explode(',',$provider->dates);
                    $serviceCount = count($serviceList);
                @endphp

                @if ($serviceCount > 1)
                    <div class="mt-2 overflow-hidden relative w-full ">
                        <div class="absolute inset-y-0 left-0 w-6 bg-gradient-to-r from-slate-50 to-transparent z-10 pointer-events-none"></div>
                        <div class="absolute inset-y-0 right-0 w-6 bg-gradient-to-l from-slate-50 to-transparent z-10 pointer-events-none"></div>

                        <div class="animate-marquee gap-2">
                            @php
                                $doubleServices = array_merge($serviceList, $serviceList);
                            @endphp

                            @foreach ($doubleServices as $service)
                                <span class="inline-block bg-white text-amber-700 text-[9px] px-2.5 py-0.5 rounded-md font-bold border border-amber-200/70 uppercase tracking-wide whitespace-nowrap shadow-sm mx-0.5">
                                    {{ trim($service) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="mt-2 flex flex-wrap gap-1.5">
                        @foreach ($serviceList as $service)
                            <span class="inline-block bg-amber-50 text-amber-700 text-[9px] px-2.5 py-0.5 rounded-md font-bold border border-amber-200/60 uppercase tracking-wide">
                                {{ trim($service) }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <h4 class="text-sm font-bold text-slate-900 mt-2 truncate pr-10">
                    {{ $provider->group_name ?? $provider->name }}
                </h4>

                <div class="flex items-center space-x-3 mt-2 text-[11px] text-slate-500">
                    <span class="flex items-center">
                        <svg class="w-3 h-3 text-slate-400 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        </svg>
                        {{ $provider->city }}
                    </span>
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
                    <button class="px-3 py-1.5 text-[11px] font-bold rounded-xl bg-slate-900 text-white hover:bg-amber-500 hover:text-slate-950 transition duration-200 no-underline btnViewProfile"
                            data-name="{{ $provider->name }}"
                            data-groupname="{{ $provider->group_name }}"
                            data-mobile="{{ $provider->mobile }}"
                            data-profilepic="{{ $provider->profile_picture ? asset('storage/' . $provider->profile_picture) : asset('storage/images/user.png') }}"
                            data-coverimage="{{ $provider->cover_image ? asset('storage/' . $provider->cover_image) : asset('storage/images/photo.png') }}"
                            data-services="{{ json_encode($serviceList) }}"
                            data-descriptions="{{ json_encode($descriptions) }}"
                            data-prices="{{ json_encode($prices) }}"
                            data-packageTypes="{{ json_encode($packageTypes) }}"
                            data-providerid="{{ $provider->id }}"
                            data-bookingdates="{{ json_encode($bookingDtaes) }}">
                        View Profile
                    </button>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full bg-white border border-slate-200 rounded-2xl p-12 text-center shadow-sm">
            <div class="text-slate-300 text-4xl mb-2">🔍</div>
            <p class="text-slate-500 font-bold text-sm">No providers found matching your filters!</p>
            <p class="text-slate-400 text-xs mt-1">Try tweaking your keyword search or category options.</p>
        </div>
    @endforelse

</div>
