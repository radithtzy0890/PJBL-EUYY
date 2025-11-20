@extends('layouts.app')

{{-- 1. Judul halaman --}}
@section('title', 'Mata Kuliah - Portal TPL SVIPB')

{{-- 2. Penanda navigasi aktif --}}
@section('nav_matkul', 'active') 

@push('styles')
<link rel="stylesheet" href="{{ asset('css/matkul.css') }}">
@endpush

@section('hero')
<section class="hero-section text-white text-center py-5">
    <div class="container">
        <h1 class="display-4">Selamat Datang Di Portal Teknologi Rekayasa Perangkat Lunak SV IPB <br></h1>
        <p class="lead-7">Syntax Error Compile Lagi</p>
    </div>
</section>
@endsection

{{-- 3. INI ADALAH SLOT KONTEN UTAMA (@yield('content') di app.blade.php) --}}
@section('content')
<main class="dosen-section info-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <header class="info-header">
                    <h2>Mata Kuliah Teknologi Rekayasa Perangkat Lunak SV IPB </h2>
                    <hr>
                </header>

                {{-- Semester 1 & 2 --}}
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="card semester-card shadow-sm">
                            <div class="card-header">
                                <h3>Semester 1</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr><th>Kode</th><th>Mata Kuliah</th><th>SKS</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse($semester1 as $mk)
                                        <tr>
                                            <td>{{ $mk->kode_matkul }}</td>
                                            <td>{{ $mk->nama_matkul }}</td>
                                            <td>{{ $mk->sks_teori }}({{ $mk->sks_teori }}-{{ $mk->sks_praktik }})</td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="3" class="text-center text-muted">Belum ada data</td></tr>
                                        @endforelse
                                        <tr class="table-total">
                                            <td>Total</td>
                                            <td></td>
                                            <td>
                                                {{ $semester1->sum(function($mk) { 
                                                    return (int)$mk->sks_teori + (int)$mk->sks_praktik; 
                                                }) }}
                                                ({{ $semester1->sum('sks_teori') }}-{{ $semester1->sum('sks_praktik') }})
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 mb-4">
                        <div class="card semester-card shadow-sm">
                            <div class="card-header">
                                <h3>Semester 2</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr><th>Kode</th><th>Mata Kuliah</th><th>SKS</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse($semester2 as $mk)
                                        <tr>
                                            <td>{{ $mk->kode_matkul }}</td>
                                            <td>{{ $mk->nama_matkul }}</td>
                                            <td>{{ $mk->sks_teori + $mk->sks_praktik }}({{ $mk->sks_teori }}-{{ $mk->sks_praktik }})</td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="3" class="text-center text-muted">Belum ada data</td></tr>
                                        @endforelse
                                        <tr class="table-total">
                                            <td>Total</td>
                                            <td></td>
                                            <td>
                                                {{ $semester2->sum(function($mk) { 
                                                    return (int)$mk->sks_teori + (int)$mk->sks_praktik; 
                                                }) }}
                                                ({{ $semester2->sum('sks_teori') }}-{{ $semester2->sum('sks_praktik') }})
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Semester 3 & 4 --}}
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="card semester-card shadow-sm">
                            <div class="card-header">
                                <h3>Semester 3</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr><th>Kode</th><th>Mata Kuliah</th><th>SKS</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse($semester3 as $mk)
                                        <tr>
                                            <td>{{ $mk->kode_matkul }}</td>
                                            <td>{{ $mk->nama_matkul }}</td>
                                            <td>{{ $mk->sks_teori + $mk->sks_praktik }}({{ $mk->sks_teori }}-{{ $mk->sks_praktik }})</td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="3" class="text-center text-muted">Belum ada data</td></tr>
                                        @endforelse
                                        <tr class="table-total">
                                            <td>Total</td>
                                            <td></td>
                                            <td>
                                                {{ $semester3->sum(function($mk) { 
                                                    return (int)$mk->sks_teori + (int)$mk->sks_praktik; 
                                                }) }}
                                                ({{ $semester3->sum('sks_teori') }}-{{ $semester3->sum('sks_praktik') }})
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 mb-4">
                        <div class="card semester-card shadow-sm">
                            <div class="card-header">
                                <h3>Semester 4</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr><th>Kode</th><th>Mata Kuliah</th><th>SKS</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse($semester4 as $mk)
                                        <tr>
                                            <td>{{ $mk->kode_matkul }}</td>
                                            <td>{{ $mk->nama_matkul }}</td>
                                            <td>{{ $mk->sks_teori + $mk->sks_praktik }}({{ $mk->sks_teori }}-{{ $mk->sks_praktik }})</td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="3" class="text-center text-muted">Belum ada data</td></tr>
                                        @endforelse
                                        <tr class="table-total">
                                            <td>Total</td>
                                            <td></td>
                                            <td>
                                                {{ $semester4->sum(function($mk) { 
                                                    return (int)$mk->sks_teori + (int)$mk->sks_praktik; 
                                                }) }}
                                                ({{ $semester4->sum('sks_teori') }}-{{ $semester4->sum('sks_praktik') }})
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Semester 5 & 6 --}}
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="card semester-card shadow-sm">
                            <div class="card-header">
                                <h3>Semester 5</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr><th>Kode</th><th>Mata Kuliah</th><th>SKS</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse($semester5 as $mk)
                                        <tr>
                                            <td>{{ $mk->kode_matkul }}</td>
                                            <td>{{ $mk->nama_matkul }}</td>
                                            <td>{{ $mk->sks_teori + $mk->sks_praktik }}({{ $mk->sks_teori }}-{{ $mk->sks_praktik }})</td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="3" class="text-center text-muted">Belum ada data</td></tr>
                                        @endforelse
                                        <tr class="table-total">
                                            <td>Total</td>
                                            <td></td>
                                            <td>
                                                {{ $semester5->sum(function($mk) { 
                                                    return (int)$mk->sks_teori + (int)$mk->sks_praktik; 
                                                }) }}
                                                ({{ $semester5->sum('sks_teori') }}-{{ $semester5->sum('sks_praktik') }})
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 mb-4">
                        <div class="card semester-card shadow-sm">
                            <div class="card-header">
                                <h3>Semester 6</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr><th>Kode</th><th>Mata Kuliah</th><th>SKS</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse($semester6 as $mk)
                                        <tr>
                                            <td>{{ $mk->kode_matkul }}</td>
                                            <td>{{ $mk->nama_matkul }}</td>
                                            <td>{{ $mk->sks_teori + $mk->sks_praktik }}({{ $mk->sks_teori }}-{{ $mk->sks_praktik }})</td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="3" class="text-center text-muted">Belum ada data</td></tr>
                                        @endforelse
                                        <tr class="table-total">
                                            <td>Total</td>
                                            <td></td>
                                            <td>
                                                {{ $semester6->sum(function($mk) { 
                                                    return (int)$mk->sks_teori + (int)$mk->sks_praktik; 
                                                }) }}
                                                ({{ $semester6->sum('sks_teori') }}-{{ $semester6->sum('sks_praktik') }})
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Semester 7 & 8 --}}
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="card semester-card shadow-sm">
                            <div class="card-header">
                                <h3>Semester 7</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr><th>Kode</th><th>Mata Kuliah</th><th>SKS</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse($semester7 as $mk)
                                        <tr>
                                            <td>{{ $mk->kode_matkul }}</td>
                                            <td>{{ $mk->nama_matkul }}</td>
                                            <td>{{ $mk->sks_teori + $mk->sks_praktik }}({{ $mk->sks_teori }}-{{ $mk->sks_praktik }})</td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="3" class="text-center text-muted">Belum ada data</td></tr>
                                        @endforelse
                                        <tr class="table-total">
                                            <td>Total</td>
                                            <td></td>
                                            <td>
                                                {{ $semester7->sum(function($mk) { 
                                                    return (int)$mk->sks_teori + (int)$mk->sks_praktik; 
                                                }) }}
                                                ({{ $semester7->sum('sks_teori') }}-{{ $semester7->sum('sks_praktik') }})
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 mb-4">
                        <div class="card semester-card shadow-sm">
                            <div class="card-header">
                                <h3>Semester 8</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr><th>Kode</th><th>Mata Kuliah</th><th>SKS</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse($semester8 as $mk)
                                        <tr>
                                            <td>{{ $mk->kode_matkul }}</td>
                                            <td>{{ $mk->nama_matkul }}</td>
                                            <td>{{ $mk->sks_teori + $mk->sks_praktik }}({{ $mk->sks_teori }}-{{ $mk->sks_praktik }})</td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="3" class="text-center text-muted">Belum ada data</td></tr>
                                        @endforelse
                                        <tr class="table-total">
                                            <td>Total</td>
                                            <td></td>
                                            <td>
                                                {{ $semester8->sum(function($mk) { 
                                                    return (int)$mk->sks_teori + (int)$mk->sks_praktik; 
                                                }) }}
                                                ({{ $semester8->sum('sks_teori') }}-{{ $semester8->sum('sks_praktik') }})
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection