<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3 mt-5">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Pengguna</h1>
    </div>

    <!-- Content Row -->
    <div class="col-xl-6 col-md-6 ml-3">
        <form action="<?= baseurl ?>admin_pengguna/prosesEdit" method="post">
            <?php var_dump($data["pengguna"]["username"]); ?>
            <!-- <div class="form-group">
                <input type="hidden" id="id" name="id" value="<?= $data["pengguna"]["id"]; ?>">
            </div> -->
            <!-- <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $data["pengguna"]["username"]; ?>">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" class="form-control" id="role" name="role" value="<?= $data["pengguna"]["role"]; ?>"">
            </div> -->

            <div class=" d-sm-flex align-items-center justify-content-between">
                <a type="button" class="btn btn-secondary" data-dismiss="modal" href="<?= baseurl ?>admin_pengguna/index">Batal</a>
                <button type="submit" class="btn btn-warning">Edit</button>
            </div>
        </form>
    </div>
</div>