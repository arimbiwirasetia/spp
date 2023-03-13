<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3">
        <h1 class="h3 mb-0 text-gray-800">Data Transaksi Siswa</h1>
    </div>

    <!-- Content Row -->
    <div class="row col-xl-9 col-md-3 ml-3 mt-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NISN</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($data["siswa"] as $siswa) : ?>
                    <tr>
                        <td><?= $siswa["nisn"]; ?></td>
                        <td><?= $siswa["nis"]; ?></td>
                        <td><?= $siswa["nama"]; ?></td>
                        <td><?= $siswa["kelas"]; ?></td>
                        <td>
                            <a href="<?= baseurl ?>admin_pembayaran/edit/<?= $siswa["id"] ?>" class="badge-warning badge-pill px-2.5 mr-2">edit</a>
                            <a href="<?= baseurl ?>admin_pembayaran/hapus/<?= $siswa['id'] ?>" class="badge-danger badge-pill px-2.5" onclick="return confirm('yakin ingin menghapus data?')">delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</div>
<!-- /.container-fluid -->