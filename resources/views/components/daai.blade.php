@if ($daai->count())
    @foreach ($daai as $data)
        <div style="display: flex; justify-content: center;">
            <iframe width="auto" height="auto" src="{{ $data->links }}" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    @endforeach
@else
    <h4 class="text-center">Tidak Ada Tayangan Terbaru</h4>
@endif
