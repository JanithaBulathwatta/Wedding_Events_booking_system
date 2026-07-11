@extends('layout.master')

@section('customCSS')
@endsection

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">My Bookings</h1>
            <p class="text-xs text-slate-500 mt-1">Track and manage your event bookings and approvals.</p>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-xs font-bold text-slate-600 uppercase tracking-wider">
                        <th class="px-6 py-4">Provider / Business Name</th>
                        <th class="px-6 py-4">Event Date</th>
                        <th class="px-6 py-4">Selected Services</th>
                        <th class="px-6 py-4">Total Price</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 text-sm text-slate-700">

                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-slate-900">Janitha Photography</div>
                            <span class="text-[10px] text-slate-400">ID: #BKG-9842</span>
                        </td>
                        <td class="px-6 py-4 font-medium text-slate-600">2026-08-15</td>
                        <td class="px-6 py-4">
                            <span class="truncate max-w-[180px] block" title="Full Day Photography, Album Printing">Full Day Photography, Album Printing</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">Rs. 150,000.00</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold bg-amber-50 text-amber-700 rounded-full border border-amber-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5"></span>Pending
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button type="button" class="btn-cancel text-xs font-bold text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg transition" data-id="1">
                                Cancel Booking
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-slate-900">Magul Gedara Caterers</div>
                            <span class="text-[10px] text-slate-400">ID: #BKG-9721</span>
                        </td>
                        <td class="px-6 py-4 font-medium text-slate-600">2026-09-02</td>
                        <td class="px-6 py-4">
                            <span class="truncate max-w-[180px] block" title="Buffet Menu B, Welcome Drinks">Buffet Menu B, Welcome Drinks</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">Rs. 380,000.00</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold bg-emerald-50 text-emerald-700 rounded-full border border-emerald-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span>Approved
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <span class="text-xs text-slate-400 font-medium italic">Confirmed</span>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-slate-900">Grand Flora Decorations</div>
                            <span class="text-[10px] text-slate-400">ID: #BKG-9604</span>
                        </td>
                        <td class="px-6 py-4 font-medium text-slate-600">2026-08-20</td>
                        <td class="px-6 py-4">
                            <span class="truncate max-w-[180px] block" title="Poruwa Setup, Table Decors">Poruwa Setup, Table Decors</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">Rs. 95,000.00</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold bg-rose-50 text-rose-700 rounded-full border border-rose-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500 mr-1.5"></span>Rejected
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <span class="text-xs text-slate-400 font-medium">-</span>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/50 transition bg-slate-50/30">
                        <td class="px-6 py-4 opacity-70">
                            <div class="font-semibold text-slate-900 line-through">DJ Nalin & Sounds</div>
                            <span class="text-[10px] text-slate-400">ID: #BKG-9512</span>
                        </td>
                        <td class="px-6 py-4 font-medium text-slate-500 line-through">2026-10-10</td>
                        <td class="px-6 py-4 opacity-70">
                            <span class="truncate max-w-[180px] block line-through" title="4-Hour DJ Set, Smoke Machine">4-Hour DJ Set, Smoke Machine</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-400 line-through">Rs. 45,000.00</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold bg-slate-100 text-slate-600 rounded-full border border-slate-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-slate-400 mr-1.5"></span>Canceled
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <span class="text-xs text-slate-400 font-medium">-</span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('customJS')
@endsection
