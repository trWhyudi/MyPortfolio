@php
    $pageTitle = 'Dashboard';
    $activePage = 'dashboard';
@endphp

@extends('dashboard.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Proyek</h5>
                            <h2 class="mb-0">{{ $projectCount }}</h2>
                        </div>
                        <i class="fas fa-project-diagram fa-3x opacity-50"></i>
                    </div>
                    <a href="{{ route('dashboard.projects.index') }}" class="text-white mt-3 d-inline-block">
                        Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Kategori</h5>
                            <h2 class="mb-0">{{ $categoryCount }}</h2>
                        </div>
                        <i class="fas fa-tags fa-3x opacity-50"></i>
                    </div>
                    <a href="{{ route('dashboard.categories.index') }}" class="text-white mt-3 d-inline-block">
                        Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Sertifikat</h5>
                            <h2 class="mb-0">{{ $certificateCount }}</h2>
                        </div>
                        <i class="fas fa-certificate fa-3x opacity-50"></i>
                    </div>
                    <a href="{{ route('dashboard.certificates.index') }}" class="text-white mt-3 d-inline-block">
                        Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Quick Links</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('dashboard.projects.create') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-plus me-2"></i> Tambah Proyek Baru
                        </a>
                        <a href="{{ route('dashboard.certificates.create') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-plus me-2"></i> Tambah Sertifikat Baru
                        </a>
                        <a href="{{ route('dashboard.categories.create') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-plus me-2"></i> Tambah Kategori Baru
                        </a>
                        <a href="{{ route('dashboard.profile') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-user-edit me-2"></i> Update Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Website Preview</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('website.home') }}" class="list-group-item list-group-item-action" target="_blank">
                            <i class="fas fa-home me-2"></i> Home Page
                        </a>
                        <a href="{{ route('website.about') }}" class="list-group-item list-group-item-action" target="_blank">
                            <i class="fas fa-user me-2"></i> About Page
                        </a>
                        <a href="{{ route('website.resume') }}" class="list-group-item list-group-item-action" target="_blank">
                            <i class="fas fa-file-alt me-2"></i> Resume Page
                        </a>
                        <a href="{{ route('website.project') }}" class="list-group-item list-group-item-action" target="_blank">
                            <i class="fas fa-project-diagram me-2"></i> Projects Page
                        </a>
                        <a href="{{ route('website.contact') }}" class="list-group-item list-group-item-action" target="_blank">
                            <i class="fas fa-envelope me-2"></i> Contact Page
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection