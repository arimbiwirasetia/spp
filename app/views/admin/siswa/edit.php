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
                <input type="hidden" id="id" name="id" value="<?= $data["siswa"]["id_siswa"] ?>" aria-describedby="id">
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
                <label for="kelas_id">ID Kelas</label>
                <select name="kelas_id" class="form-control">
                    <?php foreach ($data["kelas"] as $kelas) : ?>
                        <option value="<?= $kelas["id_kelas"] ?>"><?= $kelas["nama"] ?> <?= $kelas["kompetensi_keahlian"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class=" form-group">
                <label for="pengguna_id">ID Pengguna</label>
                <select name="pengguna_id" class="form-control">
                    <?php foreach ($data["pengguna"] as $pengguna) : ?>
                        <option value="<?= $pengguna["id_pengguna"] ?>"><?= $pengguna["role"] ?> - <?= $pengguna["username"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="d-sm-flex align-items-center justify-content-between">
                <a type="button" class="btn btn-secondary" data-dismiss="modal" href="<?= baseurl ?>admin/siswa">Batal</a>
                <button type="submit" class="btn btn-warning">Edit</button>
            </div>
        </form>
    </div>
</div>