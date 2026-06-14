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
    <div class="min-h-screen bg-cover bg-center bg-no-repeat flex flex-col items-center justify-center p-6 relative"
        style="background-image: url('{{ asset('storage/images/Kandy Esala Perahera.jpg') }}');">

        <div class="absolute inset-0 bg-gray-950/20 z-0"></div>

        <div
            class="w-full max-w-2xl bg-white/40 backdrop-blur-md rounded-3xl shadow-2xl border border-white/40 p-8 transition-all duration-300 relative z-10">

            <div class="mb-8 text-center">
                <h2 class="text-3xl font-extrabold text-black tracking-tight">
                    Complete Your Profile
                </h2>
                <p class="mt-2 text-sm text-gray-900 font-semibold">
                    Please fill in the additional details to set up your account.
                </p>
            </div>

            <form id="frmProfileSetup" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="fullName" class="block text-sm font-bold text-gray-900 mb-2">Full Name</label>
                    <input type="text" id="txtFullName" name="txtFullName" required
                        class="w-full px-4 py-3 rounded-xl border border-white/50 focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition duration-200 shadow-sm placeholder-gray-600 bg-white/60 text-gray-950 font-semibold"
                        placeholder="John Doe" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
                </div>

                <div>
                    <label for="address" class="block text-sm font-bold text-gray-900 mb-2">Address</label>
                    <input type="text" id="txtAddress" name="txtAddress" required
                        class="w-full px-4 py-3 rounded-xl border border-white/50 focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition duration-200 shadow-sm placeholder-gray-600 bg-white/60 text-gray-950 font-semibold"
                        placeholder="No. 123, Main Street, Kandy">
                </div>

                <div>
                    <label for="mobile" class="block text-sm font-bold text-gray-900 mb-2">Mobile Number</label>
                    <input type="tel" id="txtMobile" name="txtMobile" required
                        class="w-full px-4 py-3 rounded-xl border border-white/50 focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition duration-200 shadow-sm placeholder-gray-600 bg-white/60 text-gray-950 font-semibold"
                        placeholder="07XXXXXXXX">
                </div>
                @if ($user->is_provider == 1)
                    <div class="pt-4 mt-6 border-t border-slate-200 space-y-6">

                        <div class="bg-amber-500/10 p-4 rounded-xl border border-amber-500/20">
                            <h3 class="text-md font-extrabold text-slate-900 mb-1">Service Professional Information</h3>
                            <p class="text-xs text-slate-600 font-medium">Provide details about your business and location.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="cmbDistrict"
                                    class="block text-sm font-bold text-slate-700 mb-2">District</label>
                                <select id="cmbDistrict" name="cmbDistrict" required
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition duration-200 shadow-sm bg-white text-slate-900 font-semibold">
                                    <option value="" disabled selected class="text-slate-400">Select District</option>

                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="txtCity" class="block text-sm font-bold text-slate-700 mb-2">City /
                                    Town</label>
                                <input type="text" id="txtCity" name="txtCity" required
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition duration-200 shadow-sm placeholder-slate-400 bg-white text-slate-900 font-semibold"
                                    placeholder="e.g., Teldeniya, Peradeniya">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-3">Profile Type</label>
                            <div class="flex items-center space-x-6 bg-slate-50 p-3 rounded-xl border border-slate-100">
                                <label class="flex items-center space-x-2 text-sm text-slate-700 font-bold cursor-pointer">
                                    <input type="radio" name="profile_type" value="single" checked
                                        class="radio-provider w-4 h-4 text-amber-600 border-slate-300 focus:ring-0">
                                    <span>Individual / Single</span>
                                </label>
                                <label class="flex items-center space-x-2 text-sm text-slate-700 font-bold cursor-pointer">
                                    <input type="radio" name="profile_type" value="group"
                                        class="radio-provider w-4 h-4 text-amber-600 border-slate-300 focus:ring-0">
                                    <span>Group / Band / Company</span>
                                </label>
                            </div>
                        </div>

                        <div id="group-name-wrapper" class="hidden transition-all duration-300">
                            <label for="txtGroupName" class="block text-sm font-bold text-slate-700 mb-2">Group / Business
                                Name</label>
                            <input type="text" id="txtGroupName" name="txtGroupName"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition duration-200 shadow-sm placeholder-slate-400 bg-white text-slate-900 font-semibold"
                                placeholder="Enter your group or company name">
                        </div>

                        <div>
                            <label for="fileProfilePic" class="block text-sm font-bold text-slate-700 mb-2">Profile
                                Picture</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="fileProfilePic"
                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-200 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100/50 transition">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-2 text-slate-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="text-xs text-slate-500"><span class="font-bold text-amber-600">Click to
                                                upload</span> or drag and drop</p>
                                        <p class="text-[10px] text-slate-400 mt-1">PNG, JPG or JPEG (Max. 2MB)</p>
                                    </div>
                                    <input id="fileProfilePic" name="fileProfilePic" type="file" accept="image/*"
                                        class="hidden" required />
                                </label>
                            </div>
                            <p id="file-name-preview" class="text-xs text-slate-500 mt-2 font-medium hidden">📍 Selected:
                                <span id="file-name-text" class="text-slate-900 font-bold"></span></p>
                        </div>

                    </div>
                @endif


                <div class="pt-4">
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
