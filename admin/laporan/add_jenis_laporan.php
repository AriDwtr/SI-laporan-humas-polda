<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Laporan</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Jenis Laporan</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<?php
if (isset($_POST['submit'])) {
    include "../conn/conn.php";
    $judul = $_POST['judul'];
    $created_by = $_SESSION['nama'];
    $created_at = date('d-m-Y H:i:s');
    $query = mysqli_query($conn, "SELECT * FROM jenis_laporan WHERE judul = '$judul'");
    $cek_user = mysqli_num_rows($query);
    if ($cek_user > 0) {
        echo '
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="font-35 text-white"><i class="bx bxs-window-alt"></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-white">Oopps !!! Judul Telah di Tersedia</h6>
            </div>
        </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    } else {
        mysqli_query($conn, "INSERT INTO jenis_laporan(id_jenis_laporan,judul,created_by,created_at)
        VALUES ('','$judul','$created_by','$created_at')");
        echo '
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="font-35 text-white"><i class="bx bxs-window-alt"></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-white">Berhasil Menambahkan Jenis Laporan  Baru</h6>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
        ';
    }
}
?>
<div class="card border-top border-0 border-4 border-warning">
    <div class="card-body p-5">
        <div class="card-title d-flex align-items-center">
            <div><i class="bx bxs-window-alt me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary">Jenis Laporan</h5>
        </div>
        <hr>
        <form class="row g-3" method="post" action="" enctype="multipart/form-data">
            <div class="col-md-9">
                <input type="text" name="judul" class="form-control" id="inputFirstName">
            </div>
            <div class="col-md-3">
                <button type="submit" name="submit" class="btn btn-primary px-5">Simpan</button>
            </div>
        </form>
    </div>
</div>
<h6 class="mb-0 text-uppercase">Jenis Laporan</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th width="5%">
                            <center>No</center>
                        </th>
                        <th>
                            <center>Jenis Laporan</center>
                        </th>
                        <th width="20%">
                            <center>Di Buat </center>
                        </th>
                        <th width="10%">Tanggal Buat</th>
                        <th width="5%">
                            <center>Action<center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../conn/conn.php";
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM jenis_laporan");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td>
                                <center><?= $no++ ?></center>
                            </td>
                            <td><center><i><?= $data['judul'] ?></i></center></td>
                            <td><?= ucwords($data['created_by']) ?></td>
                            <td>
                                <center><?= $data['created_at']?></center>
                            </td>
                            <td>
                               <a href="index.php?page=delete_jenis_laporan&id=<?= $data['id_jenis_laporan'] ?>" style="color:red" onClick="return confirm('Delete This ?')"><i class="bx bxs-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php
                    };
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>