@extends('layout.master')

@section('customCSS')
<style>
    .error {
        color: #ef4444 !important;
        font-size: 1rem !important;
        display: block !important;
        margin-top: 0.25rem !important;
        font-weight: 600 !important;
    }
    input.error, select.error, textarea.error {
        border-color: #ef4444 !important;
    }
    input.error:focus, select.error:focus, textarea.error:focus {
        box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.5) !important;
    }
</style>
@endsection

@section('content')
<div class="min-h-screen bg-cover bg-center bg-no-repeat flex flex-col items-center justify-center p-6 relative"
     style="background-image: url('{{ asset('storage/images/Kandy Esala Perahera.jpg') }}');">

    <div class="absolute inset-0 bg-gray-950/20 z-0"></div>

    <div class="w-full max-w-2xl bg-white/40 backdrop-blur-md rounded-3xl shadow-2xl border border-white/40 p-8 transition-all duration-300 relative z-10">

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
            
            <div class="pt-4 mt-6 border-t border-white/40 space-y-6">
                <div class="bg-indigo-950/10 p-4 rounded-xl border border-white/30">
                    <h3 class="text-md font-extrabold text-indigo-900 mb-1">Service Professional Information</h3>
                    <p class="text-xs text-gray-900 font-bold">Provide details about the services you offer.</p>
                </div>

                <div>
                    <label for="category" class="block text-sm font-bold text-gray-900 mb-2">Service Category</label>
                    <select id="cmbCategory" name="cmbCategory" required
                        class="w-full px-4 py-3 rounded-xl border border-white/50 focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition duration-200 shadow-sm bg-white/60 text-gray-950 font-semibold pr-10">
                        <option value="" disabled selected class="text-gray-600">Select your service</option>
                        <option value="1">Asthaka (අෂ්ටක)</option>
                        <option value="2">Poruwa Decoration (පෝරුව ඩෙකරේෂන්)</option>
                        <option value="3">Traditional Dancing (උඩරට නැටුම්)</option>
                        <option value="4">Photography (ඡායාරූපකරණය)</option>
                    </select>
                </div>

                <div>
                    <label for="serviceArea" class="block text-sm font-bold text-gray-900 mb-2">Service Areas</label>
                    <textarea id="txtServiceArea" name="txtServiceArea" rows="3" required
                        class="w-full px-4 py-3 rounded-xl border border-white/50 focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition duration-200 shadow-sm placeholder-gray-600 bg-white/60 text-gray-950 font-semibold"
                        placeholder="e.g., Kandy, Colombo, Matale"></textarea>
                </div>
            </div>

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
    <script src="{{ asset('controllers/user-profile.js') }}?v={{ filemtime(public_path('controllers/user-profile.js')) }}"></script>
    <script>const isServiceProvider = {{ Auth::user()->is_provider ?? 0 }};</script>
@endsection
