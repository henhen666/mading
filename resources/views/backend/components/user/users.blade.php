@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Users</h2>
        <div class="mb-2 mb-md-0">
            <h6 class="h6">Welcome Back, {{ auth()->user()->username }}!</h6>
        </div>
    </div>

    <div class="my-3">
        @if (session()->has('berhasilHapus'))
            <div class="my-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('berhasilHapus') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <table class="table table-responsive table-striped table-dark">
            <thead>
                <th>ID</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Actions</th>
                <th>STATUS</th>
                </tr>
            </thead>
            <tbody style="vertical-align: middle;">
                @foreach ($user as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                            <div class="d-flex">

                                @if ($data->username != auth()->user()->username)

                                @else
                                    <form action="/dashboard/users/{{ $data->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn ms-1 btn-danger"
                                            onclick="return confirm('Dengan Mengklik OK, Akun Ini Akan Dihapus Secara PERMANEN')">
                                            <span data-feather="trash-2"></span>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                        <td>
                            @if ($data->username != auth()->user()->username)
                                <button disabled class="btn btn-danger btn-sm">INACTIVE</button>
                            @else
                                <button class="btn btn-sm btn-primary">ACTIVE</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
