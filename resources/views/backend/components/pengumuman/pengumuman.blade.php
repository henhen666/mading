@extends('layouts.dashboard')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Pengumuman </h2>
        <div class="btn-group">
            <a href="/dashboard/pengumuman/create" class="btn btn-outline-primary">[+] Pengumuman Baru</a>

            @if ($pengumuman->count())
                <a href="/pengumuman/truncate" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin?')">
                    [-] Pengumuman
                </a>
            @else
            @endif
        </div>
    </div>

    @if (session()->has('success'))
        <div class="my-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="my-3">
        <small class="fw-bold">Maks. Jumlah Pengumuman Untuk Ditampilkan: 4</small>
    </div>

    @if ($pengumuman->count())
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <h4 class="fw-bold text-center">Seluruh Siswa</h4>
                @foreach ($pengumuman->where('pengumuman_category', 2)->take(4) as $data)
                    <div class="card bg-primary border-danger text-white mb-3">
                        <div class=" card-header">
                            <span class="fw-bold">Dari: {{ $data->dari }}</span> |
                            <small>Ditulis oleh: {{ $data->user->username }}</small>
                            <div class="d-flex" style="float: right;">
                                <a href="/dashboard/pengumuman/{{ $data->id }}/edit" class="btn- btn-sm btn-success">
                                    <span data-feather='edit'></span>
                                </a>
                                <form action="/dashboard/pengumuman/{{ $data->id }}" method="post"
                                    class="d-inline ms-2">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Pengumuman Ini?')">
                                        <span data-feather='trash-2'></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->judul }}</h5>
                            <p class="card-text">{{ $data->body }}</p>
                        </div>
                        <div class="card-footer">
                            <small>Created At: {{ $data->created_at }} || {{ $data->created_at->diffForHumans() }}
                            </small>
                            <br>
                            <small>Updated At: {{ $data->updated_at }} ||
                                {{ $data->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach

                {{-- Pengumuman Tidak Aktif --}}
                <hr class="p-1">
                <h4 class="h4 text-danger">Pengumuman Tidak Aktif</h4>
                @foreach ($pengumuman->where('pengumuman_category', 2)->skip(4) as $data)
                    <div class="card bg-primary border-danger text-white mb-3">
                        <div class=" card-header">
                            <span class="fw-bold">Dari: {{ $data->user->username }}</span>
                            <div class="d-flex" style="float: right;">
                                <a href="/dashboard/pengumuman/{{ $data->id }}/edit" class="btn- btn-sm btn-success">
                                    <span data-feather='edit'></span>
                                </a>
                                <form action="/dashboard/pengumuman/{{ $data->id }}" method="post"
                                    class="d-inline ms-2">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Pengumuman Ini?')">
                                        <span data-feather='trash-2'></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->judul }}</h5>
                            <p class="card-text">{{ $data->body }}</p>
                        </div>
                        <div class="card-footer">
                            <small>Created At: {{ $data->created_at }} || {{ $data->created_at->diffForHumans() }}
                            </small>
                            <br>
                            <small>Updated At: {{ $data->updated_at }} ||
                                {{ $data->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="col-md-6 col-lg-6">
                <h4 class="fw-bold text-center">OSIS</h4>
                @foreach ($pengumuman->where('pengumuman_category', 1)->take(4) as $data)
                    <div class="card text-dark bg-warning mb-3">
                        <div class="card-header fw-bold">Dari: {{ $data->dari }} | Ditulis Oleh:
                            {{ $data->user->username }}
                            <div class="d-flex" style="float: right;">
                                <a href="/dashboard/pengumuman/{{ $data->id }}/edit" class="btn- btn-sm btn-success">
                                    <span data-feather='edit'></span>
                                </a>
                                <form action="/dashboard/pengumuman/{{ $data->id }}" method="post"
                                    class="d-inline ms-2">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Pengumuman Ini?')">
                                        <span data-feather='trash-2'></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->judul }}</h5>
                            <p class="card-text">{{ $data->body }}</p>
                        </div>
                        <div class="card-footer">
                            <small>Created At: {{ $data->created_at }} || {{ $data->created_at->diffForHumans() }}
                            </small>
                            <br>
                            <small>Updated At: {{ $data->updated_at }} ||
                                {{ $data->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach

                {{-- Pengumuman Tidak Aktif --}}

                {{-- OSIS --}}
                <hr class="p-1">
                <h4 class="h4 text-danger">Pengumuman Tidak Aktif</h4>
                @foreach ($pengumuman->where('pengumuman_category', 1)->skip(4) as $data)
                    <div class="card text-dark bg-warning mb-3">
                        <div class="card-header fw-bold">Dari: {{ $data->dari }} | Ditulis Oleh:
                            {{ $data->user->username }}
                            <div class="d-flex" style="float: right;">
                                <a href="/dashboard/pengumuman/{{ $data->id }}/edit" class="btn- btn-sm btn-success">
                                    <span data-feather='edit'></span>
                                </a>
                                <form action="/dashboard/pengumuman/{{ $data->id }}" method="post"
                                    class="d-inline ms-2">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Pengumuman Ini?')">
                                        <span data-feather='trash-2'></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->judul }}</h5>
                            <p class="card-text">{{ $data->body }}</p>
                        </div>
                        <div class="card-footer">
                            <small>Created At: {{ $data->created_at }} ||
                                {{ $data->created_at->diffForHumans() }}</small>
                            <br>
                            <small>Updated At: {{ $data->updated_at }} ||
                                {{ $data->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    @else
        <h5 class="fw-bold text-center">Tidak Ada Pengumuman Terbaru. Silakan Buat Pengumuman Baru Untuk Ditampilkan!</h5>
    @endif
@endsection
