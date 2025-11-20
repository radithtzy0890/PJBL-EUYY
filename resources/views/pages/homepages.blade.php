@extends('layouts.app')

@section('title', 'Halaman Utama')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/homepages.css') }}">
@endpush

@section('hero')
<section class="hero-section text-white text-center py-5">
    <div class="container">
         <h1 class="display-4">Selamat Datang Di Portal Teknologi Rekayasa Perangkat Lunak SV IPB <br></h1>
        <p class="lead">Syntax Error Compile Lagi</p>
    </div>
</section>
@endsection

@section('content')
<section class="info-section">
    <div class="mb-4" style="animation: fadeIn 0.5s ease-out forwards; opacity: 0;">
        <div class="ratio ratio-16x9 shadow-sm" style="border-radius: 8px; max-height: 450px;">
            <video controls autoplay muted loop style="width: 100%; height: 100%; object-fit: cover;">
            <source src="{{ asset('videos/TEKNOLOGI REKAYASA PERANGKAT LUNAK - Video Profil 2025 (1).mp4') }}" type="video/mp4">
                Browser Anda tidak mendukung tag video.
            </video>
        </div>
    </div>
            
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <header class="info-header">
                    <h2>Kumpulan Karya Mahasiswa Teknologi Rekayasa Perangkat Lunak SV IPB</h2>
                    <hr>
                </header>
                <div class="row">
                    @foreach ($karyas as $karya)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ $karya->preview_karya ? asset('storage/' . $karya->preview_karya) : 'https://placehold.co/600x400/333/white?text=Aplikasi+1' }}" class="card-img-top" alt="Karya Mahasiswa">
                            <div class="card-body d-flex flex-column">
                                <span class="badge text-white mb-2" style="background-color: var(--warna-utama);">{{ $karya->kategori }}</span>
                                <h5 class="card-title">{{ $karya->judul }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $karya->tim_pembuat }}</h6>
                                
                                <div class="text-warning mb-2">
                                    @php
                                            $avgRating = $karya->reviews->avg('rating') ?? 0;
                                            $reviewCount = $karya->reviews->count();
                                        @endphp
                                        
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= floor($avgRating))
                                                <i class="bi bi-star-fill"></i>
                                            @elseif ($i <= ceil($avgRating) && $avgRating - floor($avgRating) >= 0.5)
                                                <i class="bi bi-star-half"></i>
                                            @else
                                                <i class="bi bi-star"></i>
                                            @endif
                                        @endfor
                                        
                                        <h6 class="mt-2 text-muted">
                                            {{ number_format($avgRating, 1) }} ({{ $reviewCount }} ulasan)
                                        </h6>
                                    </div>
                                
                                <a href="/karya/{{$karya->id}}" class="btn btn-tpl btn-sm mt-auto align-self-end">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="text-center mt-3">
                    <a href="/karya" class="btn btn-tpl btn-lg px-5 py-3">Cari Karya Lainnya</a>
                    <a href="{{ route('unggah') }}" class="btn btn-tpl btn-lg px-5 py-3 ms-2">Unggah Karya</a>
                </div>
            </div>
        </div>
    <div class="container my-5 py-4" style="background-color: #f8f9fa;">
    <h2 class="text-center mb-4">Berita TPL SVIPB</h2>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            {{-- KARTU 1: National Business Idea Competition (Juara 3 Pioneers 4.0) --}}
            <div class="card mb-4 shadow-sm text-dark">
                <div class="row g-0">
                    <div class="col-md-4">
                        <a href="{{ route('berita', ['id' => 2]) }}">
                            {{-- GAMBAR: Berita tpl.png (Gambar Pioneers 4.0) --}}
                            <img src="{{ asset('images/Berita tpl.png') }}" 
                                 class="img-fluid rounded-top rounded-md-start" 
                                 alt="National Business Idea Competition">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">
                                <a href="{{ route('berita', ['id' => 2]) }}" class="text-decoration-none text-dark">
                                    National Business Idea Competition
                                </a>
                            </h5>
                            <p class="card-text text-muted">
                                Mahasiswa TPL SV IPB berhasil meraih Juara 3 dalam ajang National Business Idea Competition pada Pioneers 4.0. Prestasi ini diraih melalui gagasan bisnis inovatif...
                            </p>
                            <p class="card-text d-flex justify-content-between align-items-center">
                                <small class="text-muted">27 September 2025</small>
                                <a href="#" class="text-muted"><i class="bi bi-share-fill"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KARTU 2: Agridation Festival --}}
            <div class="card mb-4 shadow-sm text-dark">
                 <div class="row g-0">
                    <div class="col-md-4">
                        <a href="{{ route('berita', ['id' => 1]) }}">
                            {{-- GAMBAR: Agridation Team --}}
                            <img src="{{ asset('images/Berita tpl.png') }}" 
                                 class="img-fluid rounded-top rounded-md-start" 
                                 alt="Agridation Festival">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">
                                <a href="{{ route('berita', ['id' => 1]) }}" class="text-decoration-none text-dark">
                                    Agridation Festival
                                </a>
                            </h5>
                            <p class="card-text text-muted">
                                Mahasiswa TPL SV IPB ikut meramaikan Agridation Festival lewat tenant spesial yang menampilkan karya inovatif...
                            </p>
                            <p class="card-text d-flex justify-content-between align-items-center">
                                <small class="text-muted">5 hari yang lalu</small>
                                <a href="#" class="text-muted"><i class="bi bi-share-fill"></i></a>
                            </p>
                        </div>  
                    </div>
                </div>
            </div>
            
            {{-- KARTU 2: Agridation Festival --}}
        </div>
    </div>
    </div>
</section>
@endsection