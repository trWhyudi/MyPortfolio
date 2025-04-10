@php
    $pageTitle = 'Add Category';
    $activePage = 'categories';
@endphp

@extends('dashboard.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Tambah Kategori</h4>
        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.categories.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Kategori*</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="filter_class" class="form-label">Filter Class*</label>
                    <input type="text" class="form-control @error('filter_class') is-invalid @enderror" id="filter_class" name="filter_class" value="{{ old('filter_class') }}" required placeholder="E.g., web-design">
                    <small class="text-muted">Digunakan untuk memfilter proyek di frontend (tidak ada spasi, gunakan tanda minus)</small>
                    @error('filter_class')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary ms-2">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection