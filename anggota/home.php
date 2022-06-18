<?php
include "../conn/conn.php";
function tgl_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    
    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun
 
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-xl-2">
                        <a class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-home-circle'></i>Dashboard</a>
                    </div>
                    <div class="col-lg-9 col-xl-10">
                        <form class="float-lg-end">
                            <div class="row row-cols-lg-auto g-2">
                                <div class="col-12">
                                    <h3><?= tgl_indo(date('Y-m-d')) ?></h3>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10 bg-primary bg-gradient">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Anggota Terdaftar</p>
                        <h4 class="my-1 text-white">
                            <?php
                            $data_staff = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) as total from staff"));
                            echo $data_staff['total'];
                            ?>
                        </h4>
                    </div>
                    <div class="text-white ms-auto font-35"><i class='bx bx-user'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-success bg-gradient">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Total Laporan Diterima</p>
                        <h4 class="my-1 text-white">
                            <?php
                            $data_laporan_diterima = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) as total from laporan_kegiatan WHERE status='DITERIMA'"));
                            echo $data_laporan_diterima['total'];
                            ?>
                        </h4>
                    </div>
                    <div class="text-white ms-auto font-35"><i class='bx bx-trophy'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-danger bg-gradient">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Total Laporan Ditolak</p>
                        <h4 class="my-1 text-white">
                            <?php
                            $data_laporan_ditolak = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) as total from laporan_kegiatan WHERE status='DITOLAK'"));
                            echo $data_laporan_ditolak['total'];
                            ?>
                        </h4>
                    </div>
                    <div class="text-white ms-auto font-35"><i class='bx bx-x'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-info bg-gradient">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Laporan Masuk</p>
                        <h4 class="my-1 text-white">
                            <?php
                            $data_laporan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) as total from laporan_kegiatan"));
                            echo $data_laporan['total'];
                            ?>
                        </h4>
                    </div>
                    <div class="text-white ms-auto font-35"><i class='bx bx-task'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th width="5%">
                            <center>No</center>
                        </th>
                        <th>
                            <center>Judul Laporan</center>
                        </th>
                        <th width="20%">
                            <center>Jenis Laporan</center>
                        </th>
                        <th width="10%">
                            <center>Lokasi</center>
                        </th>
                        <th>
                            <center>Tanggal Laporan<center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../conn/conn.php";
                    $no = 1;
                    $id_staff = $_SESSION['id_staff'];
                    $query = mysqli_query($conn, "SELECT * FROM laporan_kegiatan as a JOIN jenis_laporan as b ON b.id_jenis_laporan = a.id_jenis_laporan WHERE a.status='DITERIMA'");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td>
                                <center><?= $no++ ?></center>
                            </td>
                            <td><center><b><?= ucwords($data['judul_laporan']) ?></b></center></td>
                            <td><center><?= ucfirst($data['judul']) ?></center></td>
                            <td>
                                <?= ucwords($data['lokasi']) ?>
                            </td>
                            <td>
                                <center><?= tgl_indo(date('Y-m-d', strtotime($data['tgl']))) ?></center>
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
</div>
</div>