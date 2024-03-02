<!-- Modal -->
<div class="modal fade" id="laporan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="laporan-aplikasi">Periode Laporan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col mb-2">
                        <div class="form-floating form-floating-outline">
                            <input type="date" id="tanggalAwal" name="tanggalAwal" class="form-control" />
                            <label for="tanggalAwal">Tanggal Awal</label>
                        </div>
                    </div>
                    <div class="col mb-2">
                        <div class="form-floating form-floating-outline">
                            <input type="date" id="tanggalAkhir" name="tanggalAkhir" class="form-control" />
                            <label for="tanggalAkhir">Tanggal Akhir</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="" onclick="this.href='/admin/dashboard/laporan-aplikasi/' + document.getElementById('tanggalAwal').value + '/' + document.getElementById('tanggalAkhir').value" class="btn btn-primary">Cetak</a>
            </div>
        </div>
    </div>
</div>
