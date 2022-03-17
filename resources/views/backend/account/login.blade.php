@extends('layouts.main')


@section('content')
    <div class="container text-white">
        <h2 class="h2 fw-bold">Silakan Login!</h2>
        @if (session()->has('loginError'))
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            {{-- sukses registrasi --}}
        @elseif (session()->has('success'))
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-12 mt-3">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-10 col-sm-12 mt-3">
                <form action="/login" method="post" autocomplete="off">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="E-mail Anda" autofocus name="email" id="inputEmail3">
                            @error('email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" placeholder="Password Anda"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                id="regPassword">
                            @error('password')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="togglepassword" onclick="togglepass()">
                                <label class="form-check-label" for="gridCheck1">
                                    Show Password
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Log in</button>
                    <br>
                    Belum Memiliki Akun?
                    <a href="#exampleModal" class="mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Register
                    </a>
                </form>
            </div>
        </div>

        {{-- register --}}
        <form action="/register" method="post" autocomplete="off">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog text-dark">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrasi Akun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="row mb-3">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" autofocus placeholder="Username Anda"
                                        class="form-control @error('username') is-invalid @enderror" id="username"
                                        name="username" autofocus>
                                    @error('username')
                                        <small class="text-danger fw-bold">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="E-mail Anda" name="email" id="inputEmail3">
                                    @error('email')
                                        <small class="text-danger fw-bold">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" placeholder="Password Anda"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        id="regPassword">
                                    @error('password')
                                        <small class="text-danger fw-bold">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-dark">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
