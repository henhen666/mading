@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 fw-bold">Create New Advertisement</h1>
    </div>

    <form action="/dashboard/advertisement" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="mb-3">Pilih Gambar</label>
            <input type="file" name="image" id="image"
                class="form-control @error('image')
            is-invalid
            @enderror" onchange="previewImage()">
            @error('image')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
            <img class="img-fluid img-preview col-sm-5 mt-3">
        </div>
        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" cols="10" rows="3"
                class="form-control @error('deskripsi')
                is-invalid
            @enderror">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Buat Iklan</button>
    </form>
@endsection
