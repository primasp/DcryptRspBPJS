<?php

if (isset($_POST["proses"]) and $_POST["proses"] == "form1") {
    $urlInput = trim($_POST["url"]);
    $cIdInput = trim($_POST["cId"]);
    $cKeyInput = trim($_POST["cKey"]);
    $userKeyInput = trim($_POST["userKey"]);
    $methodInput = trim($_POST["method"]);
    $inputBody = trim($_POST["inputBody"]);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DECRYPT | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <!-- <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="" class="brand-link">
                <span class="brand-text font-weight-light">DECRYPT</span>
            </a>
        </aside>

        <div class="content-wrapper">

            <section class="content">
                <div class="container-fluid">
                    <?php
                    if (empty($inptValue)) {
                        $padingTop1 = "2%";
                        $padingTop2 = "2%";
                    } else {
                        $padingTop1 = "2%";
                        $padingTop2 = "2%";
                    }
                    ?>

                    <div class="row" style="padding-top: <?php echo $padingTop1; ?>">
                        <div class="col-md-2"></div>

                        <div class="col-md-8">
                            <form role="form" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input style=" text-align: center;border-radius: 15px" onkeypress="return hanyaAngka(event)" class="form-control" type="text" name="url" id="url" required oninvalid="this.setCustomValidity('Nomor Kartu Harus Diisi !!')" oninput="setCustomValidity('')" placeholder="URL" value="<?php echo $urlInput; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input style=" text-align: center;border-radius: 15px" onkeypress="return hanyaAngka(event)" class="form-control" type="text" name="cId" id="cId" required oninvalid="this.setCustomValidity('Nomor Kartu Harus Diisi !!')" oninput="setCustomValidity('')" placeholder="CONS ID" value="<?php echo $cIdInput; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input style=" text-align: center;border-radius: 15px" onkeypress="return hanyaAngka(event)" class="form-control" type="text" name="userKey" id="userKey" required oninvalid="this.setCustomValidity('Nomor Kartu Harus Diisi !!')" oninput="setCustomValidity('')" placeholder="USER KEY" value="<?php echo $userKeyInput; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input style=" text-align: center;border-radius: 15px" onkeypress="return hanyaAngka(event)" class="form-control" type="text" name="method" id="method" required oninvalid="this.setCustomValidity('Nomor Kartu Harus Diisi !!')" oninput="setCustomValidity('')" placeholder="METHOD" value="<?php echo $methodInput; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input style=" text-align: center;border-radius: 15px" onkeypress="return hanyaAngka(event)" class="form-control" type="text" name="cKey" id="cKey" required oninvalid="this.setCustomValidity('Nomor Kartu Harus Diisi !!')" oninput="setCustomValidity('')" placeholder="CKEY" value="<?php echo $cKeyInput; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <textarea id="inputBody" name="inputBody" class="form-control" rows="15"><?php echo $inputBody ?></textarea>
                                        </div>
                                    </div>
                                </div>






                                <div class="row" style="padding-top: <?php echo $padingTop2; ?>">
                                    <div class="col-md-2" style=""></div>
                                    <div class="col-md-8" style="">
                                        <input type="hidden" name="proses" value="form1">
                                        <button type="submit" class="btn btn-primary" style="height: 80px; font-size: 250%; width: 100%;border-radius: 10px;font-weight: bolder;">PROSES</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2"></div>
                    </div>


                    <?php
                    if (!empty($urlInput) && !empty($cIdInput)  && !empty($cKeyInput)  && !empty($userKeyInput) && !empty($methodInput) && $methodInput == "GET") {
                        require_once "include/decrypt.php";
                    ?>
                        <br><br>
                        <center><label>Response2:</label><br>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <textarea id="inptValue" name="inptValue" class="form-control" rows="15"><?php var_dump($responseFinal); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        <?php
                    } else if (!empty($urlInput) && !empty($cIdInput)  && !empty($cKeyInput)  && !empty($userKeyInput) && !empty($methodInput) && $methodInput == "POST") {
                        require_once "include/decryptPost.php";
                        ?>




                            <br><br>
                            <center><label>Response2:</label><br>

                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <textarea id="inptValue" name="inptValue" class="form-control" rows="15"><?php var_dump($responseFinal); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php

                        }


                            ?>





















            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script> -->
    <!-- <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>