@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Advertisement</h2>
        <div class="btn-group">
            <a href="/dashboard/advertisement/create" class="btn btn-outline-primary">[+] Iklan Baru</a>
            @if ($iklan->count())
                <a href="/advertisement/truncate" class="btn btn-outline-danger"
                    onclick="return confirm('Apakah Anda Yakin Ingin Mengosongkan Pengumuman?')">[-] Iklan</a>
            @else
            @endif
        </div>
    </div>

    <div class="my-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    @if ($iklan->count())
        <table class="table table-responsive table-dark table-striped">
            <thead class="text-center">
                <tr>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Createh At</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody style="vertical-align: middle;">
                @foreach ($iklan as $data)
                    <tr>
                        <td>
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('storage/' . $data->image) }}" width="40%">
                            </div>
                        </td>
                        <td>
                            {{ $data->deskripsi }}
                        </td>
                        <td>
                            {{ $data->created_at }}
                            ({{ $data->created_at->diffForHumans() }})
                        </td>
                        <td>
                            <form action="/dashboard/advertisement/{{ $data->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Iklan Ini?')">
                                    <span data-feather="trash-2"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h5 class="fw-bold text-center mt-3">Tidak Ada Iklan. Silakan Klik Buat Iklan Baru!</h5>
    @endif
@endsection
