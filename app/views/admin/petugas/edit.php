<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3 mt-5">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Petugas</h1>
    </div>

    <!-- Content Row -->
    <div class="col-xl-6 col-md-6 ml-3">
        <form action="<?= baseurl ?>admin_petugas/prosesEdit/<?= $data["petugas"]["id_petugas"] ?>" method="post" class="form">
            <div class="form-group">
                <input type="hidden" class="form-control" id="id_petugas" name="id_petugas" value="<?= $data["petugas"]["id_petugas"] ?>" aria-describedby="id_petugas">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data["petugas"]["nama"] ?>" aria-describedby="nama">
            </div>
            <div class="form-group mb-3">
                <label for="id_pengguna">ID Pengguna</label>
                <input type="text" class="form-control" id="id_pengguna" name="id_pengguna" value="<?= $data["petugas"]["id_pengguna"] ?>">
            </div>

            <div class="d-sm-flex align-items-center justify-content-between">
                <a type="button" class="btn btn-secondary" data-dismiss="modal" href="<?= baseurl ?>admin/petugas">Batal</a>
                <button type="submit" class="btn btn-warning">Edit</button>
            </div>
        </form>
    </div>
</div>