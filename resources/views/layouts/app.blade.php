<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Manajemen Siswa')</title>
    <link rel="stylesheet" href="{{ asset('css/siswa.css') }}">
</head>
<body>

    <div class="bg-wave" aria-hidden="true">
        <svg viewBox="0 0 1200 700" preserveAspectRatio="xMidYMid slice">
            <defs>
                <path id="gelombang" d="M-100 640 C 180 500, 420 780, 700 560 S 1080 140, 960 -60"
                      fill="none" stroke="#ffffff" stroke-opacity="0.6" stroke-width="1"/>
            </defs>
            @for ($i = 0; $i < 18; $i++)
                <use href="#gelombang" y="{{ $i * 7 }}"/>
            @endfor
        </svg>
    </div>

    <header class="topbar">
        <a href="{{ route('siswa.index') }}" class="brand">
            <span class="brand-logo"></span> Manajemen Siswa
        </a>

        <nav class="menu">
            <a href="{{ route('siswa.index') }}" class="{{ request()->routeIs('siswa.index') ? 'active' : '' }}">Data Siswa</a>
            <a href="{{ route('siswa.create') }}" class="{{ request()->routeIs('siswa.create') ? 'active' : '' }}">Tambah Siswa</a>
        </nav>

        <a href="{{ route('siswa.create') }}" class="btn btn-outline btn-sm">+ Siswa Baru</a>
    </header>

    <main class="wrap">
        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <footer class="footer">&copy; {{ date('Y') }} Manajemen Siswa</footer>

</body>
</html>
