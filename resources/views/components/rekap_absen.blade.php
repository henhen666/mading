<h3 class="h3 fw-bold text-center mb-2">Rekap Absensi Kelas</h3>
@if ($absen->count())

    @foreach ($absen->take(1) as $tanggal)
        <small>Tanggal: {{ $tanggal->created_at }}</small>
    @endforeach

    <table class="table table-responsive table-striped table-danger table sticky-header mt-3">
        <thead style="vertical-align: middle" class="text-center">
            <tr>
                <td></td>
                <td colspan="11">Kelas</td>
            </tr>
            <tr>
                <td></td>
                @foreach ($absen as $data)
                    <td>{{ $data->kelas }}</td>
                @endforeach
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <td>Hadir</td>
                @foreach ($absen as $data)
                    <td>{{ $data->hadir }}</td>
                @endforeach
            </tr>
            <tr>
                <td>Sakit(S)</td>
                @foreach ($absen as $data)
                    <td>{{ $data->sakit }}</td>
                @endforeach
            </tr>
            <tr>
                <td>Izin(I)</td>
                @foreach ($absen as $data)
                    <td>{{ $data->izin }}</td>
                @endforeach
            </tr>
            <tr>
                <td>Alpa(A)</td>
                @foreach ($absen as $data)
                    <td>{{ $data->alpa }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>

@else
    <h4 class="text-center">Tidak Ada Rekap Absen Terkini</h4>
@endif
