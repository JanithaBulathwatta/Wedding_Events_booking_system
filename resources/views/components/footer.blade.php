<footer class="bg-slate-950 border-t border-amber-500/20 text-slate-400 relative overflow-hidden">
    <!-- ඉහළින්ම යන සිහින් රන්වන් ලයින් එකක් -->
    <div class="h-[2px] w-full bg-gradient-to-r from-transparent via-amber-500/40 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 pb-12 border-b border-slate-900">

            <!-- 👑 Column 1: Brand & About -->
            <div class="space-y-4 md:col-span-1">
                <div class="flex items-center space-x-3">
                    <!-- ඔයාගේ රවුම් ලෝගෝ එක මෙතනටත් ඔටෝ සෙට් වෙනවා -->
                    <div class="p-1 rounded-full bg-slate-900/40 border border-amber-500/20 shadow-md">
                        <img src="{{ asset('storage/images/Gemini_Generated_Image_7mjnvx7mjnvx7mjn-removebg-preview.png') }}"
                             alt="අෂ්ටක Logo"
                             class="w-10 h-10 object-contain rounded-full"
                             style="image-rendering: -webkit-optimize-contrast; image-rendering: crisp-edges;">
                    </div>
                    <span class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-amber-300 to-yellow-500" style="font-family: 'Noto Sans Sinhala', sans-serif;">
                        අෂ්ටක
                    </span>
                </div>
                <p class="text-sm leading-relaxed text-slate-400/80">
                    ඔබේ ජීවිතයේ වඩාත්ම වටිනා සහ සුන්දර මතකයන්, ඉහළම විශ්වාසනීයත්වයකින් යුතුව සැබෑ කරගැනීම සඳහා ලංකාවේ ප්‍රමුඛතම සේවාදායකයින් එකම වහලක් යටට පිරිනමන ප්ලැට්ෆෝමය.
                </p>
            </div>

            <!-- 🔗 Column 2: Quick Links -->
            <div>
                <h3 class="text-sm font-bold tracking-wider text-amber-400 uppercase mb-4">ප්‍රධාන පිටු</h3>
                <ul class="space-y-2 text-sm font-medium">
                    <li><a href="#" class="hover:text-amber-400 hover:translate-x-1 inline-block transition duration-200">මුල් පිටුව</a></li>
                    <li><a href="#" class="hover:text-amber-400 hover:translate-x-1 inline-block transition duration-200">සේවාවන් සොයන්න</a></li>
                    <li><a href="#" class="hover:text-amber-400 hover:translate-x-1 inline-block transition duration-200">අපි ගැන</a></li>
                    <li><a href="#" class="hover:text-amber-400 hover:translate-x-1 inline-block transition duration-200">සම්බන්ධ වන්න</a></li>
                </ul>
            </div>

            <!-- 🛠️ Column 3: Categories / Services -->
            <div>
                <h3 class="text-sm font-bold tracking-wider text-amber-400 uppercase mb-4">ජනප්‍රිය සේවාවන්</h3>
                <ul class="space-y-2 text-sm font-medium">
                    <li><a href="#" class="hover:text-amber-400 hover:translate-x-1 inline-block transition duration-200">ඡායාරූපකරණය (Photography)</a></li>
                    <li><a href="#" class="hover:text-amber-400 hover:translate-x-1 inline-block transition duration-200">මංගල ඇඳුම් නිර්මාණය</a></li>
                    <li><a href="#" class="hover:text-amber-400 hover:translate-x-1 inline-block transition duration-200">උත්සව ශාලා (Venues)</a></li>
                    <li><a href="#" class="hover:text-amber-400 hover:translate-x-1 inline-block transition duration-200">සැරසිලි (Decorations)</a></li>
                </ul>
            </div>

            <!-- ✉️ Column 4: Newsletter / Contact -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold tracking-wider text-amber-400 uppercase mb-4">සඳහා ලියාපදිංචි වන්න</h3>
                <p class="text-xs text-slate-400/80">අලුත්ම සේවාවන් සහ විශේෂ දීමනා පිළිබඳ තොරතුරු ඊමේල් මඟින් ලබාගන්න.</p>
                <form class="flex space-x-2">
                    <input type="email" placeholder="ඔබේ ඊමේල් ලිපිනය" class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-800 text-sm text-slate-200 placeholder-slate-500 focus:outline-none focus:border-amber-500/50 transition">
                    <button type="submit" class="p-2.5 rounded-xl bg-gradient-to-r from-amber-400 to-amber-500 text-slate-950 font-bold hover:from-amber-500 hover:to-amber-600 shadow-md shadow-amber-500/10 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </form>
            </div>

        </div>

        <!-- 底部 Bottom Bar: Copyright & Social Media Icons -->
        <div class="flex flex-col md:flex-row items-center justify-between pt-8 space-y-4 md:space-y-0 text-xs font-medium">

            <!-- Copyright Text -->
            <div class="text-slate-500">
                &copy; {{ date('Y') }} <span class="text-slate-400">අෂ්ටක</span>. All Rights Reserved. Built with Premium Quality.
            </div>

            <!-- 📱 Social Media Icons (Modern Border Circle Style) -->
            <div class="flex space-x-3">
                <!-- Facebook -->
                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full bg-slate-900 border border-slate-800 text-slate-400 hover:border-amber-500/50 hover:text-amber-400 transition duration-300">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.95z"/></svg>
                </a>
                <!-- Instagram -->
                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full bg-slate-900 border border-slate-800 text-slate-400 hover:border-amber-500/50 hover:text-amber-400 transition duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                </a>
                <!-- YouTube -->
                <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full bg-slate-900 border border-slate-800 text-slate-400 hover:border-amber-500/50 hover:text-amber-400 transition duration-300">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                </a>
            </div>

        </div>
    </div>
</footer>
