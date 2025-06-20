@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-4">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <main class="form-signin w-100 m-auto">
                <div class="page-container">
                    <h1 class="h3 mb-3 fw-normal text-center">Masuk</h1>
                    <form action="{{ route('post.login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="nis" name="nis" class="form-control @error('nis') is-invalid @enderror"
                                    id="nis" placeholder="name@example.com" autofocus required
                                    value="{{ old('nis') }}">
                                <label for="nis">NIS</label>
                                @error('nis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
                    </form>
                    <small class="d-block text-center mt-3">Tidak Daftar? <a href="/register">Daftar Sekarang!</a></small>
                </div>
            </main>
        </div>
    </div>
@endsection
