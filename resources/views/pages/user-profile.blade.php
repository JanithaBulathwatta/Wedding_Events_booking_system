@extends('layout.master')

@section('customCSS')
    <style>
        span.error {
            color: #ef4444 !important;
            font-size: 0.875rem !important;
            display: block !important;
            margin-top: 0.25rem !important;
            font-weight: 600 !important;
        }

        input.error,
        select.error,
        textarea.error {
            border-color: #ef4444 !important;
        }

        input.error:focus,
        select.error:focus,
        textarea.error:focus {
            box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.5) !important;
        }
    </style>
@endsection

@section('content')
    <div class="min-h-screen bg-cover bg-center bg-no-repeat flex flex-col items-center justify-center p-4 md:p-10 relative"
        style="background-image: url('{{ asset('storage/images/Kandy Esala Perahera.jpg') }}');">

        <div class="absolute inset-0 bg-gray-950/20 z-0"></div>

        <div
            class="w-full {{ $user->is_provider == 1 ? 'max-w-5xl' : 'max-w-xl' }} bg-white/40 backdrop-blur-md rounded-3xl shadow-2xl border border-white/40 p-6 md:p-8 transition-all duration-300 relative z-10">

            <div class="mb-6 text-center">
                <h2 class="text-3xl font-extrabold text-black tracking-tight">
                    Complete Your Profile
                </h2>
                <p class="mt-1 text-sm text-gray-900 font-semibold">
                    Please fill in the additional details to set up your account.
                </p>
            </div>

            <form id="frmProfileSetup" method="POST">
                @csrf

                <div
                    class="{{ $user->is_provider == 1 ? 'grid grid-cols-1 md:grid-cols-2 gap-6 items-start' : 'space-y-5' }}">

                    <div
                        class="space-y-5 {{ $user->is_provider == 1 ? 'bg-white/30 p-5 rounded-2xl border border-white/20 shadow-sm' : '' }}">
                        @if ($user->is_provider == 1)
                            <h3 class="text-md font-extrabold text-gray-950 border-b border-white/40 pb-2">Personal
                                Information</h3>
                        @endif

                        <div>
                            <label for="fullName" class="block text-sm font-bold text-gray-900 mb-1">Full Name</label>
                            <input type="text" id="txtFullName" name="txtFullName" required
                                class="w-full px-4 py-2.5 rounded-xl border border-white/50 focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition duration-200 shadow-sm placeholder-gray-600 bg-white/60 text-gray-950 font-semibold"
                                placeholder="John Doe" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-bold text-gray-900 mb-1">Address</label>
                            <input type="text" id="txtAddress" name="txtAddress" required
                                class="w-full px-4 py-2.5 rounded-xl border border-white/50 focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition duration-200 shadow-sm placeholder-gray-600 bg-white/60 text-gray-950 font-semibold"
                                placeholder="No. 123, Main Street, Kandy">
                        </div>

                        <div>
                            <label for="mobile" class="block text-sm font-bold text-gray-900 mb-1">Mobile Number</label>
                            <input type="tel" id="txtMobile" name="txtMobile" required
                                class="w-full px-4 py-2.5 rounded-xl border border-white/50 focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition duration-200 shadow-sm placeholder-gray-600 bg-white/60 text-gray-950 font-semibold"
                                placeholder="07XXXXXXXX">
                        </div>
                    </div>

                    @if ($user->is_provider == 1)
                        <div class="space-y-5 bg-white/40 p-5 rounded-2xl border border-white/30 shadow-sm">

                            <div class="bg-amber-500/10 p-3.5 rounded-xl border border-amber-500/20">
                                <h3 class="text-sm font-extrabold text-slate-900 mb-0.5">Service Professional Information
                                </h3>
                                <p class="text-[11px] text-slate-700 font-semibold">Provide details about your business and
                                    location.</p>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="cmbDistrict"
                                        class="block text-sm font-bold text-slate-900 mb-1">District</label>
                                    <select id="cmbDistrict" name="cmbDistrict" required
                                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition duration-200 shadow-sm bg-white text-slate-900 font-semibold text-sm">
                                        <option value="" disabled selected class="text-slate-400">Select District
                                        </option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="txtCity" class="block text-sm font-bold text-slate-900 mb-1">City /
                                        Town</label>
                                    <input type="text" id="txtCity" name="txtCity" required
                                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition duration-200 shadow-sm placeholder-slate-400 bg-white text-slate-900 font-semibold text-sm"
                                        placeholder="e.g., Teldeniya">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-900 mb-1.5">Profile Type</label>
                                <div
                                    class="flex items-center gap-4 bg-slate-50/80 p-2.5 rounded-xl border border-slate-200">
                                    <label
                                        class="flex items-center space-x-2 text-xs text-slate-900 font-bold cursor-pointer">
                                        <input type="radio" name="profile_type" value="single" checked
                                            class="radio-provider w-4 h-4 text-amber-600 border-slate-300 focus:ring-0">
                                        <span>Individual</span>
                                    </label>
                                    <label
                                        class="flex items-center space-x-2 text-xs text-slate-900 font-bold cursor-pointer">
                                        <input type="radio" name="profile_type" value="group"
                                            class="radio-provider w-4 h-4 text-amber-600 border-slate-300 focus:ring-0">
                                        <span>Group / Company</span>
                                    </label>
                                </div>
                            </div>

                            <div id="group-name-wrapper" class="hidden transition-all duration-300">
                                <label for="txtGroupName" class="block text-sm font-bold text-slate-900 mb-1">Group /
                                    Business Name</label>
                                <input type="text" id="txtGroupName" name="txtGroupName"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition duration-200 shadow-sm placeholder-slate-400 bg-white text-slate-900 font-semibold text-sm"
                                    placeholder="Enter company name">
                            </div>

                            <div>
                                <label for="fileProfilePic" class="block text-sm font-bold text-slate-900 mb-1">Profile
                                    Picture</label>
                                <div class="flex items-center justify-center w-full">
                                    <label for="fileProfilePic"
                                        class="flex flex-col items-center justify-center w-full h-24 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50/90 hover:bg-slate-100 transition">
                                        <div class="flex flex-col items-center justify-center pt-2 pb-2 text-center px-2">
                                            <svg class="w-6 h-6 mb-1 text-slate-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="text-xs text-slate-600"><span class="font-bold text-amber-700">Click
                                                    to upload</span></p>
                                        </div>
                                        <input id="fileProfilePic" name="fileProfilePic" type="file" accept="image/*"
                                            class="hidden image-uploader" data-target-preview="#file-name-preview"
                                            data-target-img="#img-preview" data-target-text="#file-name-text" />
                                    </label>
                                </div>

                                <div id="file-name-preview"
                                    class="items-center justify-between gap-3 mt-2 hidden w-full border border-slate-200 rounded-xl p-2 bg-white shadow-sm">
                                    <div class="flex items-center gap-2">
                                        <img id="img-preview" src=""
                                            class="w-10 h-10 rounded-lg object-cover border border-slate-200"
                                            alt="Preview">
                                        <div class="max-w-[150px]">
                                            <p class="text-[10px] font-medium text-slate-500">Selected:</p>
                                            <p id="file-name-text" class="text-xs font-bold text-slate-900 truncate"></p>
                                        </div>
                                    </div>
                                    <button type="button"
                                        class="btn-remove-preview text-red-500 hover:text-red-700 font-bold text-sm p-1.5 hover:bg-red-50 rounded-lg transition duration-200"
                                        data-input="#fileProfilePic" data-preview="#file-name-preview"
                                        data-img="#img-preview" data-text="#file-name-text">
                                        ✕
                                    </button>
                                </div>
                            </div>
                            <div>
                                <label for="fileCoverPic" class="block text-sm font-bold text-slate-900 mb-1">Cover
                                    Picture</label>
                                <div class="flex items-center justify-center w-full">
                                    <label for="fileCoverPic"
                                        class="flex flex-col items-center justify-center w-full h-24 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50/90 hover:bg-slate-100 transition">
                                        <div class="flex flex-col items-center justify-center pt-2 pb-2 text-center px-2">
                                            <svg class="w-6 h-6 mb-1 text-slate-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="text-xs text-slate-600"><span class="font-bold text-amber-700">Click
                                                    to upload Cover</span></p>
                                        </div>
                                        <input id="fileCoverPic" name="fileCoverPic" type="file" accept="image/*" class="hidden image-uploader"
                                            data-target-preview="#cover-name-preview" data-target-img="#cover-img-preview" data-target-text="#cover-name-text" />
                                    </label>
                                </div>

                                <div id="cover-name-preview"
                                    class="items-center justify-between gap-3 mt-2 hidden w-full border border-slate-200 rounded-xl p-2 bg-white shadow-sm">
                                    <div class="flex items-center gap-2">
                                        <img id="cover-img-preview" src=""
                                            class="w-10 h-10 rounded-lg object-cover border border-slate-200"
                                            alt="Cover Preview">
                                        <div class="max-w-[150px]">
                                            <p class="text-[10px] font-medium text-slate-500">Selected Cover:</p>
                                            <p id="cover-name-text" class="text-xs font-bold text-slate-900 truncate"></p>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-remove-preview text-red-500 hover:text-red-700 font-bold text-sm p-1.5 hover:bg-red-50 rounded-lg transition duration-200"
                                            data-input="#fileCoverPic" data-preview="#cover-name-preview" data-img="#cover-img-preview" data-text="#cover-name-text">
                                        ✕
                                    </button>
                                </div>
                            </div>

                        </div>
                    @endif

                </div>

                <div class="pt-6 mt-2 max-w-xs mx-auto">
                    <button type="submit" id="btnSubmitProfile"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-xl shadow-lg hover:shadow-indigo-500/30 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-200 transform active:scale-[0.98]">
                        Save & Continue
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('customJS')
    <script src="{{ asset('controllers/user-profile.js') }}?v={{ filemtime(public_path('controllers/user-profile.js')) }}">
    </script>
    <script>
        const isServiceProvider = {{ Auth::user()->is_provider ?? 0 }};
    </script>
@endsection
