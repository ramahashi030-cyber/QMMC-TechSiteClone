@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<style>
    body {
        background-color: #f4f6f9;
    }

    /* ===== SIDEBAR ===== */
    .sidebar {
        width: 240px;
        background-color: #2f3e46;
        min-height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        padding-top: 20px;
    }

    .sidebar h4 {
        color: #fff;
        text-align: center;
        margin-bottom: 30px;
        font-weight: bold;
    }

    .sidebar a {
        display: block;
        color: #ddd;
        padding: 12px 20px;
        text-decoration: none;
        font-weight: 500;
    }

    .sidebar a:hover {
        background-color: #3a4f57;
        color: #fff;
    }

    /* Active Dashboard (Yellow like screenshot) */
    .sidebar .active-menu {
        background-color: #f4b400;
        color: #fff !important;
    }

    .submenu a {
        padding-left: 40px;
        font-size: 14px;
        background-color: #36474f;
    }

    /* ===== TOP HEADER ===== */
    .top-header {
        margin-left: 240px;
        background-color: #343a40;
        color: white;
        padding: 12px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* ===== GREEN NAVBAR ===== */
    .green-navbar {
        margin-left: 240px;
        background-color: #0a7d00;
        padding: 12px 20px;
    }

    .green-navbar a {
        color: white;
        margin-right: 25px;
        text-decoration: none;
        font-weight: 500;
    }

    .green-navbar a:hover {
        text-decoration: underline;
    }

    /* ===== MAIN CONTENT ===== */
    .main-content {
        margin-left: 240px;
        padding: 30px;
    }

    .card-box {
        background: white;
        padding: 20px;
        border-radius: 6px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
</style>

<!-- ================= SIDEBAR ================= -->
<div class="sidebar">
    <h4>😊 ETSS</h4>

    <!-- Dashboard Dropdown -->
    <a class="active-menu" data-bs-toggle="collapse" href="#dashboardMenu" role="button">
        Dashboard ▼
    </a>

    <div class="collapse show submenu" id="dashboardMenu">
        <a href="#">Dashboard Technical</a>
        <a href="#">Dashboard PMS</a>
        <a href="#">Dashboard Toner</a>
    </div>

</div>

<!-- ================= TOP HEADER ================= -->
<div class="top-header">
    <div>
        <strong>ICMS System</strong>
    </div>

    <div>
        <span class="me-3">
            {{ auth()->user()->email }}
        </span>

        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">
                Logout
            </button>
        </form>
    </div>
</div>

<!-- ================= GREEN NAVBAR ================= -->
<div class="green-navbar">
    <a href="#">PC MAINTENANCE</a>
    <a href="#">PC INVENTORY</a>
    <a href="#">PC CLEANING SUMMARY</a>
    <a href="#">PRINTER DEPLOYMENT</a>
    <a href="#">REPORTS</a>
    <a href="#">DOCUMENTS MANAGER</a>
    <a href="#">CREDENTIALS</a>
</div>

<!-- ================= MAIN CONTENT ================= -->
<div class="main-content">

    <h4 class="mb-4">Home / Client Report</h4>

    <div class="row">
        <div class="col-md-6">
            <div class="card-box">
                <h5 class="text-primary">Client Report Summary</h5>
                <hr>
                <p><strong>Reported By:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Date:</strong> {{ now()->format('m/d/Y') }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card-box">
                <h5 class="text-primary">Client Reports</h5>
                <hr>

                <div class="d-flex gap-2 mb-3">
                    <input type="date" class="form-control">
                    <input type="date" class="form-control">
                    <button class="btn btn-primary">Search Record</button>
                </div>

                <input type="text" class="form-control" placeholder="SEARCH HERE...">
            </div>
        </div>
    </div>

</div>

@endsection