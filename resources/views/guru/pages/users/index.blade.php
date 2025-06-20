@extends('guru.layouts.main')

@push('styles')
    <!-- Add any additional styles if needed -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.18/dist/sweetalert2.min.css" rel="stylesheet">
@endpush

@section('container')
    <div class="box mt-5">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h2 class="fw-bold px-3 py-2 border-start border-4 border-primary">Manajemen User</h2>
            <a href="{{ route('guru.user.create') }}" class="btn btn-primary me-4">Buat User</a>
        </div>

        <!-- Search and Role Filter Form -->
        <form method="GET" action="{{ route('guru.user.index') }}">
            <div class="row">
                <!-- Search Input -->
                <div class="col-md-6">

                    <input type="text" name="search" class="form-control"
                        placeholder="Cari berdasarkan!" value="{{ request()->get('search') }}">
                </div>

                <div class="col-md-4">
                    <select name="column" class="form-control" onchange="this.form.submit()">
                        <option value="nama" {{ request()->get('column') == 'nama' ? 'selected' : '' }}>Cari berdasarkan
                            Nama
                        </option>
                        <option value="nis" {{ request()->get('column') == 'nis' ? 'selected' : '' }}>Cari berdasarkan
                            NIS
                        </option>
                        <option value="kelas" {{ request()->get('column') == 'kelas' ? 'selected' : '' }}>Cari berdasarkan
                            Kelas
                        </option>
                        <option value="role" {{ request()->get('column') == 'role' ? 'selected' : '' }}>Cari berdasarkan
                            Role
                        </option>
                    </select>
                </div>

                <!-- Column Filter Dropdown -->
                <div class="col-md-1">
                    <select name="role" class="form-control" onchange="this.form.submit()">
                        <option value="">Filter by Role</option>
                        <option value="guru" {{ request()->get('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                        <option value="siswa" {{ request()->get('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                    </select>
                </div>
                <!-- Role Filter Dropdown -->
                <div class="col-md-1">
                    <select name="perPage" class="form-control" onchange="this.form.submit()">
                        <option value="10" {{ request()->get('perPage') == '10' ? 'selected' : '' }}>10</option>
                        <option value="20" {{ request()->get('perPage') == '20' ? 'selected' : '' }}>20</option>
                        <option value="50" {{ request()->get('perPage') == '50' ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request()->get('perPage') == '100' ? 'selected' : '' }}>100</option>
                    </select>
                </div>
                <!-- Per Page Dropdown for Pagination -->
            </div>
        </form>

        <!-- Table Data Pengguna -->
        <table id="users-table" class="display table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($users->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada Pengguna Ditemukan!</td>
                    </tr>
                @endif
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->nis }}</td>
                        <td>{{ $user->kelas }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <!-- Define your actions (Edit, Delete) here -->
                            <a href="{{ route('guru.user.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-user-edit"></i> Ubah</a>
                            <!-- Delete action can also be added with a form -->
                            <form action="{{ route('guru.user.destroy', $user->id) }}" id="delete-form" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button form="delete-form" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Controls -->
        <div class="d-flex justify-content-center mt-4">
            {{ $users->appends(request()->query())->links() }}
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.18/dist/sweetalert2.min.js"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endpush
