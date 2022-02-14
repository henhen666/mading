@if ($article->count())
    <div id="carouselExampleCaptions" class="carousel slide mt-3" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
            @if ($article->count())
                <div class="carousel-item active" data-bs-interval="5000">
                    @if ($article[0]->image)
                        <img src="{{ asset('storage/' . $article[0]->image) }}" class="d-block"
                            style="width: 400px; margin-left: auto; margin-right: auto;">
                    @else
                        <img src="img/default.jpg" class="d-block"
                            style="width: 400px; margin-left: auto; margin-right: auto;">
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="fw-bold">{{ $article[0]->judul }}</h5>
                        <p>{{ $article[0]->body }}</p>
                        <small>By:
                            @if ($article[0]->user->username)
                                {{ $article[0]->user->username }}
                            @else
                                -
                            @endif
                            | In:
                            {{ $article[0]->category->category }}
                        </small>
                    </div>
                </div>
            @endif

            @foreach ($article->skip(1) as $data)
                <div class="carousel-item" data-bs-interval="5000">
                    @if ($data->image)
                        <img src="{{ asset('storage/' . $data->image) }}" class="d-block"
                            style="width: 370px; margin-left: auto; margin-right: auto;">
                    @else
                        <img src="img/default.jpg" class="d-block"
                            style="width: 370px; margin-left: auto; margin-right: auto;">
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="fw-bold">{{ $data->judul }}</h5>
                        <p>{{ $data->body }}</p>
                        <small>By:
                            @if ($article[0]->user->username)
                                {{ $article[0]->user->username }}
                            @else
                                -
                            @endif
                            | In: {{ $data->category->category }}
                        </small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    <h4 class="text-center">Tidak Ada Artikel Terbaru</h4>
@endif
