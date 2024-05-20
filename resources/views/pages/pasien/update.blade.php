<!-- Modal -->
<div class="modal fade" id="formUpdate{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="formUpdate{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('pasien.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="formUpdate{{ $item->id }}Label">
                        Edit Pasien {{ $item->nama }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama">Nama*</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukan Nama" required value="{{ $item->nama }}" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="no_telp">No Telp</label>
                                <input type="tel" class="form-control" id="no_telp" name="no_telp"
                                    placeholder="Masukan No Telp" value="{{ $item->no_telp }}" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukan Email" value="{{ $item->email }}" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    @foreach ($list_jenis_kelamin as $kelamin)
                                        <option value="{{ $kelamin }}"
                                            {{ $item->jenis_kelamin == $kelamin ? 'selected' : '' }}>
                                            {{ $kelamin }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                    value="{{ $item->tanggal_lahir }}" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                    placeholder="Masukan Pekerjaan" value="{{ $item->pekerjaan }}" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-control" id="agama" name="agama">
                                    <option value="">Pilih Agama</option>
                                    @foreach ($list_agama as $agama)
                                        <option value="{{ $agama }}"
                                            {{ $item->agama == $agama ? 'selected' : '' }}>
                                            {{ $agama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="golongan_darah">Golongan Darah</label>
                                <select class="form-control" id="golongan_darah" name="golongan_darah">
                                    <option value="">Pilih Golongan Darah</option>
                                    @foreach ($list_golongan_darah as $kelamin)
                                        <option value="{{ $kelamin }}"
                                            {{ $item->golongan_darah == $kelamin ? 'selected' : '' }}>
                                            {{ $kelamin }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="status_pernikahan">Status Pernikahan</label>
                                <select class="form-control" id="status_pernikahan" name="status_pernikahan">
                                    <option value="">Pilih Status Pernikahan</option>
                                    @foreach ($list_status_pernikahan as $status)
                                        <option value="{{ $status }}"
                                            {{ $item->status_pernikahan == $status ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat">{{ $item->alamat }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
