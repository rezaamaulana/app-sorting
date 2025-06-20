@extends('guru.layouts.main')

@section('container')
    <div class="box mt-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h2 class="fw-bold px-3 py-2 border-start border-4 border-primary">Create User</h2>
        </div>
        <div class="card card-body">

            <!-- Form for Creating User -->
            <form method="POST" action="{{ route('guru.user.store') }}" novalidate>
                @csrf

                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama"
                        class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nis">NIS</label>
                    <input type="text" id="nis" name="nis"
                        class="form-control @error('nis') is-invalid @enderror" value="{{ old('nis') }}" required>
                    @error('nis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas" class="form-control @error('kelas') is-invalid @enderror"
                        required>
                        <option value="A" {{ old('kelas') == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ old('kelas') == 'B' ? 'selected' : '' }}>B</option>
                        <option value="C" {{ old('kelas') == 'C' ? 'selected' : '' }}>C</option>
                        <option value="D" {{ old('kelas') == 'D' ? 'selected' : '' }}>D</option>
                    </select>
                    @error('kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                        <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                        <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Confirmation Field -->
                <div class="form-group mb-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror" required>
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Create User</button>
                <a href="{{ route('guru.user.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>

    <style>
        .box {
            border: 3px solid #b2cfff;
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
@endsection
