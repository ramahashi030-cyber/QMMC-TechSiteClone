@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<!-- TOP NOTIFICATION BAR -->
<div class="notification-bar">
    <div class="bell">
        <i class="fas fa-bell"></i>
        <div class="count">5</div>
    </div>
    <div class="user">
        <span>{{ session('account_email') ?? 'User' }}</span>
        <img src="https://i.pravatar.cc/100" alt="User">
    </div>
</div>

<!-- GREEN NAVIGATION BAR -->
<div class="topnav">
    <div class="nav-item dropdown">
        <i class="fas fa-tools"></i>
        PC Maintenance
        <i class="fas fa-caret-down"></i>
        <div class="dropdown-menu">
            <a href="#">PC Condemned</a>
            <a href="#">PC Inventory</a>
            <a href="#">PC Cleaning Summary</a>
        </div>
    </div>
    <div class="nav-item">
        <i class="fas fa-print"></i>
        PC INVENTORY
    </div>
    <div class="nav-item">
        <i class="fas fa-print"></i>
        PC CLEANING SUMMARY
    </div>
    <div class="nav-item">
        <i class="fas fa-print"></i>
        PRINTER DEPLOYMENT
    </div>
    <div class="nav-item dropdown">
        <i class="fas fa-file-alt"></i>
        Reports
        <i class="fas fa-caret-down"></i>
        <div class="dropdown-menu">
            <a href="#">Toner Consumption Report</a>
            <a href="#">PC Inventory</a>
        </div>
    </div>
    <div class="nav-item">
        <i class="fas fa-folder"></i>
        Documents Manager
    </div>
    <div class="nav-item">
        <i class="fas fa-lock"></i>
        Credentials
    </div>
</div>

<!-- BREADCRUMB BAR -->
<div class="breadcrumb-bar">
    <span>Home</span>
    <div class="divider">/</div>
    <span>Dashboard</span>
</div>

<!-- MAIN CONTENT -->
<div class="main">
    <h1 style="margin-bottom: 30px; color: #333;">Dashboard</h1>

    <!-- Overall Stats Cards -->
    <div class="cards">
        <div class="card">
            <h3>Total Tickets</h3>
            <h1>245</h1>
        </div>
        <div class="card">
            <h3>Open Tickets</h3>
            <h1>45</h1>
        </div>
        <div class="card">
            <h3>In Progress</h3>
            <h1>32</h1>
        </div>
        <div class="card">
            <h3>Closed Tickets</h3>
            <h1>168</h1>
        </div>
    </div>

    <!-- Quick Access Sections -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 30px;">

        <!-- Recent Tickets -->
        <div class="table-section">
            <h2>Recent Tickets</h2>
            <table>
                <thead>
                    <tr>
                        <th>Ticket ID</th>
                        <th>Department</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#7871</td>
                        <td>Billing</td>
                        <td><button class="action-btn btn-open">Open</button></td>
                    </tr>
                    <tr>
                        <td>#7870</td>
                        <td>OPD Neurology</td>
                        <td><button class="action-btn btn-open">Open</button></td>
                    </tr>
                    <tr>
                        <td>#7869</td>
                        <td>EHS Office</td>
                        <td><button class="action-btn btn-open">Open</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Quick Links -->
        <div class="table-section">
            <h2>Quick Links</h2>
            <div style="padding: 20px;">
                <p><a href="{{ url('/clientreports') }}" style="color: #1976d2; text-decoration: none; font-weight: 600; margin-bottom: 12px; display: block;">📋 Client Reports</a></p>
                <p><a href="{{ url('/open-tickets') }}" style="color: #1976d2; text-decoration: none; font-weight: 600; margin-bottom: 12px; display: block;">🔓 Open Tickets</a></p>
                <p><a href="{{ url('/closed-tickets') }}" style="color: #1976d2; text-decoration: none; font-weight: 600; margin-bottom: 12px; display: block;">✓ Closed Tickets</a></p>
                <p><a href="{{ url('/all-technical') }}" style="color: #1976d2; text-decoration: none; font-weight: 600; display: block;">⚙️ All Technical</a></p>
            </div>
        </div>

    </div>

</div>

<style>
    /* Cards Grid */
    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .card {
        background: #fff;
        padding: 20px;
        border-radius: 6px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        border-left: 4px solid #0d7f0d;
    }

    .card h3 {
        font-size: 14px;
        margin-bottom: 10px;
        color: #666;
    }

    .card h1 {
        font-size: 28px;
        color: #0d7f0d;
    }
</style>

@endsection