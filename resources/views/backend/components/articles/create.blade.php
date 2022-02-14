@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 fw-bold">Create New Article</h1>
        <h6 class="h6">Penulis artikel: {{ auth()->user()->username }}</h6>
        <small>Bukan akun anda? <a href="/login">Login di sini</a></small>
    </div>
    <a href="/dashboard/articles"><i class="bi bi-box-arrow-left"></i>&nbsp; Back To Articles Page</a>

    <div class="my-3">
        @if (session()->has('articleError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('articleError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <form action="/dashboard/articles" method="post" class="mt-3 mb-3" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value={{ auth()->user()->id }}>

        <div class="row mb-3">
            <label for="judul" class="col-sm-2 col-form-label">Judul Artikel</label>
            <div class="col-sm-10">
                <input type="text" name="judul"
                    class="form-control @error('judul')
                    is-invalid
                @enderror" id="judul"
                    value={{ old('judul') }}>
            </div>
            @error('judul')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="body" class="col-sm-2 col-form-label">Body</label>
            <div class="col-sm-10">
                <textarea name="body" id="body" cols="30" rows="5"
                    class="form-control @error('body')
                    is-invalid
                @enderror">{{ old('body') }}</textarea>
            </div>
            @error('body')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="kategori" class="col-sm-2 col-form-label">Kategori Artikel</label>
            <div class="col-sm-10">
                <select name="category_id" id="category_id"
                    class="form-select @error('category')
                    is-invalid
                @enderror">
                    @foreach ($category as $data)
                        <option value={{ $data->id }}>{{ $data->category }}</option>
                    @endforeach
                </select>
            </div>
            @error('category')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="image" class="col-sm-2 col-form-label">Pilih Gambar</label>
            <div class="col-sm-10">
                <input type="file" name="image" id="image"
                    class="form-control @error('image')
                        is-invalid
                    @enderror"
                    onchange="previewImage()">
                @error('image')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
                <img class="img-fluid img-preview col-sm-5 mt-3">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Buat Artikel</button>
    </form>
@endsection
