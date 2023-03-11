<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3">
        <h1 class="h3 mb-0 text-gray-800">Data Pengguna</h1>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <button type="button" class="btn btn-primary tampilModalTambah" data-toggle="modal" data-target="#modalTambah">Tambah Data Pengguna</button>
    </div>

    <!-- Content Row -->
    <div class="row col-xl-9 col-md-3 ml-3 mt-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($data["pengguna"] as $pengguna) : ?>
                    <tr>
                        <td><?= $pengguna["id"]; ?></td>
                        <td><?= $pengguna["username"]; ?></td>
                        <td><?= $pengguna["role"]; ?></td>
                        <td>
                            <a href="<?= baseurl ?>admin_pengguna/edit/<?= $pengguna["id"] ?>" class="badge-warning badge-pill px-2.5 mr-2">edit</a>
                            <a href="<?= baseurl ?>admin_pengguna/hapus/<?= $pengguna['id'] ?>" class="badge-danger badge-pill px-2.5" onclick="return confirm('yakin ingin menghapus data?')">delete</a>
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
                <h5 class="modal-title" id="judulTambahLabel">Tambah Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= baseurl ?>admin_pengguna/tambah" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="Username">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="custom-select" name="role" id="role">
                            <?php foreach ($data["pengguna"] as $pengguna) : ?>
                                <option value="<?= $pengguna["id"] ?>"><?= $pengguna["role"] ?> - <?= $pengguna["username"] ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer d-sm-flex align-items-center justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" href="<?= baseurl ?>admin_pengguna">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->