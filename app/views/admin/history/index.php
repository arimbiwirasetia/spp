<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3">
        <h1 class="h3 mb-0 text-gray-800">History Transaksi Pembayaran</h1>
    </div>

    <!-- Content Row -->
    <div class="row col-xl-9 col-md-3 ml-3 mt-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Tahun Ajaran</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($data["history"] as $history) : ?>
                    <tr>
                        <td><?= $history["id"]; ?></td>
                        <td><?= $history["tanggal_dibayar"]; ?></td>
                        <td><?= $history["bulan_dibayar"]; ?></td>
                        <td><?= $history["tahun_dibayar"]; ?></td>
                        <td><?= $history["tahun_ajaran"]; ?></td>
                        <td><?= $history["nominal"]; ?></td>
                        <td>
                            <a class="badge-success badge-pill px-2.5">LUNAS</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<!-- /.container-fluid -->