@extends('layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pemeriksaan</h1>
                    <h6 class="text-muted">
                        Pasien : {{ $rekamMedis->pasien->nama }},
                        Tanggal : {{ $rekamMedis->tanggal }}
                    </h6>
                    @include('includes.badge-status', [
                        'status' => $rekamMedis->status,
                    ])
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if ($rekamMedis->status !== 'DONE')
                <div class="d-flex justify-content-end mb-3">
                    <form action="{{ route('rekam-medis.update', $rekamMedis->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $rekamMedis->id }}">
                        <input type="hidden" name="status" value="DONE">
                        <button type="submit" class="btn btn-success ml-2">
                            <i class="fa fa-check"></i>
                            Approve
                        </button>
                    </form>
                </div>
            @endif
            <form action="{{ route('rekam-medis.update', $rekamMedis->id) }}" method="POST">
                <div class="card shadow-none border">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $rekamMedis->id }}">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="keluhan">Keluhan</label>
                                    <textarea class="form-control" id="keluhan" name="keluhan" placeholder="Masukan Keluhan"
                                        disabled={{ $rekamMedis == 'DONE' }}>{{ $rekamMedis->keluhan }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="diagnosis">Diagnosis</label>
                                    <textarea class="form-control" id="diagnosis" name="diagnosis" placeholder="Masukan Diagnosis"
                                        disabled={{ $rekamMedis == 'DONE' }}>{{ $rekamMedis->diagnosis }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Keterangan"
                                        disabled={{ $rekamMedis == 'DONE' }}>{{ $rekamMedis->keterangan }}</textarea>
                                </div>
                            </div>
                        </div>
                        @if ($rekamMedis->status !== 'DONE')
                            <div class="d-flex justify-content-end mb-3">
                                <button type="submit" class="btn btn-primary ml-2">
                                    <i class="fa fa-save"></i>
                                    Simpan Draft
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-body">
                    @if ($rekamMedis->status !== 'DONE')
                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#formCreate"><i
                                class="fa fa-plus"></i> Tambah Obat</a>
                        @include('pages.rekam-medis.obat.create')
                    @endif
                    <table id="defaultTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                @if ($rekamMedis->status !== 'DONE')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item->obat->nama }}</td>
                                    <td class="rupiah-format text-right">{{ $item->harga }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td class="rupiah-format text-right">{{ $item->total_harga }}</td>
                                    @if ($rekamMedis->status !== 'DONE')
                                        <td>
                                            <form id="formDelete{{ $item->id }}"
                                                action="{{ route('rekam-medis-obat.destroy', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <a type="button" class="btn btn-danger"
                                                    onclick="handleDelete({{ $item->id }})">
                                                    <i class="fa fa-trash" title="Hapus Data User"></i>
                                                </a>
                                            </form>

                                            <script>
                                                function handleDelete(id) {
                                                    Swal.fire({
                                                        title: 'Apakah kamu yakin?',
                                                        text: "kamu akan menghapus data ini!",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Ya, hapus!'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('formDelete' + id).submit();
                                                        }
                                                    })
                                                }
                                            </script>
                                            <a type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#formUpdate{{ $item->id }}">
                                                <i class="fa fa-edit" title="Ubah Data User"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                                @include('pages.rekam-medis.obat.update')
                                <?php $i++; ?>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" class="text-right">
                                    Total Harga
                                </th>
                                <th class="rupiah-format text-right">
                                    {{ $rekamMedis->total_harga }}
                                </th>
                                @if ($rekamMedis->status !== 'DONE')
                                    <th></th>
                                @endif
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
