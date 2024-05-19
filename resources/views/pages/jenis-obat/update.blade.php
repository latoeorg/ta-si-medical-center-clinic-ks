<!-- Modal -->
<div class="modal fade" id="formUpdate{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="formUpdate{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('jenis-obat.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="formUpdate{{ $item->id }}Label">
                        Update Kategori Obat
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <select name="tipe" id="tipe" class="form-control" required>
                            <option value="">-- Tipe Kategori --</option>
                            @foreach ($list_tipe as $tipe)
                                <option value="{{ $tipe }}" {{ $item->tipe == $tipe ? 'selected' : '' }}>
                                    {{ $tipe }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Category</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Category"
                            name="nama" required value="{{ $item->nama }}" />
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
