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
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('rekam-medis.store') }}" method="POST">
            <div class="container-fluid">
                <div class="d-flex justify-content-end mb-3">
                    <button type="submit" class="btn btn-primary ml-2">
                        <i class="fa fa-save"></i>
                        Simpan
                    </button>
                    <button type="submit" class="btn btn-primary ml-2">
                        <i class="fa fa-check"></i>
                        Approve
                    </button>
                </div>
                <div class="card shadow-none border">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="keluhan">Keluhan</label>
                                    <textarea class="form-control" id="keluhan" name="keluhan" placeholder="Masukan Keluhan" required></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="diagnosis">Diagnosis</label>
                                    <textarea class="form-control" id="diagnosis" name="diagnosis" placeholder="Masukan Diagnosis" required></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Keterangan" required></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
