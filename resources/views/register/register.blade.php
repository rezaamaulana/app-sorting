@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-registration w-100 m-auto">
                <div class="page-container">
                    <h1 class="h3 mb-3 fw-normal text-center">Buat Akun</h1>
                    <form action="{{ route('post.regis') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="text" Name="nama"
                                    class="form-control rounded-top @error('nama') is-invalid @enderror" id="nama"
                                    placeholder="Nama" required value="{{ old('nama') }}">
                                <label for="nama">Nama</label>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="text" Name="nis" class="form-control @error('nis') is-invalid @enderror"
                                    id="nis" placeholder="NIS" required value="{{ old('nis') }}">
                                <label for="nis">NIS</label>
                                @error('nis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating">
                                <select class="form-select" Name="kelas" aria-label="Default select example">
                                    <option selected disabled>Pilih Kelas</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                                {{--  <div class="form-floating">
                                <input type="kelas" name="kelas"
                                    class="form-control @error('kelas') is-invalid @enderror" id="kelas"
                                    placeholder="Kelas" required value="{{ old('kelas') }}">
                                <label for="kelas">Kelas</address></label>
                                @error('kelas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            </div>
                            <div class="form-group1">
                                <div class="form-floating">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password"
                                        placeholder="Password" required>
                                    <label for="password">Password</label>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Daftar</button>
                    </form>
                    <small class="d-block text-center mt-3">Sudah terdaftar? <a href="/login">Masuk</a></small>
                </div>
            </main>
        </div>
    </div>
@endsection
