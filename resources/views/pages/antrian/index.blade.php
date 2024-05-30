@extends('layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Antrian</h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-12" style="max-inline-size: 40rem">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mb-0 text-muted">
                                        Antrian
                                    </p>
                                    <div class="d-flex align-items-center">
                                        <h1 class="mb-0">
                                            00{{ $active_antrian }}
                                        </h1>

                                        @if ($active_pasien)
                                            <h5 class="mb-0 text-muted ml-2">
                                                - {{ $active_pasien->nama }}
                                            </h5>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mb-4">
                                <form action="/antrian-reset" method="POST">
                                    @csrf
                                    <button class="btn btn-danger rounded-0" type="submit">
                                        <i class="fa fa-times"></i>
                                        Reset Antrian
                                    </button>
                                </form>

                                <form action="/antrian-next" method="POST">
                                    @csrf
                                    <button class="btn btn-success rounded-0" type="submit">
                                        <i class="fa fa-chevron-right"></i>
                                        Next Antrian
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                @include('includes.error-card')
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#formCreate"><i
                                    class="fa fa-plus"></i> Tambah Antrian</a>
                            @include('pages.antrian.create')
                            <table id="defaultTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nomor Antrian</th>
                                        <th>Pasien</th>
                                        <th>Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>
                                                00{{ $item->nomor_antrian }}
                                            </td>
                                            <td>{{ $item->pasien->nama }}</td>
                                            <td>
                                                @if ($item->is_active)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Not Active</span>
                                                @endif
                                            </td>
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
