@extends('layouts.app')

@section('title', 'Agridation Festival')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/berita.css') }}">
@endpush

@section('hero')
<section class="hero-section text-white text-center py-5">
    <div class="container">
        <h1 class="display-6">Selamat Datang Di Portal Teknologi Rekayasa Perangkat Lunak SV IPB</h1>
        <p class="lead">Syntax Error Compile Lagi</p>
    </div>
</section>
@endsection

@section('content')
<main class="article-section info-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <h1 class="article-title mb-3">{{ $berita->judul }}</h1>
                
                <div class="article-meta mb-4">
                    <span class="text-muted"><i class="bi bi-person-fill me-1"></i> Admin Portal</span>
                    <span class="text-muted ms-3"><i class="bi bi-calendar-event-fill me-1"></i> {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}</span>
                </div>

                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Agridation Festival" class="img-fluid rounded article-image mb-4">

                <div class="article-content">
                    {{$berita->isi}}
                </div>

                <hr class="my-4">

                <div class="share-section">
                    <strong>Bagikan Artikel:</strong>
                    <a href="#" class="ms-2 share-icon"><i class="bi bi-facebook fs-4"></i></a>
                    <a href="#" class="ms-2 share-icon"><i class="bi bi-twitter fs-4"></i></a>
                    <a href="#" class="ms-2 share-icon"><i class="bi bi-whatsapp fs-4"></i></a>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection