<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Optional: You can add custom styles or JS files here -->
</head>
<body class="bg-gray-100">

    <!-- Navbar Admin -->
    <nav class="bg-gray-800 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!-- Heroicon name: mini/menu -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0">
                        <a href="/admin" class="text-xl font-bold text-white">Admin Dashboard</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, toggle classes based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin.users.*') ? 'bg-gray-900 text-white' : '' }}">Users</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin.products.*') ? 'bg-gray-900 text-white' : '' }}">Products</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin.transactions.*') ? 'bg-gray-900 text-white' : '' }}">Transactions</a>
            </div>
        </div>
    </nav>


    <div class="flex">
        <!-- Sidebar (Optional) -->
        <div class="w-64 bg-gray-800 text-white min-h-screen p-4">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
                </li>
                <li>
                    <a href="/admin/users" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Users</a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Products</a>
                </li>
                <li>
                    <a href="{{ route('admin.transactions.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Transactions</a>
                </li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 p-6">
            <!-- Page Content -->
            @yield('content')
        </div>
    </div>

</body>
</html>
