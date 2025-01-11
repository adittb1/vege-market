<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Vege Market')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Left Section -->
                <div class="flex items-center">
                    <a href="/" class="flex items-center text-xl font-bold text-green-600">
                        Vege Market
                    </a>
                    <div class="hidden sm:flex sm:ml-10 space-x-4">
                        <a href="{{ route('transactions') }}" class="text-gray-600 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium">
                            My Transactions
                        </a>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="flex items-center space-x-4">
                    @auth
                        <span class="text-sm font-medium text-gray-600">Hello, {{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-red-600 px-3 py-2 text-sm font-medium">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="text-gray-600 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium">
                            Register
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 shadow-sm mt-8">
        <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Vege Market. All rights reserved.
        </div>
    </footer>
</body>
</html>
