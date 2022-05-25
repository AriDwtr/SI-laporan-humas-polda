<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Laporan</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">List Laporan Saya</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Laporan Saya</h6>
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
                        <th>
                            <center>Status<center>
                        </th>
                        <th>
                            <center>Action<center>
                        </th>
                    </tr>
                </thead>
                <tbody>
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

                    include "../conn/conn.php";
                    $no = 1;
                    $id_staff = $_SESSION['id_staff'];
                    $query = mysqli_query($conn, "SELECT * FROM laporan_kegiatan as a JOIN jenis_laporan as b ON b.id_jenis_laporan = a.id_jenis_laporan WHERE a.created_by = '$id_staff'");
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
                            <td>
                                <center><span class="badge <?= $data['status']=="DITERIMA" ? ' bg-success' : ' bg-danger'?>"><?= $data['status'] ?></span></center>
                            </td>
                            <td>
                            <?php
                            if ($data['status']=="DITERIMA") {
                             echo '----';
                            }else { ?>
                              <a href="index.php?page=edit_laporan&id=<?= $data['id_laporan'] ?>"><i class="bx bxs-pencil"></i> Edit</a> | <a href="index.php?page=delete_laporan&id=<?= $data['id_laporan'] ?>" style="color:red" onClick="return confirm('Delete This Laporan ?')"><i class="bx bxs-trash"></i> Hapus</a>
                            <?php }
                            ?>
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