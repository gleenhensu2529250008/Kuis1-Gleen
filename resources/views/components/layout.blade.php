<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'IF21' }}</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous"
    >

    @vite([])
</head>

<body class="bg-light">

    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand fw-bold" href="/">
                IF21
            </a>

            <!-- Toggle Button -->
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->is('/') ? 'active bg-black fw-bold text-white' : '' }}"
                            href="/"
                        >
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->is('fakultas') ? 'active bg-black fw-bold text-white' : '' }}"
                            href="/fakultas"
                        >
                            List Fakultas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->is('fakultas/create') ? 'active bg-black fw-bold text-white' : '' }}"
                            href="/fakultas/create"
                        >
                            Create Fakultas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeis('prodi.index') ? 'active bg-black fw-bold text-white' : '' }}"
                            href="/prodi/create"
                        >
                            Tambah Prodi
                        </a>
                    </li>
                    <form action="/logout" method="POST">
                    <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container py-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        {{ $slot }}
    </main>

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"
    ></script>
</body>
</html>