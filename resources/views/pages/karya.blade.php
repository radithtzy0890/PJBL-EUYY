@extends('layouts.app')

@section('title', 'Karya Mahasiswa')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/karya.css') }}">
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
<section class="info-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <header class="info-header text-center mb-4">
                    <h2>Kumpulan Karya Mahasiswa TPL SV IPB</h2>
                    <hr>
                </header>
            
                {{-- Search Bar --}}
                <div class="row justify-content-center mb-4">
                    <div class="col-md-8 col-lg-6">
                        <form action="{{ route('karya.user') }}" method="GET">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                                <input type="text" 
                                       class="form-control" 
                                       name="search" 
                                       placeholder="Cari karya..." 
                                       value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Filter Kategori --}}
                <div class="row justify-content-center mb-4">
                    <div class="col-md-10 text-center">
                        <a href="{{ route('karya.user') }}" 
                           class="btn btn-sm {{ !request('kategori') ? 'btn-primary' : 'btn-outline-primary' }} me-2 mb-2">
                            Semua
                        </a>
                        <a href="{{ route('karya.user', ['kategori' => 'Web Development']) }}" 
                           class="btn btn-sm {{ request('kategori') == 'Web Development' ? 'btn-primary' : 'btn-outline-primary' }} me-2 mb-2">
                            Web Development
                        </a>
                        <a href="{{ route('karya.user', ['kategori' => 'Mobile Apps']) }}" 
                           class="btn btn-sm {{ request('kategori') == 'Mobile Apps' ? 'btn-primary' : 'btn-outline-primary' }} me-2 mb-2">
                            Mobile Apps
                        </a>
                        <a href="{{ route('karya.user', ['kategori' => 'Data Science']) }}" 
                           class="btn btn-sm {{ request('kategori') == 'Data Science' ? 'btn-primary' : 'btn-outline-primary' }} me-2 mb-2">
                            Data Science
                        </a>
                        <a href="{{ route('karya.user', ['kategori' => 'IoT']) }}" 
                           class="btn btn-sm {{ request('kategori') == 'IoT' ? 'btn-primary' : 'btn-outline-primary' }} me-2 mb-2">
                            IoT
                        </a>
                        <a href="{{ route('karya.user', ['kategori' => 'Game Development']) }}" 
                           class="btn btn-sm {{ request('kategori') == 'Game Development' ? 'btn-primary' : 'btn-outline-primary' }} me-2 mb-2">
                            Game Development
                        </a>
                    </div>
                </div>
                    
                {{-- Grid Karya --}}
                <div class="row">
                    @forelse ($karyas as $karya)
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm border-0">
                                @if($karya->preview_karya)
                                    <img src="{{ asset('storage/' . $karya->preview_karya) }}" 
                                         class="card-img-top" 
                                         alt="{{ $karya->judul }}"
                                         style="height: 250px; object-fit: cover;">
                                @else
                                    <div style="height: 250px; background: #333; color: white; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                                        {{ $karya->judul }}
                                    </div>
                                @endif
                                
                                <div class="card-body d-flex flex-column">
                                    <span class="badge text-white mb-2" style="background-color: var(--warna-utama);">
                                        {{ $karya->kategori }}
                                    </span>
                                    <h5 class="card-title">{{ Str::limit($karya->judul, 50) }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Oleh: {{ $karya->tim_pembuat }}</h6>
                                    
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
                                    
                                    <a href="{{ route('karya.show', $karya->id) }}" 
                                       class="btn btn-tpl btn-sm mt-auto">
                                        Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i> Tidak ada karya yang ditemukan.
                            </div>
                        </div>
                    @endforelse
                </div>

                {{-- Tombol Kembali --}}
                <div class="text-center mt-4">
                    <a href="{{ route('home') }}" class="btn btn-secondary btn-lg">
                        <i class="bi bi-arrow-left me-2"></i>Kembali ke Home
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection