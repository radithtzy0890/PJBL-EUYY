@extends('layouts.app')

@section('title', 'Tentang TPL SV IPB')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/tentang.css') }}">
@endpush

@section('hero')
<section class="hero-section text-white text-center py-5" style="background-color: #263c92;">
    <div class="container">
        <h1 class="display-4 fw-bold">Selamat Datang Di Portal Teknologi Rekayasa Perangkat Lunak SV IPB</h1>
        <p class="lead-7 opacity-75">Syntax Error Compile Lagi</p>
    </div>
</section>
@endsection

@section('content')
<main class="tentang-section py-5">

    {{-- ======================== VIDEO PROFIL (Gaya Homepage) ======================== --}}
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10"> {{-- Pembatas lebar agar video rapi seperti di Homepage --}}
                <div class="ratio ratio-16x9 shadow-lg" style="border-radius: 15px; overflow: hidden; border: 1px solid #ddd;">
                    <video controls autoplay muted loop style="width: 100%; height: 100%; object-fit: cover;">
                        
                        {{-- Logika Video: Cek apakah ada video custom di database --}}
                        @if (!empty($profil->video))
                            <source src="{{ asset('storage/' . $profil->video) }}" type="video/mp4">
                        @else
                            {{-- Video Default --}}
                            <source src="{{ asset('videos/TEKNOLOGI REKAYASA PERANGKAT LUNAK - Video Profil 2025 (1).mp4') }}" type="video/mp4">
                        @endif

                        Browser Anda tidak mendukung tag video.
                    </video>
                </div>
            </div>
        </div>
    </div>

    {{-- ======================== VISI, MISI, CAPAIAN (Gaya Original Anda) ======================== --}}
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                {{-- ======================== VISI ======================== --}}
                <div class="info-box">
                    <div class="info-box-header">
                        <h3>Visi</h3>
                    </div>
                    <div class="info-box-body">
                        <p>{{ $profil->visi ?? 'Belum ada data visi.' }}</p>
                    </div>
                </div>

                {{-- ======================== MISI ======================== --}}
                <div class="info-box">
                    <div class="info-box-header">
                        <h3>Misi</h3>
                    </div>
                    <div class="info-box-body">
                        {!! nl2br(e($profil->misi ?? 'Belum ada data misi.')) !!}
                    </div>
                </div>

                {{-- ======================== CAPAIAN ======================== --}}
                <div class="info-box">
                    <div class="info-box-header">
                        <h3>Capaian</h3>
                    </div>
                    <div class="info-box-body">
                        {!! nl2br(e($profil->capaian ?? 'Belum ada data capaian.')) !!}
                    </div>
                </div>

            </div>
        </div>
    </div>

</main>
@endsection