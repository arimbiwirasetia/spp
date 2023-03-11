<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3">
        <h1 class="mt-3 h3 text-gray-800">Data Transaksi Siswa</h1>
    </div>

    <!-- Content Row -->
    <div class="col-xl col-md-3 mx-auto">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NISN</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Tahun Ajaran</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($data["siswa"] as $siswa) : ?>
                    <tr>
                        <td><?= $siswa["id_siswa"]; ?></td>
                        <td><?= $siswa["nisn"]; ?></td>
                        <td><?= $siswa["nis"]; ?></td>
                        <td><?= $siswa["nama"]; ?></td>
                        <td><?= $siswa["nama_kelas"]; ?></td>
                        <td><?= $siswa["kompetensi_keahlian"]; ?></td>
                        <td><?= $siswa["tahun_ajaran"]; ?></td>
                        <td>
                            <a href="<?= baseurl ?>admin/detailTransaksi/<?= $siswa["id_siswa"] ?>" class="badge-success rounded py-1 px-3">bayar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</div>
<!-- /.container-fluid -->