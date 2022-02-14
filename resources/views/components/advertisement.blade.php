@if ($iklan->count())
    <div id="carouselExampleCaptions" class="carousel carousel-dark slide mt-3""
        data-bs-ride=" carousel">
        <div class="carousel-inner">
            @if ($iklan->count())
                <div class="carousel-item active" data-bs-interval="4000">
                    <img src="{{ asset('storage/' . $iklan[0]->image) }}" class="d-block"
                        style="width: 380px; margin: auto;">
                </div>
            @endif
            @foreach ($iklan->skip(1) as $data)
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="{{ asset('storage/' . $data->image) }}" class="d-block"
                        style="width: 380px; margin: auto;">
                </div>
            @endforeach
        </div>
    </div>
@else
    <h4 class="text-center">Tidak Ada Iklan Terbaru</h4>
@endif
