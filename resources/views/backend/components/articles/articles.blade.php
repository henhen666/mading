@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Articles</h2>
        <div class="btn-group">
            <a href="/dashboard/articles/create" class="btn btn-outline-primary">[+] Artikel Baru</a>
            @if ($article->count())
                <a href="/article/truncate" class="btn btn-outline-danger"
                    onclick="return confirm('Apakah Anda Yakin Ingin Mengosongkan Artikel?')">[-] Artikel</a>
            @else
            @endif
        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($article->count())
        <table class="table table-responsive table-primary table-striped">
            <thead class="text-center">
                <tr>
                    <th>Image</th>
                    <th>Judul</th>
                    <th>Body</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Created at</th>
                    <th>Uphated at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="vertical-align: middle">
                @if ($article->count())
                    @foreach ($article as $data)
                        <tr>
                            <td>
                                @if ($data->image)
                                    <img src="{{ asset('storage/' . $data->image) }}" class="d-block"
                                        style="width: 150px;">
                                @else
                                    <img src="/img/default.jpg" class="d-block" style="width: 150px;">
                                @endif
                            </td>
                            <td>
                                {{ $data->judul }}
                            </td>
                            <td>
                                {{ $data->body }}
                            </td>
                            <td>
                                <a href="/dashboard/articles?category={{ $data->category->slug }}">
                                    {{ $data->category->category }}
                                </a>
                            </td>
                            <td>
                                <a href="/dashboard/articles?user={{ $data->user->username }}">
                                    {{ $data->user->username }}
                                </a>
                            </td>
                            <td>{{ $data->created_at->diffForHumans() }}</td>
                            <td>{{ $data->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="/dashboard/articles/{{ $data->id }}/edit" class="btn btn-sm btn-warning">
                                        <span data-feather="edit"></span>
                                    </a>
                                    <form action="/dashboard/articles/{{ $data->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger ms-1"
                                            onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')">
                                            <span data-feather="trash-2"></span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                @endif
            </tbody>
        </table>
    @else
        <h5 class="h5 fw-bold text-center">Tidak Ada Artikel Terbaru. Silakan Buat Artikel Untuk Ditampilkan.</h5>
    @endif
    <div class="d-flex justify-content-center">
        {{ $article->links() }}
    </div>

@endsection
