<x-authentication>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Register</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body{
            background-image: url('https://images.unsplash.com/photo-1518709268805-4e9042af2176');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .glass{
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.2);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center">

    <div class="glass w-[400px] p-8 rounded-2xl shadow-2xl text-white">

        <h1 class="text-4xl font-bold text-center mb-2 text-pink-400">
            Anime Register
        </h1>

        <p class="text-center text-gray-300 mb-6">
            Join the anime world ✨
        </p>

        @if ($errors->any())
            <div class="bg-red-500/30 border border-red-400 text-white p-3 rounded-lg mb-4">
                <ul class="text-sm">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/register" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block mb-2 text-sm text-pink-300">
                    Name
                </label>

                <input
                    type="text"
                    name="name"
                    placeholder="Masukkan nama"
                    class="w-full px-4 py-3 rounded-xl bg-black/30 border border-pink-400 focus:outline-none focus:ring-2 focus:ring-pink-500 text-white"
                />
            </div>

            <div>
                <label class="block mb-2 text-sm text-pink-300">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan email"
                    class="w-full px-4 py-3 rounded-xl bg-black/30 border border-pink-400 focus:outline-none focus:ring-2 focus:ring-pink-500 text-white"
                />
            </div>

            <div>
                <label class="block mb-2 text-sm text-pink-300">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    class="w-full px-4 py-3 rounded-xl bg-black/30 border border-pink-400 focus:outline-none focus:ring-2 focus:ring-pink-500 text-white"
                />
            </div>

            <div>
                <label class="block mb-2 text-sm text-pink-300">
                    Password Confirmation
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Konfirmasi password"
                    class="w-full px-4 py-3 rounded-xl bg-black/30 border border-pink-400 focus:outline-none focus:ring-2 focus:ring-pink-500 text-white"
                />
            </div>

            <button
                type="submit"
                class="w-full py-3 rounded-xl bg-gradient-to-r from-pink-500 to-purple-600 hover:scale-105 transition duration-300 font-bold shadow-lg"
            >
                Register
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-gray-300 text-sm">
                Sudah punya akun?
            </p>

            <a
                href="/login"
                class="inline-block mt-3 px-6 py-2 rounded-xl 
                       bg-gradient-to-r from-cyan-500 to-blue-600 
                       hover:scale-105 transition duration-300 
                       font-semibold text-white shadow-lg"
            >
                Login
            </a>
        </div>

    </div>

</body>
</html>
</x-authentication>