@extends('guru.layouts.main')

@section('container')
    <div class="box">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h2 class="fw-bold px-3 py-2 border-start border-4 border-primary">Edit User</h2>
            <div class="">
                <form action="{{ route('guru.user.destroy', $user->id) }}" id="delete-form" method="POST"
                    style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button form="delete-form" type="submit" class="btn btn-danger">Delete User</button>
                </form>
                <a href="{{ route('guru.user.index') }}" class="btn btn-secondary me-4">Cancel</a>
            </div>
        </div>

        <div class="card card-body">
            <form method="POST" action="{{ route('guru.user.update', $user->id) }}" novalidate>
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama"
                        class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $user->nama) }}"
                        required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nis">NIS</label>
                    <input type="text" id="nis" name="nis"
                        class="form-control @error('nis') is-invalid @enderror" value="{{ old('nis', $user->nis) }}"
                        required>
                    @error('nis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas" class="form-control @error('kelas') is-invalid @enderror"
                        required>
                        <option value="A" {{ old('kelas', $user->kelas) == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ old('kelas', $user->kelas) == 'B' ? 'selected' : '' }}>B</option>
                        <option value="C" {{ old('kelas', $user->kelas) == 'C' ? 'selected' : '' }}>C</option>
                        <option value="D" {{ old('kelas', $user->kelas) == 'D' ? 'selected' : '' }}>D</option>
                    </select>
                    @error('kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                        <option value="guru" {{ old('role', $user->role) == 'guru' ? 'selected' : '' }}>Guru</option>
                        <option value="siswa" {{ old('role', $user->role) == 'siswa' ? 'selected' : '' }}>Siswa</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Field (Optional) -->
                <div class="form-group mb-3">
                    <label for="password">Password <span class="text-warning">(Biarkan kosong jika tidak dirubah!)</span></label>
                    <input type="password" id="password" name="password"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Confirmation Field (Required if Password is Provided) -->
                <div class="form-group mb-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Update User</button>

            </form>
        </div>

    </div>
@endsection
