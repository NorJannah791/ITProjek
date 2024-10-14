<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="tanggaltransaksi" class="form-label">Tanggal Transaksi</label>
        <input type="date" class="form-control" id="tanggaltransaksi" name="tanggaltransaksi" required>
    </div>
    <div class="mb-3">
        <label for="metodepembayaran" class="form-label">Metode Pembayaran</label>
        <select class="form-select" id="metodepembayaran" name="metodepembayaran" required>
            <option value="" disabled selected>Pilih Metode Pembayaran</option>
            <option value="Tunai">Tunai</option>
            <option value="Debit">Debit</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="totalpembayaran" class="form-label">Total Pembayaran</label>
        <input type="number" class="form-control" id="totalpembayaran" name="totalpembayaran" step="0.01" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
