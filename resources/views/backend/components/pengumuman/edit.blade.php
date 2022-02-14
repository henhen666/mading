@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2 fw-bold">Edit Pengumuman</h2>
    </div>
    <div class="mt-4">
        <form action="/dashboard/pengumuman/{{ $pengumuman->id }}" method="post" autocomplete="off">
            @method('put')
            @csrf
            <input type="hidden" name="user_id" value={{ auth()->user()->id }}>

            <div class="row mb-3">
                <label for="judul" class="col-sm-2 col-form-label">Judul Pengumuman</label>
                <div class="col-sm-8">
                    <input type="text" name="judul"
                        class="form-control @error('judul')
                    'is-invalid'
                @enderror"
                        id="judul" value="{{ old('judul', $pengumuman->judul) }}">
                    @error('judul')
                        <small class="text-danger fw-bold fw-bold">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="body" class="col-sm-2 col-form-label">Body</label>
                <div class="col-sm-8">
                    <textarea name="body" class="form-control" cols="30"
                        rows="5">{{ old('body', $pengumuman->body) }}</textarea>
                    @error('body')
                        <small class="text-danger fw-bold">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="dari" class="col-sm-2 col-form-label">Pengumuman Dari:</label>
                <div class="col-sm-8">
                    <input type="text" name="dari"
                        class="form-control @error('dari')
                    is-invalid
                @enderror"
                        id="dari" value="{{ old('dari', $pengumuman->dari) }}">
                    @error('dari')
                        <small class="text-danger fw-bold">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="pengumuman_category" class="col-sm-2 col-form-label">Pengumuman untuk: </label>
                <div class="col-sm-8">
                    <select name="pengumuman_category" class="form-select">
                        @foreach ($category as $data)
                            @if (old('pengumuman_category', $pengumuman->pengumuman_category) == $data->id)
                                <option value="{{ $data->id }}" selected>{{ $data->category_pengumuman }}
                                </option>
                            @else
                                <option value="{{ $data->id }}">{{ $data->category_pengumuman }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('pengumuman_category')
                        <small class="text-danger fw-bold">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-success">Edit Pengumuman</button>
        </form>
    </div>
@endsection
