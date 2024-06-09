@extends('layouts.app') @section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Obat - {{ $obat->nama }}</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('includes.error-card')
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>
                                {{ $obat->stok }}
                            </h1>

                            <p class="mb-0">
                                <span>Harga</span>
                                <span class="px-2">:</span>
                                <span class="rupiah-format">{{ $obat->harga }}</span>
                            </p>
                            <p class="mb-0">
                                <span>Description</span>
                                <span class="px-2">:</span>
                                <span>{{ $obat->description }}</span>
                            </p>
                            <br>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Tipe</th>
                                        <th>Stok Before</th>
                                        <th>Stok</th>
                                        <th>Stok After</th>
                                        <th>Aktor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($histories as $item)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->tipe }}</td>
                                            <td>{{ $item->stok_sebelum }}</td>
                                            <td>{{ $item->stok }}</td>
                                            <td>{{ $item->stok_setelah }}</td>
                                            <td>{{ $item->user->name }}</td>
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
