<?php 
include "../conn/conn.php";
?>
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10 bg-primary bg-gradient">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Anggota Terdaftar</p>
                        <h4 class="my-1 text-white">
                        <?php
                        $data_staff=mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) as total from staff"));
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
                        $data_laporan_diterima=mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) as total from laporan_kegiatan WHERE status='DITERIMA'"));
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
                        $data_laporan_ditolak=mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) as total from laporan_kegiatan WHERE status='DITOLAK'"));
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
                        $data_laporan=mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) as total from laporan_kegiatan"));
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