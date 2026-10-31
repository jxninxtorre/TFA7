<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Cloud Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --pink: #ffc8dd;
            --pink-soft: #ffe5ef;
            --pink-deep: #ff8fb8;
            --blue: #bde0fe;
            --blue-deep: #7fb8f0;
            --text: #6b4a5e;
            --white: #ffffff;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Quicksand', 'Segoe UI', Arial, sans-serif;
            color: var(--text);
            background: linear-gradient(180deg, var(--pink-soft) 0%, #e8f3ff 100%);
            min-height: 100vh;
        }

        nav {
            background: var(--white);
            margin: 18px auto 0;
            max-width: 1000px;
            padding: 12px 24px;
            border-radius: 999px;
            box-shadow: 0 6px 18px rgba(255, 143, 184, 0.25);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
        }
        .brand { font-weight: 700; font-size: 20px; color: var(--pink-deep); text-decoration: none; }
        .links { display: flex; gap: 6px; flex-wrap: wrap; }
        .links a {
            text-decoration: none;
            color: var(--text);
            font-weight: 600;
            padding: 8px 18px;
            border-radius: 999px;
            transition: .2s;
        }
        .links a:hover { background: var(--pink-soft); }
        .links a.active { background: var(--pink-deep); color: var(--white); }

        .page-head { text-align: center; margin: 32px 0 24px; padding: 0 16px; }
        .page-head h1 { margin: 0; font-size: 34px; color: var(--pink-deep); }
        .page-head p { margin: 6px 0 0; font-size: 15px; }

        .data-card {
            background: var(--white);
            max-width: 1000px;
            margin: 0 auto 40px;
            border-radius: 24px;
            box-shadow: 0 8px 24px rgba(255, 143, 184, 0.25);
            overflow: hidden;
        }
        .data-card-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 28px;
            background: linear-gradient(90deg, var(--pink-soft), #e8f3ff);
        }
        .data-card-head h2 { margin: 0; font-size: 18px; }
        .count-badge {
            background: var(--pink-deep);
            color: var(--white);
            padding: 4px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
        }
        .table-scroll { overflow-x: auto; }
        .data-table { width: 100%; border-collapse: collapse; }
        .data-table th {
            text-align: left;
            padding: 14px 28px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .6px;
            color: var(--blue-deep);
            background: #f6faff;
        }
        .data-table td { padding: 16px 28px; border-top: 1px solid var(--pink-soft); font-size: 15px; }
        .data-table tbody tr:hover { background: var(--pink-soft); }
        .person { display: flex; align-items: center; gap: 12px; font-weight: 700; }
        .avatar {
            width: 38px; height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--pink), var(--blue));
            color: var(--white);
            display: grid;
            place-items: center;
            font-weight: 700;
            flex-shrink: 0;
        }
        .tag {
            background: var(--pink-soft);
            color: var(--pink-deep);
            padding: 4px 12px;
            border-radius: 999px;
            font-weight: 700;
            font-size: 13px;
        }
        .empty { text-align: center; padding: 36px; }

        footer { text-align: center; font-size: 13px; padding: 0 0 30px; }

        @media (max-width: 600px) {
            nav { border-radius: 24px; justify-content: center; }
            .data-table th, .data-table td { padding: 12px 16px; }
        }
    </style>
</head>
<body>
    <nav>
        <a href="/" class="brand">☁️ Cloud Cafe</a>
        <div class="links">
            <a href="/customers" class="{{ request()->is('customers') ? 'active' : '' }}">Customers</a>
            <a href="/users" class="{{ request()->is('users') ? 'active' : '' }}">Users</a>
        </div>
    </nav>

    @yield('content')

    <footer>&copy; {{ date('Y') }} Cloud Cafe &middot; TFA6</footer>
</body>
</html>