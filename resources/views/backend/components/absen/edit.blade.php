@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Edit Data Rekap Absen</h2>
    </div>
    <div class="col-md-5 col-md-6">

        <form action="/dashboard/rekap_absen/{{ $data->id }}" method="post" autocomplete="off">
            @method('put')
            @csrf
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-8">
                    <select name="kelas" class="form-select" autofocus>
                        @foreach ($kelas as $kelas)
                            @if (old('kelas', $data->kelas) == $kelas->kelas)
                                <option value="{{ $data->kelas }}" selected>{{ $data->kelas }}</option>
                            @else
                                <option value="{{ $kelas->kelas }}">{{ $kelas->kelas }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Hadir</label>
                <div class="col-sm-8">
                    <input type="number" name="hadir"
                        class="form-control @error('hadir')
                    'is-invalid'
                @enderror"
                        value="{{ old('hadir', $data->hadir) }}">
                </div>
                @error('hadir')
                    <small class="text-danger fw-bold">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Sakit</label>
                <div class="col-sm-8">
                    <input type="number" name="sakit"
                        class="form-control @error('sakit')
                    'is-invalid'
                @enderror"
                        value="{{ old('sakit', $data->sakit) }}">
                </div>
                @error('sakit')
                    <small class="text-danger fw-bold">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Izin</label>
                <div class="col-sm-8">
                    <input type="number" name="izin"
                        class="form-control @error('izin')
                    'is-invalid'
                @enderror"
                        value="{{ old('izin', $data->izin) }}">
                </div>
                @error('izin')
                    <small class="text-danger fw-bold">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Alpa</label>
                <div class="col-sm-8">
                    <input type="number" name="alpa"
                        class="form-control @error('alpa')
                    'is-invalid'
                @enderror"
                        value="{{ old('alpa', $data->alpa) }}">
                </div>
                @error('alpa')
                    <small class="text-danger fw-bold">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Edit Data</button>
        </form>
    </div>
@endsection
