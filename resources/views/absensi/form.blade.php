<div class="modal fade" id="modalFormAbsensi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalFormAbsensiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormAbsensiLabel">Tambah Data</h5>
                <button type="button" class="btn-close" style="font-size: 2rem;" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="absensi" enctype="multipart/form-data">
                    @csrf
                    <div id="method"></div>
                    <div class="mb-3">
                        <label for="nama_karyawan" class="form-label">Nama karyawan</label>
                        <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_masuk" class="form-label">tanggal masuk</label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk">
                    </div>
                    <div class="mb-3">
                        <label for="waktu_masuk" class="form-label">waktu masuk</label>
                        <input type="time" class="form-control" id="waktu_masuk" name="waktu_masuk">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">status</label>
                        <select name="status" class="form-control" id="">
                            <option>masuk</option>
                            <option>izin</option>
                            <option>cuti</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="waktu_selesaikerja" class="form-label">waktu selesaikerja</label>
                        <input type="time" class="form-control" id="waktu_selesaikerja" name="waktu_selesaikerja">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- modal import --}}

<div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="mdoal-title" id="exampleModalLabel">Import Data absensi</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('import-absensi') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="menu" class="form-label">File Excel</label>
                            <input type="file" name="import" id="import">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                <button type="submit" class="btn btn-primary" id="btn-submit">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>

