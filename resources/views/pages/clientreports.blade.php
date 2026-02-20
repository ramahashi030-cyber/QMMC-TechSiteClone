@extends('layouts.app')

@section('title','Client Reports')

@section('content')
<div class="clientreports-container">
  <div class="clientreports-grid">
    <section class="summary">
      <h3>Client Report Summary</h3>
      <div class="cards">
        <div class="card">
          <div class="label">Total Reports</div>
          <div class="value">123</div>
        </div>
        <div class="card">
          <div class="label">Open</div>
          <div class="value">12</div>
        </div>
        <div class="card">
          <div class="label">Closed</div>
          <div class="value">111</div>
        </div>
      </div>
    </section>

    <section class="table-section">
      <h3>Client Reports Table</h3>
      <table class="reports-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Client</th>
            <th>Department</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Alice Example</td>
            <td>Billing</td>
            <td>Open</td>
          </tr>
        </tbody>
      </table>
    </section>
  </div>
</div>
@endsection
