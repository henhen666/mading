@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Buat Data Rekap Absen</h2>
    </div>

    @if (session()->has('gagalTambah'))
        <div class="my-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('gagalTambah') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>

    @endif

    <form action="/dashboard/rekap_absen" method="post" autocomplete="off">
        @csrf
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-8">
                <select name="kelas_id" class="form-select" autofocus>
                    @foreach ($kelas as $data)
                        <option value="{{ $data->id }}">{{ $data->kelas }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-8">
                <input type="date" name="tanggal" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Hadir</label>
            <div class="col-sm-8">
                <input type="number" name="hadir"
                    class="form-control @error('hadir')
                    is-invalid
                @enderror">
            </div>
            @error('hadir')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Sakit</label>
            <div class="col-sm-8">
                <input type="number" name="sakit"
                    class="form-control @error('sakit')
                    is-invalid
                @enderror">
            </div>
            @error('sakit')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Izin</label>
            <div class="col-sm-8">
                <input type="number" name="izin"
                    class="form-control @error('izin')
                    is-invalid
                @enderror">
            </div>
            @error('izin')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Alpa</label>
            <div class="col-sm-8">
                <input type="number" name="alpa"
                    class="form-control @error('alpa')
                    is-invalid
                @enderror">
            </div>
            @error('alpa')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
    {{-- <form action="/dashboard/rekap_absen" method="post">
        @csrf
        <table class="table table-responsive table-striped table-primary">
            <thead>
                <tr>
                    <td colspan="5">
                        <input type="date" name="tanggal" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>Hadir</td>
                    <td>Sakit(S)</td>
                    <td>Izin(I)</td>
                    <td>Alpa(A)</td>
                </tr>
            </thead>
            <tbody style="vertical-align: middle;">
                @foreach ($kelas as $data)
                    <tr>
                        <td>{{ $data->kelas }}</td>
                        <td>
                            <input type="number" name="hadir"
                                class="form-control @error('hadir')
                                'is-invalid'
                            @enderror">
                            @error('hadir')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </td>
                        <td>
                            <input type="number" name="sakit"
                                class="form-control @error('sakit')
                                'is-invalid'
                            @enderror">
                            @error('sakit')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </td>
                        <td>
                            <input type="number" name="izin"
                                class="form-control @error('izin')
                                'is-invalid'
                            @enderror">
                            @error('izin')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </td>
                        <td>
                            <input type="number" name="alpla"
                                class="form-control @error('alpa')
                                'is-invalid'
                            @enderror">
                            @error('hadir')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5">
                        <button type="submit" class="btn btn-success w-100">Submit</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form> --}}
@endsection
