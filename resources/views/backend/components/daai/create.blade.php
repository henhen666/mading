@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Buat Link Baru </h2>
    </div>

    <div class="my-4">
        @if (session()->has('gagalTambah'))
            <div class="my-4">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('gagalTambah') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>

    <form action="/dashboard/daai_tv" method="post" class="mt-4" autocomplete="off">
        @csrf
        <div class="row mb-3">
            <label for="links" class="col-sm-2 col-form-label">YouTube Link:</label>
            <div class="col-sm-8">
                <textarea name="links" id="links" cols="30" rows="5"
                    class="form-control @error('links')
                    is-invalid
                @enderror">{{ old('links') }}</textarea>
            </div>
            @error('links')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Buat Link Baru</button>
    </form>
@endsection
