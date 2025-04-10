@php
    $pageTitle = 'Sertifikat';
    $activePage = 'certificates';
@endphp

@extends('dashboard.layout.main')

@section('content')
<div class="content-wrapper">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Semua Sertifikat</h4>
        <a href="{{ route('dashboard.certificates.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Sertifikat
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="80">Gambar</th>
                            <th>Title</th>
                            <th>Penerbit</th>
                            <th>Tanggal</th>
                            <th>Urutan</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($certificates as $certificate)
                            <tr>
                                <td>
                                    @if($certificate->certificate_image)
                                        <img src="{{ asset('storage/' . $certificate->certificate_image) }}" alt="{{ $certificate->title }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="fas fa-certificate text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $certificate->title }}</td>
                                <td>{{ $certificate->issuer }}</td>
                                <td>{{ $certificate->date }}</td>
                                <td>{{ $certificate->sort_order }}</td>
                                <td>
                                    <a href="{{ route('dashboard.certificates.edit', $certificate->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('dashboard.certificates.destroy', $certificate->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus sertifikat?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada sertifikat</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection