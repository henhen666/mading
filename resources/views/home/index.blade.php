@extends('layouts.main')

@section('content')
    <div class="text-white">
        <div class="row">
            <div class="col">
                <h3 class="h3 fw-bold mb-2 text-center">Artikel Terbaru</h3>
                @include('components.article')
            </div>
            <div class="col">
                <h3 class="h3 fw-bold mb-2 text-center">Advertisement</h3>
                @include('components.advertisement')
            </div>
            <div class="col">
                <h3 class="h3 fw-bold text-center mb-2">DAAI TV</h3>
                @include('components.daai')
            </div>
        </div>

        @include('components.marquee')

        <div class="row">
            <div class="col">
                @include('components.rekap_absen')
            </div>
            <div class="col">
                <h3 class="h3 fw-bold text-center mb-2">Pengumuman</h3>
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @include('components.pengumuman')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
