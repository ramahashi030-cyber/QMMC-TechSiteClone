<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'App')</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clientreports.css') }}" rel="stylesheet">
</head>
<body>
    <div class="app-container">
        <header class="app-header">
            <div class="header-brand">QMMC</div>
            <div class="header-actions">
                <button class="notification-btn" title="Notifications">🔔</button>
            </div>
        </header>

        <div class="app-body">
            <aside class="app-sidebar">
                <nav>
                    <ul>
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ url('/imiss-document') }}">IMISS Document</a></li>
                        <li><a href="{{ url('/open-tickets') }}">Open Tickets</a></li>
                        <li><a href="{{ url('/closed-tickets') }}">Closed Tickets</a></li>
                        <li><a href="{{ url('/all-technical') }}">All Technical</a></li>
                        <li><a href="{{ url('/technical-summary') }}">Technical Summary</a></li>
                        <li><a href="{{ url('/technical-kpi') }}">Technical KPI</a></li>
                        <li><a href="{{ url('/customer-satisfaction') }}">Customer Satisfaction</a></li>
                        <li><a href="{{ url('/all-users') }}">All Users</a></li>
                        <li><a href="{{ url('/policies-procedure') }}">Policies & Procedure</a></li>
                        <li><a href="{{ url('/phone-directory') }}">Phone Directory</a></li>
                        <li><a href="{{ url('/troubleshooting') }}">Troubleshooting</a></li>
                    </ul>
                </nav>
                <div class="sidebar-footer">
                    @if(session('authenticated'))
                        <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="logout-btn">Login</a>
                    @endif
                </div>
            </aside>

            <main class="app-main">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
