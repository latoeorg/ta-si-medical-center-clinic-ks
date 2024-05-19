<!-- Modal -->
<div class="modal fade" id="formUpdate{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="formUpdate{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('obat.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="formUpdate{{ $item->id }}Label">
                        Edit Obat
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukan Nama"
                                    name="nama" required value="{{ $item->nama }}" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="kategori_id">kategori</label>
                                <select name="kategori_id" id="kategori_id" class="form-control" required>
                                    <option value="">-- Kategori Obat --</option>
                                    @foreach ($list_kategori as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ $kategori->id == $item->kategori_id ? 'selected' : '' }}>
                                            {{ $kategori->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tipe">Tipe</label>
                                <select name="tipe" id="tipe" class="form-control" required>
                                    <option value="">-- Tipe Obat --</option>
                                    @foreach ($list_tipe as $tipe)
                                        <option value="{{ $tipe }}"
                                            {{ $tipe == $item->tipe ? 'selected' : '' }}>
                                            {{ $tipe }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="dosis">Dosis</label>
                                <input type="text" class="form-control" id="dosis" placeholder="Masukan Dosis"
                                    name="dosis" required value="{{ $item->dosis }}" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea type="text" class="form-control" id="keterangan" placeholder="Keterangan" name="keterangan">{{ $item->keterangan }}</textarea>
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
