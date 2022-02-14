@if ($pengumuman->count())
    <div class="carousel-item active" data-bs-interval="8000">
        <div class="card bg-danger border-primary mb-3 ">
            <div class="card-header"><span class="fw-bold">Dari:
                    {{ $pengumuman[0]->user->username }}</span></div>
            <div class="card-body">
                <h5 class="card-title">{{ $pengumuman[0]->judul }}</h5>
                <p class="card-text">{{ $pengumuman[0]->body }}</p>
            </div>
        </div>
    </div>
    @foreach ($pengumuman->skip(1) as $data)
        <div class="carousel-item" data-bs-interval="8000">
            <div class="card bg-danger border-primary">
                <div class=" card-header"><span class="fw-bold">Dari: {{ $data->dari }}</span></div>
                <div class="card-body">
                    <h5 class="card-title">{{ $data->judul }}</h5>
                    <p class="card-text">{{ $data->body }}</p>
                </div>
            </div>
        </div>
    @endforeach
@else
    <h4 class="text-center">Tidak Ada Pengumuman Terbaru</h4>
@endif
