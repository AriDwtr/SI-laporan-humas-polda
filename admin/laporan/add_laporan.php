<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Laporan</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Laporan</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<?php
if (isset($_POST['submit'])) {
    include "../conn/conn.php";
    $judul = $_POST['judul'];
    $id_jenis = $_POST['id_jenis_laporan'];
    $lokasi = $_POST['lokasi'];
    $tgl = $_POST['tgl'];
    $mytextarea = $_POST['mytextarea'];
    $created_by = $_SESSION['id_staff'];
    $created_at = date('Y-m-d');
    mysqli_query($conn,"INSERT INTO laporan_kegiatan (id_laporan,judul_laporan,id_jenis_laporan,lokasi,tgl,isi,created_by,created_at,status) 
    VALUES ('','$judul','$id_jenis','$lokasi','$tgl','$mytextarea','$created_by','$created_at','PENDING')");
    $get_id = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM laporan_kegiatan ORDER BY id_laporan DESC LIMIT 1"));
    $id = $get_id['id_laporan'];
    echo "<script>window.location.href='index.php?page=upload_laporan&&id=".$id."';</script>'";
}
?>
<div class="row">
    <div class="col-xl-9 mx-auto">
        <div class="card border-top border-0 border-4 border-warning">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22"></i>
                        </div>
                        <h5 class="mb-0">Laporan</h5>
                    </div>
                    <hr />
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="judul" class="col-sm-3 col-form-label">Judul Laporan</label>
                            <div class="col-sm-9">
                                <input type="text" name="judul" class="form-control" id="judul" placeholder="judul laporan" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Jenis Laporan</label>
                            <div class="col-sm-9">
                                <select class="form-select mb-3" name="id_jenis_laporan" aria-label="Default select example">
                                <?php
                                include "../conn/conn.php";
                                $query_jenis = mysqli_query($conn, "SELECT * FROM jenis_laporan");
                                while ($jenis = mysqli_fetch_array($query_jenis)) { ?>
									<option value="<?= $jenis['id_jenis_laporan'] ?>"><?= ucwords($jenis['judul']) ?></option>
                                <?php
                                };
                                ?>
								</select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Lokasi Kegiatan" class="col-sm-3 col-form-label">Lokasi Laporan</label>
                            <div class="col-sm-9">
                                <input type="text" name="lokasi" class="form-control" id="Lokasi Kegiatan" placeholder="Lokasi Kegiatan" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tgl" class="col-sm-3 col-form-label">Tanggal Laporan</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tgl" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="mytextarea" class="col-sm-3 col-form-label">Isi Laporan</label>
                            <div class="col-sm-9">
                            <textarea id="mytextarea" name="mytextarea"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                            <input type="submit" name="submit" value="Upload Foto / Video Laporan" class="btn btn-primary px-5">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>