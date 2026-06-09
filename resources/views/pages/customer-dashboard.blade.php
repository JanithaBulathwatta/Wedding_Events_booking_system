@extends('layout.master')

@section('customCSS')
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

        <!-- 📦 3. Main Results Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Results Counter & Sorting -->
            <div class="flex items-center justify-between mb-6">
                <p class="text-xs text-slate-500">Showing <span class="text-slate-900 font-bold">12</span> verified
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

            <!-- 🛍️ Providers Grid (දැන් Sidebar එක නැති නිසා එක පේළියට ලස්සනට Cards 4ක් පේනවා - grid-cols-4) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                <!-- 🎴 Card 1 (Featured Example) -->
                <div
                    class="group bg-white border-2 border-amber-500/40 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:border-amber-500 transition duration-300 relative">
                    <span
                        class="absolute top-3 left-3 z-10 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-black text-[9px] uppercase tracking-wider px-2 py-0.5 rounded-full shadow-md">
                        Featured
                    </span>

                    <div class="h-40 bg-slate-100 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1537633552985-df8429e8048b?q=80&w=600&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                            alt="Cover Image">
                    </div>

                    <div class="p-4 relative">
                        {{-- <div class="absolute -top-8 right-3 h-12 w-12 rounded-full border-2 border-white bg-slate-200 overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=100&auto=format&fit=crop" class="w-full h-full object-cover">
                    </div> --}}

                        <p class="text-[10px] font-bold text-amber-600 uppercase tracking-wider">Photography</p>
                        <h4 class="text-sm font-bold text-slate-900 mt-0.5 truncate pr-10">JB Photography</h4>

                        <div class="flex items-center space-x-3 mt-2 text-[11px] text-slate-500">
                            <span class="flex items-center">
                                <svg class="w-3 h-3 text-slate-400 mr-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                Kandy
                            </span>
                            <span class="flex items-center text-amber-500 font-bold">
                                ⭐ 4.9 <span class="text-slate-400 font-normal ml-0.5">(42)</span>
                            </span>
                        </div>

                        <div class="border-t border-slate-100 my-3"></div>

                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">Starting From</p>
                                <p class="text-sm font-black text-slate-900">Rs. 65,000</p>
                            </div>
                            <a href="#"
                                class="px-3 py-1.5 text-[11px] font-bold rounded-xl bg-slate-900 text-white hover:bg-amber-500 hover:text-slate-950 transition duration-200">
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 🎴 Card 2 (Normal Example) -->
                <div
                    class="group bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:border-slate-300 transition duration-300 relative">
                    <div class="h-40 bg-slate-100 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=600&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                            alt="Cover Image">
                    </div>
                    <div class="p-4 relative">
                        <div
                            class="absolute -top-8 right-3 h-12 w-12 rounded-full border-2 border-white bg-slate-200 overflow-hidden shadow-md">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=100&auto=format&fit=crop"
                                class="w-full h-full object-cover">
                        </div>
                        <p class="text-[10px] font-bold text-amber-600/90 uppercase tracking-wider">Catering Services</p>
                        <h4 class="text-sm font-bold text-slate-900 mt-0.5 truncate pr-10">Royal Taste</h4>
                        <div class="flex items-center space-x-3 mt-2 text-[11px] text-slate-500">
                            <span class="flex items-center">
                                <svg class="w-3 h-3 text-slate-400 mr-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                Colombo
                            </span>
                            <span class="flex items-center text-amber-500 font-bold">
                                ⭐ 4.7 <span class="text-slate-400 font-normal ml-0.5">(18)</span>
                            </span>
                        </div>
                        <div class="border-t border-slate-100 my-3"></div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">Starting From</p>
                                <p class="text-sm font-black text-slate-900">Rs. 1,200<span
                                        class="text-[10px] text-slate-400 font-normal">/pp</span></p>
                            </div>
                            <a href="#"
                                class="px-3 py-1.5 text-[11px] font-bold rounded-xl bg-slate-100 text-slate-800 hover:bg-amber-500 hover:text-slate-950 transition duration-200">
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>

                <!-- (Foreach loop එකෙන් අනිත් Cards ටික ඔටෝ රෙන්ඩර් වෙයි මචං) -->

            </div>
        </div>
    </div>
@endsection

@section('customJS')
    <script
        src="{{ asset('controllers/customer-dashboard.js') }}?v={{ filemtime(public_path('controllers/customer-dashboard.js')) }}">
    </script>
@endsection
