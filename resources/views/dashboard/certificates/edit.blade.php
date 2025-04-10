@php
    $pageTitle = 'Edit Certificate';
    $activePage = 'certificates';
@endphp

@extends('dashboard.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Edit Sertifikat</h4>
        <a href="{{ route('dashboard.certificates.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title*</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $certificate->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="issuer" class="form-label">Penerbit*</label>
                            <input type="text" class="form-control @error('issuer') is-invalid @enderror" id="issuer" name="issuer" value="{{ old('issuer', $certificate->issuer) }}" required>
                            @error('issuer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="date" class="form-label">Tanggal*</label>
                            <input type="text" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $certificate->date) }}" required placeholder="E.g., June 2023">
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="certificate_url" class="form-label">Sertifikat URL</label>
                            <input type="url" class="form-control @error('certificate_url') is-invalid @enderror" id="certificate_url" name="certificate_url" value="{{ old('certificate_url', $certificate->certificate_url) }}" placeholder="https://example.com/certificate">
                            @error('certificate_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $certificate->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="certificate_image" class="form-label">Gambar Sertifikat</label>
                            @if($certificate->certificate_image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $certificate->certificate_image) }}" alt="{{ $certificate->title }}" class="img-thumbnail" style="max-height: 150px;">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('certificate_image') is-invalid @enderror" id="certificate_image" name="certificate_image" accept="image/*">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                            @error('certificate_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="sort_order" class="form-label">Urutan</label>
                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror" id="sort_order" name="sort_order" value="{{ old('sort_order', $certificate->sort_order) }}">
                            <small class="text-muted">Sertifikat akan ditampilkan dalam urutan yang lebih rendah</small>
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="{{ route('dashboard.certificates.index') }}" class="btn btn-secondary ms-2">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection