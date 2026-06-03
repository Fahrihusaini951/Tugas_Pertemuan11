<x-guest-layout>
<div class="min-h-screen flex items-center justify-center relative overflow-hidden bg-gradient-to-br from-slate-900 via-indigo-950 to-black">

    <!-- Background Glow -->
    <div class="absolute w-[500px] h-[500px] bg-indigo-500/30 blur-3xl rounded-full top-[-100px] left-[-100px]"></div>
    <div class="absolute w-[400px] h-[400px] bg-pink-500/20 blur-3xl rounded-full bottom-[-120px] right-[-80px]"></div>

    <!-- Glass Card -->
    <div class="w-full max-w-md mx-4 backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl shadow-2xl p-8">

        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-white">FAHRI PROJECT</h1>
            <p class="text-white/60 text-sm mt-1">Sign in to your dashboard</p>
        </div>

        <x-auth-session-status class="mb-4 text-green-300" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label class="text-white/70 text-sm">Email</label>
                <x-text-input
                    type="email"
                    name="email"
                    class="w-full mt-1 bg-white/10 border border-white/20 text-white placeholder-white/40 rounded-xl focus:ring-2 focus:ring-indigo-400"
                    :value="old('email')"
                    required
                    autofocus
                />
                <x-input-error :messages="$errors->get('email')" class="text-red-300 mt-1" />
            </div>

            <!-- Password -->
            <div>
                <label class="text-white/70 text-sm">Password</label>
                <x-text-input
                    type="password"
                    name="password"
                    class="w-full mt-1 bg-white/10 border border-white/20 text-white rounded-xl focus:ring-2 focus:ring-indigo-400"
                    required
                />
                <x-input-error :messages="$errors->get('password')" class="text-red-300 mt-1" />
            </div>

            <!-- Remember -->
            <div class="flex justify-between items-center text-sm text-white/60">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="remember" class="rounded bg-white/20 border-white/30">
                    Remember me
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="hover:text-white text-indigo-300">
                        Forgot password?
                    </a>
                @endif
            </div>

            <!-- Button -->
            <button class="w-full mt-2 bg-white text-black font-semibold py-2 rounded-xl hover:bg-white/90 transition">
                Sign In
            </button>

            <p class="text-center text-white/60 text-sm mt-4">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-indigo-300 hover:text-white font-medium">
                    Register
                </a>
            </p>
        </form>

    </div>

</div>
</x-guest-layout>