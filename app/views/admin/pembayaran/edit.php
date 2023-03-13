<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3 mt-5">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Pembayaran</h1>
    </div>

    <!-- Content Row -->
    <div class="col-xl-6 col-md-6 ml-3">
        <form action="<?= baseurl ?>admin/prosesEditPembayaran/<?= $data["pembayaran"]["id_pembayaran"] ?>" method="post" class="form">
            <div class="form-group">
                <input type="hidden" class="form-control" id="id_pembayaran" name="id_pembayaran" value="<?= $data["pembayaran"]["id_pembayaran"] ?>" aria-describedby="idKls">
            </div>
            <div class="form-group">
                <label for="tahun_ajaran">Tingkat</label>
                <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="<?= $data["pembayaran"]["tahun_ajaran"] ?>" aria-describedby="tahun_ajaran">
            </div>
            <div class="form-group">
                <label for="nominal">Kompetensi Keahlian</label>
                <input type="text" id="nominal" name="nominal" value="<?= $data["pembayaran"]["nominal"] ?>" class="form-control" aria-describedby="nominal">
            </div>

            <div class="d-sm-flex align-items-center justify-content-between">
                <a type="button" class="btn btn-secondary" data-dismiss="modal" href="<?= baseurl ?>admin/pembayaran">Batal</a>
                <button type="submit" class="btn btn-warning">Edit</button>
            </div>
        </form>
    </div>

</div>
</div>