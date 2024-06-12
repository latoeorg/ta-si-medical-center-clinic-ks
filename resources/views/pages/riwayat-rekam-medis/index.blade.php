@extends('layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Riwayat Rekam Medis</h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('includes.error-card')
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tanggal</th>
                                        <th>Pasien</th>
                                        <th>Dokter</th>
                                        <th>Keluhan</th>
                                        <th>Diagnosis</th>
                                        <th>Keterangan</th>
                                        <th>Obat</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>
                                                #00{{ $item->id }}
                                            </td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->pasien->nama }}</td>
                                            <td>{{ $item->dokter->name }}</td>
                                            <td>{{ $item->keluhan }}</td>
                                            <td>{{ $item->diagnosis }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>
                                                @foreach ($item->obat as $obat)
                                                    {{ $obat->nama }},
                                                @endforeach
                                            </td>
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
