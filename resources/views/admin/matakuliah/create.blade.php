@extends('layouts.app')

@section('title', 'Tambah Mata Kuliah - Admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tambah Mata Kuliah Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.matakuliah.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="kode_matkul" class="form-label">Kode Mata Kuliah <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('kode_matkul') is-invalid @enderror" 
                                   id="kode_matkul" 
                                   name="kode_matkul" 
                                   value="{{ old('kode_matkul') }}"
                                   placeholder="Contoh: TPL1101" 
                                   required>
                            @error('kode_matkul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_matkul" class="form-label">Nama Mata Kuliah <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('nama_matkul') is-invalid @enderror" 
                                   id="nama_matkul" 
                                   name="nama_matkul" 
                                   value="{{ old('nama_matkul') }}"
                                   placeholder="Contoh: Berpikir Komputasional" 
                                   required>
                            @error('nama_matkul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sks_teori" class="form-label">SKS Teori <span class="text-danger">*</span></label>
                                    <input type="number" 
                                           class="form-control @error('sks_teori') is-invalid @enderror" 
                                           id="sks_teori" 
                                           name="sks_teori" 
                                           value="{{ old('sks_teori') }}"
                                           min="0" 
                                           placeholder="Contoh: 2" 
                                           required>
                                    @error('sks_teori')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sks_praktik" class="form-label">SKS Praktik <span class="text-danger">*</span></label>
                                    <input type="number" 
                                           class="form-control @error('sks_praktik') is-invalid @enderror" 
                                           id="sks_praktik" 
                                           name="sks_praktik" 
                                           value="{{ old('sks_praktik') }}"
                                           min="0" 
                                           placeholder="Contoh: 1" 
                                           required>
                                    @error('sks_praktik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="semester" class="form-label">Semester <span class="text-danger">*</span></label>
                            <select class="form-select @error('semester') is-invalid @enderror" 
                                    id="semester" 
                                    name="semester" 
                                    required>
                                <option value="">-- Pilih Semester --</option>
                                @for($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>
                                        Semester {{ $i }}
                                    </option>
                                @endfor
                            </select>
                            @error('semester')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.matakuliah.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection