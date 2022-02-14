<marquee behavior="sliding" scrollamount="7" class="text-white bg-success my-2 py-1" direction="left">
    @if ($marquee->count())
        @foreach ($marquee as $data)
            <b>Dari: {{ $data->dari }} | {{ $data->body }} &nbsp; || &nbsp; </b>
        @endforeach
    @else
        <b>Tidak Ada Pengumuman OSIS Terkini</b>
    @endif
</marquee>
