<!-- Modal -->
<div class="modal fade" id="formUpdate{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="formUpdate{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('pembelian-item.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="pembelian_id" value="{{ $pembelian->id }}">

                <div class="modal-header">
                    <h5 class="modal-title" id="formUpdate{{ $item->id }}Label">
                        Edit Item
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pembelian">Pembelian ID</label>
                        <input type="text" class="form-control" id="pembelian" disabled
                            value="Pembelian ID #00{{ $pembelian->id }}" />
                    </div>
                    <div class="form-group">
                        <label for="obat_id">Obat</label>
                        <select name="obat_id" id="obat_id" class="form-control" required>
                            <option value="">-- Pilih Obat --</option>
                            @foreach ($list_obat as $i)
                                <option value="{{ $i->id }}" {{ $i->id == $item->obat_id ? 'selected' : '' }}>
                                    {{ $i->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" placeholder="Input Quantity"
                            name="quantity" required value="{{ $item->quantity }}" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
