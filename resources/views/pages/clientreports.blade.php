@extends('layouts.app')

@section('title','Client Reports')

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
    <span>Client Reports</span>
</div>

<!-- MAIN CONTENT -->
<div class="main">
    <div class="split-layout">

        <!-- LEFT SIDE (33%) - FORM SECTION -->
        <div class="left-table">
            <div class="form-section">
                <h2 class="form-title">Client Report Summary:</h2>

                <form method="POST" action="{{ url('/client-report-submit') }}">
                    @csrf

                    <!-- Reported By -->
                    <div class="form-group">
                        <label>Reported By:</label>
                        <input type="text" class="form-control" name="reported_by" placeholder="Enter your name">
                    </div>

                    <!-- Dept/Area -->
                    <div class="form-group">
                        <label>
                            Dept/Area:
                            <button type="button" class="btn-add">Add</button>
                        </label>
                        <select class="form-control" name="department" required>
                            <option value="">-- Select Department --</option>
                            <option value="ACCOUNTING OFFICE">ACCOUNTING OFFICE</option>
                            <option value="ACU">ACU</option>
                            <option value="ADMINISTRATIVE OFFICE">ADMINISTRATIVE OFFICE</option>
                            <option value="ADMITTING OFFICE">ADMITTING OFFICE</option>
                            <option value="BILLING OFFICE">BILLING OFFICE</option>
                            <option value="BLOOD BANK">BLOOD BANK</option>
                            <option value="CASHIER">CASHIER</option>
                            <option value="LABORATORY">LABORATORY</option>
                            <option value="PHARMACY">PHARMACY</option>
                            <option value="RADIOLOGY">RADIOLOGY</option>
                            <option value="OTHERS">OTHERS</option>
                        </select>
                    </div>

                    <!-- Equipment -->
                    <div class="form-group">
                        <label>Equipment/Applications:</label>
                        <select class="form-control" name="equipment" required>
                            <option value="">-- Select Equipment --</option>
                            <option value="Computer">Computer</option>
                            <option value="Printer">Printer</option>
                            <option value="IP Phone">IP Phone</option>
                            <option value="UPS/AVR">UPS/AVR</option>
                            <option value="eNGAS">eNGAS</option>
                            <option value="WebHOMIS/iHOMIS">WebHOMIS/iHOMIS</option>
                            <option value="eMSS">eMSS</option>
                            <option value="eSCMS">eSCMS</option>
                            <option value="GovMail">GovMail</option>
                            <option value="Intranet">Intranet</option>
                            <option value="VPN">VPN</option>
                        </select>
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <label>Category:</label>
                        <select class="form-control" name="category" required>
                            <option value="">-- Select Category --</option>
                            <option value="Network/Technical">Network/Technical</option>
                            <option value="Software/Application">Software/Application</option>
                            <option value="Hardware">Hardware</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <hr>

                    <!-- Summary -->
                    <div class="form-group">
                        <label>Summary of Reported Problem:</label>
                        <textarea class="form-control" name="problem_summary" rows="4" placeholder="Describe the issue..."></textarea>
                    </div>

                    <hr>

                    <!-- Assign Support -->
                    <div class="form-group">
                        <label>Assign Support:</label>
                        <select class="form-control" name="assigned_support" required>
                            <option value="">-- Select Support Team --</option>
                            <option value="Technical Support">Technical Support</option>
                            <option value="Web/iHOMIS Support">Web/iHOMIS Support</option>
                            <option value="Administrator">Administrator</option>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="form-buttons">
                        <button type="reset" class="btn-reset">Reset</button>
                        <button type="submit" class="btn-submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>

        <!-- RIGHT SIDE (67%) - TABLE SECTION -->
        <div class="right-table">
            <div class="table-section">
                <div class="table-controls">
                    <h2>Client Reports</h2>
                    <div class="date-range">
                        <label>from:</label>
                        <input type="date" value="2026-02-05">
                        <label>to:</label>
                        <input type="date" value="2026-02-20">
                        <button class="btn-search">Search Record</button>
                    </div>
                </div>

                <div class="search-row">
                    <label style="font-weight:600; color:#1976d2; margin-right:10px;">Search Records:</label>
                    <input class="search-input" placeholder="SEARCH HERE..">
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Ticket</th>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Department</th>
                            <th>Equipment</th>
                            <th>Category</th>
                            <th>Problem</th>
                            <th>Assigned</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>7871</td>
                            <td>February 19, 2026 12:36 PM</td>
                            <td>MAAM WIN</td>
                            <td>Billing and Claims</td>
                            <td>iHIS</td>
                            <td>Software/Application</td>
                            <td>UPDATE PATIENT BILL</td>
                            <td>Web/iHOMIS</td>
                            <td><button class="action-btn btn-open">Open</button></td>
                            <td><button class="action-btn btn-delete">Delete</button></td>
                        </tr>
                        <tr>
                            <td>7870</td>
                            <td>February 19, 2026 12:35 PM</td>
                            <td>APRIL TUMOAB</td>
                            <td>OPD NEUROLOGY</td>
                            <td>iHIS</td>
                            <td>Software/Application</td>
                            <td>FOR RE-OPEN OPD LOGS FEBRUARY 11, 2026</td>
                            <td>Web/iHOMIS</td>
                            <td><button class="action-btn btn-open">Open</button></td>
                            <td><button class="action-btn btn-delete">Delete</button></td>
                        </tr>
                        <tr>
                            <td>7869</td>
                            <td>February 19, 2026 11:47 AM</td>
                            <td>SHALOM DEO</td>
                            <td>EHS OFFICE</td>
                            <td>iHIS</td>
                            <td>Software/Application</td>
                            <td>for deletion of EHWC laboratory charging</td>
                            <td>Web/iHOMIS</td>
                            <td><button class="action-btn btn-open">Open</button></td>
                            <td><button class="action-btn btn-delete">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection
