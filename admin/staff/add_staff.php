<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Staff</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Staff</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="row">
    <div class="col-xl-9 mx-auto">
        <div class="card border-top border-0 border-4 border-warning">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22"></i>
                        </div>
                        <h5 class="mb-0">Staff Registration</h5>
                    </div>
                    <hr />
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="nrp" class="col-sm-3 col-form-label">NRP</label>
                            <div class="col-sm-9">
                                <input type="number" name="nrp" class="form-control" id="nrp" placeholder="NRP">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputEnterYourName" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select class="form-select mb-3" name="jk" aria-label="Default select example">
                                    <option value="laki-laki" selected>Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pangkat" class="col-sm-3 col-form-label">Pangkat</label>
                            <div class="col-sm-9">
                                <input type="text" name="pangkat" class="form-control" id="pangkat" placeholder="pangkat">
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Username Login</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="username" id="inputEmailAddress2" placeholder="Username Login">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Password Login</label>
                            <div class="col-sm-9">
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" name="pass" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tipe</label>
                            <div class="col-sm-9">
                                <select class="form-select mb-3" name="tipe">
                                    <option value="staff" selected>staff</option>
                                    <option value="admin">admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" name="submit" class="btn btn-success px-5">Daftar Staff</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>