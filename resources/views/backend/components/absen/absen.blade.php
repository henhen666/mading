@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Rekap Absen</h2>
        <div class="btn-group">
            <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                [+] Data Rekap Baru
            </a>
            @if ($absen->count())
                <a href="/rekap_absen/truncate" class="btn btn-outline-danger"
                    onclick="return confirm('Apakah Anda Yakin Ingin Mengosongkan Seluruh Rekap Absen?')">[-]
                    Rekap Absen</a>
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

    <div class="collapse mb-3" id="collapseExample">
        <div class="card card-body">
            <form action="/dashboard/rekap_absen" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <label for="absen" class="mb-3">Pilih File</label>
                <input type="file" name="absen" id="absen"
                    class="form-control @error('absen')
            is-invalid
            @enderror">
                @error('absen')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
                <button type="submit" class="btn btn-success mt-2">Import Data</button>
            </form>
        </div>
    </div>
    @if ($absen->count())
        <h6 class="h6 fw-bold">
            Tanggal: {{ $absen[0]->created_at }}
            <table class="table mt-3 table-responsive table-striped table-danger">
                <thead>
                    <tr>
                        <th>Kelas</th>
                        <th>Hadir</th>
                        <th>Sakit</th>
                        <th>Izin</th>
                        <th>Alpa</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absen->take(11) as $absens)
                        <tr>
                            <td>{{ $absens->kelas }}</td>
                            <td>{{ $absens->hadir }}</td>
                            <td>{{ $absens->sakit }}</td>
                            <td>{{ $absens->izin }}</td>
                            <td>{{ $absens->alpa }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="/dashboard/rekap_absen/{{ $absens->id }}/edit"
                                        class="btn btn-sm btn-warning">
                                        <span data-feather='edit'></span>
                                    </a>
                                    <form action="/dashboard/rekap_absen/{{ $absens->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Apakah Anda Yakin?')"
                                            class="btn btn-danger btn-sm ms-1">
                                            <span data-feather="trash-2"></span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </h6>
    @else
        <h5 class="fw-bold text-center">Tidak Ada Rekap Absen Terbaru. Silakan Klik Tambah Data Rekap Baru!</h5>
    @endif
@endsection
