@extends('guru.layouts.main')

@section('container')
    <div class="box">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h2 class="fw-bold px-3 py-2 border-start border-4 border-primary">Dashboard Guru</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row ps-3">
                            <div class="col-md-4 d-flex justify-content-center align-items-center text-white rounded-2"
                                style="background-color: #2ecc71;">
                                <h1 class="fa-solid fa-user"></h1>
                            </div>
                            <div class="col-md-8">
                                <h6>Siswa</h6>
                                <h1>{{ $countStudents }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row ps-3">
                            <div class="col-md-4 d-flex justify-content-center align-items-center text-white rounded-2"
                                style="background-color: #34495e;">
                                <h1 class="fa-solid fa-square-poll-vertical"></h1>
                            </div>
                            <div class="col-md-8">
                                <h6>Hasil Belajar</h6>
                                <h1>00</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row ps-3">
                            <div class="col-md-4 d-flex justify-content-center align-items-center text-white rounded-2"
                                style="background-color: #e67e22;">
                                <h1 class="fas fa-chart-bar"></h1>
                            </div>
                            <div class="col-md-8">
                                <h6>Atur KKM</h6>
                                <h1>70</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
