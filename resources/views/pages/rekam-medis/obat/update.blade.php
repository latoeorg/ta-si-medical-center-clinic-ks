<!-- Modal -->
<div class="modal fade" id="formUpdate{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="formUpdate{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('rekam-medis-obat.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="rekam_medis_id" value="{{ $rekamMedis->id }}">

                <div class="modal-header">
                    <h5 class="modal-title" id="formUpdate{{ $item->id }}Label">
                        Edit Rekam Medis
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="obat_id">Obat</label>
                                <select class="form-control" id="obat_id" name="obat_id">
                                    <option value="">Pilih Obat</option>
                                    @foreach ($list_obat as $obat)
                                        <option value="{{ $obat->id }}"
                                            {{ $item->obat_id == $obat->id ? 'selected' : '' }}>
                                            {{ $obat->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah"
                                    placeholder="Masukan Jumlah" required value="{{ $item->jumlah }}" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan">{{ $item->keterangan }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
