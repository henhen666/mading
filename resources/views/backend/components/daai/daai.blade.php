@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">DAAI TV </h2>
        <div class="btn-group">
            <a href="/dashboard/daai_tv/create" class="btn btn-outline-primary">[+] Link Baru</a>
            @if ($daai->count())
                <a href="/daai_tv/truncate" class="btn btn-outline-danger"
                    onclick="return confirm('Apakah Anda Yakin Ingin Mengosongkan Link?')">[-]
                    Link DAAI TV</a>
            @else
            @endif
        </div>
    </div>

    @if (session()->has('success'))
        <div class="my-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Petunjuk Mengupload Link
    </a>


    @if ($daai->count())
        <table class="table table-responsive table-primary mt-2">
            <thead class="text-center">
                <tr>
                    <th>YouTube</th>
                    <th>Link</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="vertical-align: middle;">
                @foreach ($daai as $data)
                    <tr>

                        <td class="d-flex justify-content-center">
                            <iframe width="auto" height="auto" src="{{ $data->links }}" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </td>
                        <td>
                            {{ $data->links }}
                        </td>
                        <td>
                            {{ $data->created_at->diffForHumans() }}
                        </td>
                        <td>
                            {{ $data->updated_at->diffForHumans() }}
                        </td>
                        <td>
                            <form action="/dashboard/daaitv/{{ $data->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Link Ini?')">
                                    <span data-feather="trash-2"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4 class="text-center fw-bold">Tidak Ada Tayangan Baru. Silakan Klik Buat Link Baru!</h4>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Petunjuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ol list="1">
                        <li>Klik Share/Bagikan Pada Video YouTube</li>
                        <li>Pilih Opsi Embed</li>
                        <li>Pada Bagian Link, Copy <b>Hanya</b> Bagian src Saja dan <b>Tanpa</b> Kutip <img
                                src="/img/tambah_link.jpg" style="width: 400px;"></li>
                        <li>Link Berhasil Ditambahkan</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
