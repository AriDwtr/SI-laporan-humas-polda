<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Anggota</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">List Anggota</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Data Anggota</h6>
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
                            <center>No. NRP</center>
                        </th>
                        <th width="20%">
                            <center>Nama Lengkap</center>
                        </th>
                        <th width="10%">Jenis Kelamin</th>
                        <th>
                            <center>Pangkat<center>
                        </th>
                        <th>
                            <center>Action<center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../conn/conn.php";
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM staff");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td>
                                <center><?= $no++ ?></center>
                            </td>
                            <td><i><?= $data['nrp'] ?></i></td>
                            <td><?= ucwords($data['nama']) ?></td>
                            <td>
                                <center><?= $data['jenis_kelamin'] == "laki-laki" ? "L" : "P" ?></center>
                            </td>
                            <td>
                                <center><?= strtoupper($data['pangkat']) ?></center>
                            </td>
                            <td>
                            <a href="index.php?page=edit_anggota&id=<?= $data['id_staff'] ?>"><i class="bx bxs-pencil"></i> Edit</a> | <a href="index.php?page=delete_anggota&id=<?= $data['id_staff'] ?>" style="color:red" onClick="return confirm('Delete This Anggota?')"><i class="bx bxs-trash"></i> Hapus</a>
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