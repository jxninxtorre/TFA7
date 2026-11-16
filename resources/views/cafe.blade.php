<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Cloud Cafe</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #fce7f3, #dbeafe);
            color: #374151;
            min-height: 100vh;
        }
        nav {
            background: #fff;
            padding: 14px 30px;
            display: flex;
            gap: 20px;
            align-items: center;
            box-shadow: 0 2px 8px rgba(244, 114, 182, .2);
        }
        nav .brand { font-weight: 700; color: #ec4899; font-size: 1.2rem; margin-right: auto; }
        nav a { text-decoration: none; color: #3b82f6; font-weight: 600; }
        nav a:hover { color: #ec4899; }
        .container { max-width: 900px; margin: 30px auto; padding: 0 16px; }
        .card {
            background: #fff;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 6px 18px rgba(59, 130, 246, .15);
        }
        h1 { margin-top: 0; color: #ec4899; }
        table { width: 100%; border-collapse: collapse; margin-top: 14px; }
        th { background: #fbcfe8; color: #831843; text-align: left; padding: 10px; }
        td { padding: 10px; border-bottom: 1px solid #e5e7eb; vertical-align: middle; }
        tr:hover td { background: #eff6ff; }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            border: none;
            border-radius: 20px;
            background: #3b82f6;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            font-size: .9rem;
        }
        .btn:hover { background: #2563eb; }
        .btn-pink { background: #ec4899; }
        .btn-pink:hover { background: #db2777; }
        .btn-gray { background: #9ca3af; }
        label { display: block; margin: 14px 0 6px; font-weight: 600; }
        input[type=text], input[type=file] {
            width: 100%;
            padding: 10px;
            border: 2px solid #fbcfe8;
            border-radius: 10px;
            font-size: 1rem;
        }
        input[type=text]:focus { outline: none; border-color: #3b82f6; }
        .alert-success {
            background: #dcfce7; color: #166534;
            padding: 10px 14px; border-radius: 10px; margin-bottom: 14px;
        }
        .alert-error {
            background: #fee2e2; color: #991b1b;
            padding: 10px 14px; border-radius: 10px; margin-bottom: 14px;
        }
        .alert-error ul { margin: 0; padding-left: 18px; }
        .avatar { width: 50px; height: 50px; border-radius: 50%; object-fit: cover; border: 2px solid #fbcfe8; }
        .avatar-lg { width: 100px; height: 100px; }
        .actions { margin-top: 20px; display: flex; gap: 10px; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; }
    </style>
</head>
<body>
    <nav>
        <span class="brand">Cloud Cafe</span>
        <a href="{{ route('customers.index') }}">Customers</a>
        <a href="{{ route('users.index') }}">User Accounts</a>
    </nav>

    <div class="container">
        <div class="card">
            @if (session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</body>
</html>