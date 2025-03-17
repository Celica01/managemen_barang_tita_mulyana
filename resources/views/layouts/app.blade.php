<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Manajemen Barang') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-700 p-4 text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Nama Aplikasi -->
            <div class="flex items-center space-x-4">
                <a href="#" class="text-xl font-bold">
                    Manajemen Barang
                </a>

                <!-- Menu Navigasi -->
                <ul class="flex space-x-4">
                    {{-- <li><a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a></li> --}}
                    <li><a href="{{ route('items.index') }}" class="hover:underline">Item</a></li>
                    <li><a href="{{ route('customers.index') }}" class="hover:underline">Customers</a></li>
                    <li><a href="{{ route('sales.index') }}" class="hover:underline">Sales</a></li>
                    <li><a href="{{ route('users.index') }}" class="hover:underline">Petugas</a></li>
                    <li><a href="{{ route('transactions.index') }}" class="hover:underline">Transaksi</a></li>
                </ul>
            </div>

            <!-- User Info & Logout -->
            <div class="flex items-center space-x-4">
                @auth
                    <span class="text-sm">Halo, <strong>{{ Auth::user()->name }}</strong></span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-sm">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-sm">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container mx-auto p-6">
        @yield('content')
    </div>

</body>
</html>
