@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Dashboard</h2>
        <div class="mb-2 mb-md-0">
            <h6 class="h6">Welcome Back, {{ auth()->user()->username }}!</h6>
        </div>
    </div>


    <h3 class="h3">Recent Articles</h3>
    <a href="/dashboard/articles">See Full Articles Data</a>
    <table class="table table-responsive table-primary mt-3">
        <thead class="text-center">
            <tr>
                <td>ID</td>
                <td>Image</td>
                <td>Judul</td>
                <td>Body</td>
                <td>Category</td>
                <td>Author</td>
                <td>Created at</td>
                <td>Updated at</td>
            </tr>
        </thead>
        <tbody>
            @while ($no <= $article->count())
                @foreach ($article as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            @if ($data->image)
                                <img src="{{ asset('storage/' . $data->image) }}" width="150px">
                            @else
                                <img src="/img/default.jpg" width="150px">
                            @endif
                        </td>
                        <td>{{ $data->judul }}</td>
                        <td>{{ $data->body }}</td>
                        <td>{{ $data->category->category }}</td>
                        <td>{{ $data->user->username }}</td>
                        <td>{{ $data->created_at->diffForHumans() }}</td>
                        <td>{{ $data->updated_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            @endwhile
        </tbody>
    </table>

    <h3 class="mt-4 h3">Recent Announcements </h3>
    <a href="/dashboard/pengumuman">See Full Announcements Data</a>
    <table class="table table-responsive table-success mt-3">
        <thead class="text-center">
            <tr>
                <td>Judul</td>
                <td>Body</td>
                <td>Author</td>
                <td>Created at</td>
                <td>Updated at</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengumuman as $data)
                <tr>
                    <td>{{ $data->judul }}</td>
                    <td>{{ $data->body }}</td>
                    <td>{{ $data->user->username }}</td>
                    <td>{{ $data->created_at->diffForHumans() }}</td>
                    <td>{{ $data->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
