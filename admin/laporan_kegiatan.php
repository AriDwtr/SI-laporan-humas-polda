<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Laporan Kegiatan</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Laporan Kegiatan</li>
            </ol>
        </nav>
    </div>
</div>
<?php 
 include "../conn/conn.php";
?>
<!--end breadcrumb-->
<div class="">
    <div class="">
        <div class="container py-2">
            <h2 class="font-weight-light text-center text-muted py-3">Laporan Kegiatan</h2>
            <?php
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
              $query = mysqli_query($conn, "SELECT * FROM laporan_kegiatan as a JOIN staff as b ON b.id_staff = a.created_by WHERE a.status='PENDING' OR a.status='DITERIMA' ORDER BY a.id_laporan DESC LIMIT 20");
              while ($data = mysqli_fetch_array($query)) { ?>
                <div class="row">
                <div class="col-auto text-center flex-column d-none d-sm-flex">
                    <div class="row h-50">
                        <div class="col border-end">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                    <h5 class="m-2">
                        <span class="badge rounded-pill bg-warning">&nbsp;</span>
                    </h5>
                    <div class="row h-50">
                        <div class="col border-end">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                </div>
                <div class="col py-2">
                    <div class="card border-primary shadow radius-15">
                        <div class="card-body">
                            <div class="float-end text-primary"><?= tgl_indo(date('Y-m-d', strtotime($data['tgl']))) ?></div>
                            <h4 class="card-title text-primary"><?= ucwords($data['judul_laporan']) ?> <span class="badge <?= $data['status']=="DITERIMA" ? ' bg-success' : ' bg-danger'?>" style="font-size:12px;"><?= $data['status'] ?></span></h4>
                            <p class="card-text"><?= $data['isi'] ?></p>
                            <button class="btn btn-sm btn-outline-warning" type="button" data-bs-target="#t2_details<?= $data['id_laporan']?>" data-bs-toggle="collapse">Detail Laporan ▼</button>
                            <div class="collapse border" id="t2_details<?= $data['id_laporan']?>">
                                <div class="p-2 text-monospace">
                                    <div>Lokasi : <?= ucwords($data['lokasi']) ?></div>
                                    <div>Pelapor : <b><?= strtoupper($data['nama']).' - '.$data['nrp'] ?></b></div>
                                </div>
                            </div>
                            <a href="index.php?page=confirm_laporan&&id=<?= $data['id_laporan'] ?>" class="btn btn-sm btn-success" onClick="return confirm('Apakah Laporan Sudah Benar ?')">Terima Laporan</a>
                            <a href="" class="btn btn-sm btn-danger">Tolak Laporan</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
            ?>
        <!--container-->
    </div>
</div>