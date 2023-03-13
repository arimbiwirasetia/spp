<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3">
        <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <button type="button" class="btn btn-primary tampilModalTambah" data-toggle="modal" data-target="#modalTambah">Tambah Data Siswa</button>
    </div>

    <!-- Content Row -->
    <div class="col-xl col-md-3 mt-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NISN</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Telepon</th>
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
                        <td><?= $siswa["alamat"]; ?></td>
                        <td><?= $siswa["telepon"]; ?></td>
                        <td><?= $siswa["nama_kelas"] ?></td>
                        <td><?= $siswa["kompetensi_keahlian"] ?></td>
                        <td><?= $siswa["tahun_ajaran"] ?></td>
                        <td>
                            <a href="<?= baseurl ?>admin/editSiswa/<?= $siswa["id_siswa"] ?>" class="text-warning mr-2">
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="<?= baseurl ?>admin/hapusSiswa/<?= $siswa["id_siswa"] ?>" class="text-danger" onclick="return confirm('yakin ingin menghapus data?')">
                                <i class="far fa-trash-alt"></i>
                            </a>
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
                <h5 class="modal-title" id="judulTambahLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= baseurl ?>admin/tambahSiswa" method="post" class="mx-3">
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" aria-describedby="nisnSiswa">
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" id="nis" name="nis" class="form-control" aria-describedby="nis">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" aria-describedby="password">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" aria-describedby="nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="alamat">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" id="telepon" name="telepon" class="form-control" aria-describedby="telepon">
                    </div>
                    <div class="form-group">
                        <label for="id_kelas">Kelas</label>
                        <select name="id_kelas" id="id_kelas" class="form-control">
                            <?php foreach ($data["kelas"] as $kelas) : ?>
                                <option value="<?= $kelas["id_kelas"] ?>"><?= $kelas["nama"] ?> <?= $kelas["kompetensi_keahlian"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_pengguna">ID Pengguna</label>
                        <select name="id_pengguna" id="id_pengguna" class="form-control">
                            <option value="3">3 - siswa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_pembayaran">ID Pembayaran</label>
                        <select name="id_pembayaran" id="id_pembayaran" class="form-control">
                            <?php foreach ($data["pembayaran"] as $pembayaran) : ?>
                                <option value="<?= $pembayaran["id_pembayaran"] ?>">Rp<?= $pembayaran["nominal"] ?> - <?= $pembayaran["tahun_ajaran"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer d-sm-flex align-items-center justify-content-between">
                <a type="button" class="btn btn-secondary" data-dismiss="modal" href="<?= baseurl ?>admin/siswa">Batal</a>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->