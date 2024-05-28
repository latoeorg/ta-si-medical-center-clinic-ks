@extends('layouts.app') @section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Welcome {{ request()->session()->get('user')['name'] }} </h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content font-poppins">
        <div class="container-fluid">
            <div class="mb-4">
                <p class="mb-0 text-muted">Total Pendapatan</p>
                <h2 class="rupiah-format font-weight-bold">{{ $total_pendapatan }}</h2>
            </div>

            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $total_obat }}</h3>
                            <p>Total Obat</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-medkit"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $total_pasien }}</h3>
                            <p>Total Pasien</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $total_rekam_medis }}</h3>
                            <p>Rekam Medis</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-thermometer"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $total_user }}</h3>
                            <p>Total Staff</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-success">
                        <div class="card-header">
                            Riwayat Rekam Medis
                        </div>
                        <div class="card-body">
                            <table id="defaultTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tanggal</th>
                                        <th>Pasien</th>
                                        <th>Dokter</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($riwayat as $item)
                                        <tr>
                                            <td>
                                                #00{{ $item->id }}
                                            </td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->pasien->nama }}</td>
                                            <td>{{ $item->dokter->name }}</td>
                                            <td class="rupiah-format text-right">{{ $item->total_harga }}</td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
