@extends('layouts.app')

@section('judul', 'Tentang TPL SVIPB')

@section('nav_tentang', 'active')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/tentang.css') }}">
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
<main class="tentang-section">

    {{-- ======================== VIDEO PROFIL ======================== --}}
    <div class="profile-video">
        <div class="ratio ratio-16x9 shadow-sm" style="border-radius: 8px; max-height: 450px;">

            <video controls autoplay muted loop style="width: 100%; height: 100%; object-fit: cover;">

                @if ($profil->video)
                    <source src="{{ asset('videos/TEKNOLOGI REKAYASA PERANGKAT LUNAK - Video Profil 2025 (1).mp4/' . $profil->video) }}" type="video/mp4">
                @else
                    <source src="{{ asset('videos/TEKNOLOGI REKAYASA PERANGKAT LUNAK - Video Profil 2025 (1).mp4') }}" type="video/mp4">
                @endif

                Browser Anda tidak mendukung tag video.
            </video>
        </div>
    </div>

    <div class="container py-5">
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
