@extends('layouts.app')

@section('title', 'Dosen')
@section('nav_dosen', 'active')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dosen.css') }}">
@endpush

@section('hero')
<section class="hero-section text-white text-center py-5">
    <div class="container">
        <h1 class="display-4">Selamat Datang Di Portal Teknologi Rekayasa Perangkat Lunak SV IPB</h1>
        <p class="lead-7">Syntax Error Compile Lagi</p>
    </div>
</section>
@endsection

@section('content')
<main class="dosen-section info-section py-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <header class="info-header">
                    <h2>Dosen Teknologi Rekayasa Perangkat Lunak SV IPB</h2>
                    <hr>
                </header>

                <div class="row">

                    {{-- LOOP DATA DARI DATABASE --}}
                    @foreach ($dosens as $dosen)
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="card dosen-card h-100 shadow-sm border-0 text-center">
                                <div class="card-body d-flex flex-column align-items-center">

                                    {{-- Foto dinamis --}}
                                    @if ($dosen->foto)
                                        <img src="{{ asset('storage/' . $dosen->foto) }}" 
                                             class="dosen-img rounded-circle mb-3"
                                             alt="Foto {{ $dosen->nama }}">
                                    @else
                                        <img src="{{ asset('images/default-user.png') }}"
                                             class="dosen-img rounded-circle mb-3"
                                             alt="Default Foto">
                                    @endif

                                    <h5 class="card-title mb-1">{{ $dosen->nama }}</h5>
                                    <p class="text-muted small mb-2">{{ $dosen->prodi }}</p>

                                    <span class="badge badge-aktif mt-auto">
                                        {{ $dosen->status ?? 'Aktif' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>

    </div>
</main>
@endsection
