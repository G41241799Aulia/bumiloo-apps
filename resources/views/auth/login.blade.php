<x-guest-layout>
    <div class="flex flex-col md:flex-row w-full max-w-4xl rounded-[24px] shadow-2xl overflow-hidden min-h-[550px] border border-pink-200" style="background-color: #FFF0F3;">
        
        <div class="w-full md:w-5/12 relative flex items-center justify-end overflow-hidden" 
             style="background-color: #FF93BF; background-image: url('{{ asset('images/background.jpeg') }}'); background-size: cover; background-position: center;">
            
            <div class="relative z-10 flex flex-col items-center justify-center space-y-12 w-[160px] h-full transition-all duration-500 ease-in-out">
                
                <a href="{{ route('register') }}" class="text-white font-bold text-lg opacity-80 hover:opacity-100 transform hover:scale-105 transition-all duration-300">
                    Register
                </a>
                
                <div class="tab-login-custom text-gray-900 w-full py-4 rounded-l-[30px] flex items-center justify-center font-bold text-xl translate-x-4 transition-all duration-500 ease-out" 
                     style="background-color: #FFF0F3;">
                    Login
                </div>

            </div>
        </div>

        <div class="w-full md:w-7/12 p-12 md:p-16 flex flex-col justify-center" style="background-color: #FFF0F3;">
            <h2 class="text-4xl font-bold text-gray-800 mb-10 tracking-tight">LOGIN</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1 ml-1">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">📧</span>
                        <input type="email" name="email" required class="w-full pl-12 pr-4 py-3 border border-pink-200 bg-white rounded-[18px] focus:border-pink-400 focus:ring-0 outline-none transition-all duration-300 shadow-sm shadow-pink-50" placeholder="Masukkan email Anda">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1 ml-1">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">🔒</span>
                        <input type="password" name="password" required class="w-full pl-12 pr-4 py-3 border border-pink-200 bg-white rounded-[18px] focus:border-pink-400 focus:ring-0 outline-none transition-all duration-300 shadow-sm shadow-pink-50" placeholder="Masukkan password Anda">
                    </div>
                </div>

                <div class="flex items-center ml-1">
                    <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300 text-pink-500 focus:ring-pink-500 transition-all">
                    <label for="remember" class="ml-2 text-sm text-gray-500 font-medium">Remember me</label>
                </div>

                <button type="submit" class="w-full bg-[#F875AA] hover:bg-[#E91E8C] text-white font-bold py-4 rounded-[18px] shadow-lg shadow-pink-200 uppercase tracking-widest transition-all duration-300 transform hover:-translate-y-0.5">
                    LOG IN
                </button>

                <p class="text-center text-sm text-gray-400 mt-6 font-medium">
                    Don't have an account? <a href="{{ route('register') }}" class="text-pink-500 font-bold hover:underline transition-all">Register here</a>
                </p>
            </form>
        </div>
    </div>

    <style>
        .tab-login-custom {
            position: relative;
        }

        /* Lekukan Pojok Atas (Dibuat membulat ekstrem) */
        .tab-login-custom::before {
            content: "";
            position: absolute;
            right: 0;
            top: -40px; /* Diperlebar ruangnya dari -25px */
            width: 40px;
            height: 40px;
            background-color: transparent;
            border-bottom-right-radius: 40px; /* Radius diperbesar biar liukannya bulat mulus */
            box-shadow: 15px 15px 0 15px #FFF0F3; /* Ketebalan shadow disesuaikan */
            pointer-events: none;
        }

        /* Lekukan Pojok Bawah (Dibuat membulat ekstrem) */
        .tab-login-custom::after {
            content: "";
            position: absolute;
            right: 0;
            bottom: -40px; /* Diperlebar ruangnya dari -25px */
            width: 40px;
            height: 40px;
            background-color: transparent;
            border-top-right-radius: 40px; /* Radius diperbesar biar liukannya bulat mulus */
            box-shadow: 15px -15px 0 15px #FFF0F3; /* Ketebalan shadow disesuaikan */
            pointer-events: none;
        }
    </style>
</x-guest-layout>