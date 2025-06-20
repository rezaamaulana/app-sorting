@extends('guru.layouts.main')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.18/dist/sweetalert2.min.css" rel="stylesheet">
@endpush

@section('container')
    <div class="box mt-5">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h2 class="fw-bold px-3 py-2 border-start border-4 border-primary">Manajemen Ujian
                {{ implode(' ', explode('-', $materi)) }}</h2>

            <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#setKKMModal">
                Set KKM
            </button>
        </div>
        <div class="row">
            <!-- Card untuk Nilai Rata-Rata -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-chart-line fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Nilai Rata-Rata</h5>
                        <p class="card-text display-4">{{ number_format($nilaiRata, 1) }}</p>
                    </div>
                </div>
            </div>

            <!-- Card untuk Nilai Tertinggi -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-arrow-up fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Nilai Tertinggi</h5>
                        <p class="card-text display-4">{{ $nilaiMax }}</p>
                    </div>
                </div>
            </div>

            <!-- Card untuk Nilai Terendah -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-arrow-down fa-3x text-danger mb-3"></i>
                        <h5 class="card-title">Nilai Terendah</h5>
                        <p class="card-text display-4">{{ $nilaiMin }}</p>
                    </div>
                </div>
            </div>

            <!-- Card untuk KKM -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-graduation-cap fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">KKM</h5>
                        <p class="card-text display-4">{{ $kkm }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <form method="GET" action="{{ route('guru.hasil.belajar', $materi) }}">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Cari Nama atau NIS"
                        value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <select name="status" class="form-control">
                        <option value="">Status</option>
                        <option value="lulus" {{ request('status') == 'lulus' ? 'selected' : '' }}>Lulus</option>
                        <option value="tidak lulus" {{ request('status') == 'tidak lulus' ? 'selected' : '' }}>Tidak
                            Lulus</option>
                        <option value="belum_mengerjakan" {{ request('status') == 'belum_mengerjakan' ? 'selected' : '' }}>
                            Belum Mengerjakan</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="kelas" class="form-control">
                        <option value="">Kelas</option>
                        <option value="A" {{ request('kelas') == 'A' ? 'selected' : '' }}>Kelas A</option>
                        <option value="B" {{ request('kelas') == 'B' ? 'selected' : '' }}>Kelas B</option>
                        <option value="C" {{ request('kelas') == 'C' ? 'selected' : '' }}>Kelas C</option>
                        <option value="D" {{ request('kelas') == 'D' ? 'selected' : '' }}>Kelas D</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="{{ route('guru.hasil.belajar', $materi) }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Nilai</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasilKuis as $hasil)
                    <tr>
                        <td>{{ $hasil->nama }}</td>
                        <td>{{ $hasil->nis }}</td>
                        <td>{{ $hasil->kelas }}</td>
                        <td>{{ $hasil->kelulusan }}</td> <!-- Menampilkan status kelulusan --> <!-- Menggunakan first() -->
                        <td>{{ $hasil->evaluasi->first() ? $hasil->evaluasi->first()->nilai : 'N/A' }}</td>
                        <!-- Menggunakan first() -->
                        <td>{{ $hasil->evaluasi->first() ? $hasil->evaluasi->first()->waktu_mulai : 'N/A' }}</td>
                        <!-- Menggunakan first() -->
                        <td>{{ $hasil->evaluasi->first() ? $hasil->evaluasi->first()->waktu_selesai : 'N/A' }}</td>
                        <!-- Menggunakan first() -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="modal fade" id="setKKMModal" tabindex="-1" aria-labelledby="setKKMModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="setKKMModalLabel">Set KKM untuk Materi {{ $materi }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('guru.kkm.set', $materi) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kkm" class="form-label">Masukkan Nilai KKM</label>
                            <input type="number" class="form-control" id="kkm" name="kkm"
                                value="{{ $kkm }}" required>
                            <div class="form-text">Masukkan nilai KKM untuk materi ini.</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
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
