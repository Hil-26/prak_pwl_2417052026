<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Distro Terminal' }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Font Monospace -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #0d1117;
            color: #c9d1d9;
            font-family: 'Fira Code', monospace;
        }
        .distro-card {
            background-color: #161b22;
            border: 1px solid #30363d;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 255, 102, 0.08);
        }
        .distro-header {
            background-color: #21262d;
            border-bottom: 1px solid #30363d;
            padding: 8px 16px;
            border-top-left-radius: 7px;
            border-top-right-radius: 7px;
        }
        .terminal-btn {
            height: 12px;
            width: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 6px;
        }
        .btn-close-term { background-color: #ff5f56; }
        .btn-min-term { background-color: #ffbd2e; }
        .btn-max-term { background-color: #27c93f; }

        .terminal-green { color: #00ff66; }
        .terminal-cyan { color: #58a6ff; }
        .terminal-yellow { color: #e3b341; }
        
        .form-control, .form-select {
            background-color: #0d1117 !important;
            border: 1px solid #30363d !important;
            color: #00ff66 !important;
            font-family: 'Fira Code', monospace;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 8px rgba(0, 255, 102, 0.35) !important;
            border-color: #00ff66 !important;
        }
        .form-select option {
            background-color: #161b22 !important;
            color: #ffffff !important;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    @include('components.navbar')

    <main class="container py-4 flex-grow-1">
        @yield('content')
    </main>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>