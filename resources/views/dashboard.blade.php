@extends('layouts.main')
@section('container')

<!-- Main Content -->
<div class="main-content">
    <div class="page-title">
        <h1><i class="fas fa-home"></i> Dashboard</h1>
    </div>

    <!-- Stats Cards -->
    <div class="stats-cards">
        <!-- Total Acara -->
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $totalAcara ?? 0 }}</h3>
                <p>Total Acara</p>
            </div>
        </div>

        <!-- Total Tamu -->
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $totalTamu ?? 0 }}</h3>
                <p>Total Tamu</p>
            </div>
        </div>
    </div>
</div>

@endsection
