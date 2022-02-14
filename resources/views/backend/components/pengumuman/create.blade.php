@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 fw-bold">Buat Pengumuman Baru </h1>
    </div>

    <form action="/dashboard/pengumuman" method="post" class="mt-4" autocomplete="off">
        @csrf
        <input type="hidden" name="user_id" value={{ auth()->user()->id }}>

        <div class="row mb-3">
            <label for="judul" class="col-sm-2 col-form-label">Judul Pengumuman</label>
            <div class="col-sm-8">
                <input type="text" name="judul"
                    class="form-control @error('judul')
                    is-invalid
                @enderror" autofocus
                    id="judul" value={{ old('judul') }}>
            </div>
            @error('judul')
                <small class="text-danger fw-bold">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="body" class="col-sm-2 col-form-label">Body</label>
            <div class="col-sm-8">
                <textarea name="body" id="body" cols="30" rows="5"
                    class="form-control @error('body')
                    is-invalid
                @enderror">{{ old('body') }}</textarea>
            </div>
            @error('body')
                <small class="text-danger fw-bold">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="body" class="col-sm-2 col-form-label">Pengumuman dari: </label>
            <div class="col-sm-8">
                <input name="dari" id="dari" cols="30" rows="5"
                    class="form-control @error('dari')
                    is-invalid
                @enderror"
                    value="{{ old('dari') }}">
            </div>
            @error('dari')
                <small class="text-danger fw-bold">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="body" class="col-sm-2 col-form-label">Pengumuman untuk: </label>
            <div class="col-sm-8">
                <select name="pengumuman_category" class="form-select">
                    @foreach ($category as $data)
                        <option value="{{ $data->id }}">{{ $data->category_pengumuman }}</option>
                    @endforeach
                </select>
            </div>
            @error('pengumuman_category')
                <small class="text-danger fw-bold">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Tambah Pengumuman</button>
    </form>
@endsection
