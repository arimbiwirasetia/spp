<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3 mt-5">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Siswa</h1>
    </div>

    <!-- Content Row -->
    <div class="col-xl-6 col-md-6 ml-3">
        <form action="<?= baseurl ?>admin/prosesEditSiswa" method="post">
            <div class="form-group">
                <input type="hidden" id="id_siswa" name="id_siswa" value="<?= $data["siswa"]["id_siswa"] ?>" aria-describedby="id">
            </div>
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $data["siswa"]["nisn"] ?>" aria-describedby="nisn">
            </div>
            <div class="form-group">
                <label for="nis">NIS</label>
                <input type="text" id="nis" name="nis" class="form-control" value="<?= $data["siswa"]["nis"] ?>" aria-describedby="nis">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" value="<?= $data["siswa"]["nama"] ?>" aria-describedby="nama">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data["siswa"]["alamat"] ?>" aria-describedby="alamat">
            </div>
            <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="text" id="telepon" name="telepon" class="form-control" value="<?= $data["siswa"]["telepon"] ?>" aria-describedby="telepon">
            </div>
            <div class="form-group">
                <label for="id_kelas">ID Kelas</label>
                <select name="id_kelas" class="form-control">
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
                <select name="id_pembayaran" class="form-control">
                    <?php foreach ($data["pembayaran"] as $pembayaran) : ?>
                        <option value="<?= $pembayaran["id_pembayaran"] ?>">Rp<?= $pembayaran["nominal"] ?> - <?= $pembayaran["tahun_ajaran"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mt-4">
                <a type="button" class="btn btn-secondary" data-dismiss="modal" href="<?= baseurl ?>admin/siswa">Batal</a>
                <button type="submit" class="btn btn-warning">Edit</button>
            </div>
        </form>
    </div>
</div>