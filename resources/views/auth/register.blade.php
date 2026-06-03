<x-guest-layout>
<div class="min-h-screen flex items-center justify-center relative overflow-hidden bg-gradient-to-br from-slate-900 via-indigo-950 to-black">

    <!-- Glow -->
    <div class="absolute w-[500px] h-[500px] bg-blue-500/30 blur-3xl rounded-full top-[-120px] right-[-100px]"></div>
    <div class="absolute w-[400px] h-[400px] bg-purple-500/20 blur-3xl rounded-full bottom-[-120px] left-[-80px]"></div>

    <!-- Glass Card -->
    <div class="w-full max-w-md mx-4 backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl shadow-2xl p-8">

        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-white">Create Account</h1>
            <p class="text-white/60 text-sm mt-1">Join FAHRI PROJECT</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label class="text-white/70 text-sm">Name</label>
                <x-text-input
                    type="text"
                    name="name"
                    class="w-full mt-1 bg-white/10 border border-white/20 text-white rounded-xl focus:ring-2 focus:ring-indigo-400"
                    :value="old('name')"
                    required
                />
                <x-input-error :messages="$errors->get('name')" class="text-red-300 mt-1" />
            </div>

            <!-- Email -->
            <div>
                <label class="text-white/70 text-sm">Email</label>
                <x-text-input
                    type="email"
                    name="email"
                    class="w-full mt-1 bg-white/10 border border-white/20 text-white rounded-xl focus:ring-2 focus:ring-indigo-400"
                    :value="old('email')"
                    required
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

            <!-- Confirm -->
            <div>
                <label class="text-white/70 text-sm">Confirm Password</label>
                <x-text-input
                    type="password"
                    name="password_confirmation"
                    class="w-full mt-1 bg-white/10 border border-white/20 text-white rounded-xl focus:ring-2 focus:ring-indigo-400"
                    required
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="text-red-300 mt-1" />
            </div>

            <!-- Button -->
            <button class="w-full bg-white text-black font-semibold py-2 rounded-xl hover:bg-white/90 transition">
                Create Account
            </button>

            <p class="text-center text-white/60 text-sm mt-4">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-indigo-300 hover:text-white font-medium">
                    Login
                </a>
            </p>
        </form>

    </div>

</div>
</x-guest-layout>