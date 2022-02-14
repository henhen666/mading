@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2 fw-bold">Edit Artikel</h2>
    </div>
    <div class="mt-4">
        <h4>Edit Artikel: {{ $article->judul }}</h4>
        <form action="/dashboard/articles/{{ $article->id }}" method="post" class="mt-4"
            enctype="multipart/form-data" autocomplete="off">
            @method('put')
            @csrf
            <input type="hidden" name="user_id" value={{ auth()->user()->id }}>

            <div class="row mb-3">
                <label for="judul" class="col-sm-2 col-form-label">Judul Artikel</label>
                <div class="col-sm-10">
                    <input type="text" name="judul"
                        class="form-control @error('judul')
                    is-invalid
                @enderror"
                        id="judul" value="{{ old('judul', $article->judul) }}">
                </div>
                @error('judul')
                    <small class="text-danger fw-bold">
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
                @enderror">{{ old('body', $article->body) }}</textarea>
                </div>
                @error('body')
                    <small class="text-danger fw-bold">
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
                            @if (old('category_id', $article->category_id) == $data->id)
                                <option value={{ old('category_id', $data->id) }} selected>
                                    {{ old('category', $data->category) }}
                                @else
                                <option value={{ old('category_id', $data->id) }}>
                                    {{ old('category', $data->category) }}
                            @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('category')
                    <small class="text-danger fw-bold">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="image" class="col-sm-2 col-form-label">Pilih Gambar</label>
                <div class="col-sm-10">
                    <input type="file" name="image" id="image" onchange="previewImage()"
                        class="form-control @error('image')
                        is-invalid
                    @enderror">
                    @error('image')
                        <small class="text-danger fw-bold">
                            {{ $message }}
                        </small>
                    @enderror
                    <input type="hidden" name="oldImage" value={{ $article->image }}>
                    <div class="row">
                        @if ($article->image)
                            <div class="col-sm-3 mt-2">
                                <label for="old-image">Old Image</label>
                                <img src="{{ asset('storage/' . $article->image) }}" id="old-image"
                                    class="img-fluid  mt-2">
                            </div>
                        @else
                        @endif
                        <div class="col-sm-3 mt-2">
                            <label for="new-image">New Image</label>
                            <img class="img-fluid img-preview mt-2 d-block" id="new-image">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Edit Artikel</button>
        </form>
    </div>
@endsection
