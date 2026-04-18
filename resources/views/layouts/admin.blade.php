<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>لوحة تحكم الفواتير - Zenfine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: #f0f2f5;
            font-family: 'Tahoma', 'Arial', sans-serif;
        }
        .sidebar {
            background: white;
            min-height: 100vh;
            color: black;
        }
        .sidebar a {
            color: black;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
        }
        .content {
            padding: 20px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }
        .logo-img {
            max-width: 150px;
            margin: 20px auto;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar p-0">
                <div class="text-center">
                    <img src="{{ asset('image/zenfine-logo.jpg') }}" alt="Zenfine" class="logo-img">
                    <h5 class="mb-4">Zenfine Property Care</h5>
                </div>
                <nav>
                    <a href="{{ route('admin.dashboard', ['token' => request('token')]) }}">
                        <i class="fas fa-plus-circle"></i> فاتورة جديدة
                    </a>
                    <a href="{{ route('invoices.search', ['token' => request('token')]) }}">
                        <i class="fas fa-search"></i> الفواتير القديمة
                    </a>
                </nav>
            </div>
            <div class="col-md-10 content">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('scripts')
</body>
</html>