	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	    <div class="breadcrumb-title pe-3">Profile</div>
	    <div class="ps-3">
	        <nav aria-label="breadcrumb">
	            <ol class="breadcrumb mb-0 p-0">
	                <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="bx bx-home-alt"></i></a>
	                </li>
	                <li class="breadcrumb-item active" aria-current="page">Profile</li>
	            </ol>
	        </nav>
	    </div>
	</div>
	<!--end breadcrumb-->
	<div class="container">
	    <?php
        include "../conn/conn.php";
        $id_staff = $_SESSION['id_staff'];
        $data_profile = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM staff WHERE id_staff = '$id_staff'"));
        if (isset($_POST['submit'])) {
            $pass = $_POST['pass'];
            mysqli_query($conn,"UPDATE staff SET password = '$pass' WHERE id_staff = '$id_staff'");
            echo '
            <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class="bx bxs-key"></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Berhasil Merubah Password Baru</h6>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        }
        ?>
	    <div class="main-body">
	        <div class="row">
	            <div class="col-lg-4">
	                <div class="card">
	                    <div class="card-body">
	                        <div class="d-flex flex-column align-items-center text-center">
	                            <img src="../assets/images/<?= $data_profile['jenis_kelamin'] == "laki-laki" ? "policemale.png" : "policewoman.png" ?>" alt="Admin" class="rounded-circle p-1 bg-warning" width="110">
	                            <div class="mt-3">
	                                <h4><?= ucwords($data_profile['nama']) ?></h4>
	                                <p class="text-secondary mb-1"><b><?= $data_profile['nrp'] ?></b></p>
	                                <p class="text-muted font-size-sm"><?= strtoupper($data_profile['pangkat']) ?></p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-8">
	                <div class="card">
	                    <div class="card-body">
	                        <form action="" method="post" enctype="multipart/form-data">
	                            <div class="row mb-3">
	                                <div class="col-sm-3">
	                                    <h6 class="mb-0">Password Akun</h6>
	                                </div>
	                                <div class="col-sm-9 text-secondary">
	                                    <input type="password" name="pass" value="<?= $data_profile['password'] ?>" class="form-control" placeholder="Enter Password" disabled>
	                                </div>
	                            </div>
	                            <div class="row mb-3">
	                                <div class="col-sm-3">
	                                    <h6 class="mb-0">Password Baru</h6>
	                                </div>
	                                <div class="col-sm-9 text-secondary">
	                                    <div class="input-group" id="show_hide_password">
	                                        <input type="password" name="pass" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-sm-3"></div>
	                                <div class="col-sm-9 text-secondary">
	                                    <input type="submit" name="submit" class="btn btn-primary px-4" value="Ubah Password" />
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>