@extends('layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pemeriksaan</h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card shadow-none border">
                <div class="card-body">
                    <form action="{{ route('rekam-medis.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="doctor_id" value="{{ Auth::user()->id }}" />
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" placeholder="Masukan Tanggal"
                                        name="tanggal" required value="{{ date('Y-m-d') }}" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="pasien_id">Pasien</label>
                                    <select name="pasien_id" id="pasien_id" class="form-control" required>
                                        <option value="">-- Pilih Pasien --</option>
                                        @foreach ($list_pasien as $pasien)
                                            <option value="{{ $pasien->id }}">
                                                {{ $pasien->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary ml-2">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
