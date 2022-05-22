<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/polda.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <title>POLDA</title>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img src="assets/images/polda.png" width="120" height="120" alt="" />
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            include "conn/conn.php";
                            $nrp = $_POST['NRP'];
                            $pass = $_POST['pass'];

                            $query = mysqli_query($conn, "SELECT * FROM staff WHERE nrp = '$nrp' AND password = '$pass'");
                            $cek_user = mysqli_num_rows($query);
                            if ($cek_user > 0) {
                                $data = mysqli_fetch_array($query);
                                session_start();
                                $_SESSION['nrp'] = $nrp;
                                $_SESSION['nama'] = $data['nama'];
                                $_SESSION['id_staff'] = $data['id_staff'];
                                if ($data['tipe']=="admin") {
                                    header("location:admin/index.php");
                                    exit();
                                }elseif($data['tipe']=="anggota"){
                                    header("location:anggota/index.php");
                                    exit();
                                }
                            } else {
                                echo ' <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
                                            </div>
                                            <div class="ms-3">
                                                <div class="text-white">NRP & password salah Mohon  cek ulang</div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            }
                        }
                        ?>

                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="form-body">
                                        <form class="row g-3" method="POST" action="" enctype="multipart/form-data">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Masukan NRP</label>
                                                <input type="text" name="NRP" class="form-control" id="inputEmailAddress" placeholder="No. NRP">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Masukan Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" name="pass" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" name="submit" class="btn btn-warning"><i class="bx bxs-lock-open"></i>Login Sekarang</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });

            window.setTimeout(function() {
                $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                    $(this).remove();
                });
            }, 2000);

        });
    </script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>
</body>

</html>