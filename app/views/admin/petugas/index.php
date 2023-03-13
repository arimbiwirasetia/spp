<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3">
        <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <button type="button" class="btn btn-primary tampilModalTambah" data-toggle="modal" data-target="#modalTambah">Tambah Data Petugas</button>
    </div>

    <!-- Content Row -->
    <div class="row col-xl-9 col-md-3 ml-3 mt-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($data["petugas"] as $petugas) : ?>
                    <tr>
                        <td><?= $petugas["id_petugas"]; ?></td>
                        <td><?= $petugas["nama"]; ?></td>
                        <td><?= $petugas["username"]; ?></td>
                        <td><?= $petugas["role"]; ?></td>
                        <td>
                            <a href="<?= baseurl ?>admin/editPetugas/<?= $petugas["id_petugas"] ?>" class="badge-warning badge-pill px-2.5 mr-2">edit</a>
                            <a href="<?= baseurl ?>admin/hapusPetugas/<?= $petugas["id_petugas"] ?>" class="badge-danger badge-pill px-2.5" onclick="return confirm('yakin ingin menghapus data?')">delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- modal tambah-->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="judulTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulTambahLabel">Tambah Data Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= baseurl ?>admin/tambah" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" aria-describedby="unamepetugas">
                    </div>
                    <div class="form-group">
                        <label for="id_pengguna">ID Pengguna</label>
                        <select class="custom-select" name="id_pengguna" id="id_pengguna">
                            <?php foreach ($data["pengguna"] as $pengguna) : ?>
                                <option value="<?= $pengguna["id_pengguna"] ?>"><?= $pengguna["role"] ?> - <?= $pengguna["username"] ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer d-sm-flex align-items-center justify-content-between">
                <a type="button" class="btn btn-secondary" data-dismiss="modal" href="<?= baseurl ?>admin">Batal</a>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->