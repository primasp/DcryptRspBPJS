<?php
require_once("include/koneksi.php");


if (isset($_POST["proses"]) and $_POST["proses"] == "form1") {
    $inputan = trim($_POST["noKartu"]);
}
?>




        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Cek Peserta | Dashboard</title>

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
                        <span class="brand-text font-weight-light">Cek Peserta</span>
                    </a>
                </aside>

                <div class="content-wrapper">

                    <section class="content">
                        <div class="container-fluid">

                            <?php
                            if (empty($inputan)) {
                                $padingTop1 = "15%";
                                $padingTop2 = "8%";
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
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input style="height: 100px; font-size: 350%; text-align: center;border-radius: 15px" onkeypress="return hanyaAngka(event)" class="form-control" type="text" name="noKartu" id="exampleInputEmail1" required oninvalid="this.setCustomValidity('Nomor Kartu Harus Diisi !!')" oninput="setCustomValidity('')" placeholder="No. Kartu BPJS / NIK KTP" value="<?php echo $inputan; ?>">
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
                            if (!empty($inputan)) {
                                // echo $inputan;
                                $noKartu = $inputan;

                                require_once "include/peserta.php";

                                // echo $tglSep; 
                                if ($kodePeserta == 200) {
                                     // echo"PENCARIAN BY NO.KARTU BPJS";
                                     $noKartuBPJS = $noKartu;
                                     $NIK_Pasien = $NIK;
                                     $Nama_Pasien = $nama;
                                     $tglLhr_Pasien = $tglLahir;
                                     $umur_Pasien = $umurSekarang;
                                     $FK1_Pasien = $nmProviderPserta;
                                     $Kd_FK1_Pasien = $kdProviderPserta;
                                     $HakKls_Pasien = $HakKelas;
                                     $StatPeserta_Pasien = $keteranganStatus;
                                     $JnsPeserta_Pasien = $keteranganJnsPsrt;

                                     ?>
                                     <center><hr><label>After Decrypt:</label></center>
                                        <div class="row" style="padding-top: 1%;">
                                        
                                        <div class="col-md-2"></div>
                                       
                                        <div class="col-md-8" style="padding: 15px;border-style: solid;font-size: 16px;font-family: arial black;border-radius: 15px;background-color: grey; color: white">
                                       
                                        <div class="row" style="padding-bottom: 10px">
                                                <div class="col-md-5">Nomor Kartu</div>
                                                <div class="col-md-1" style="width: 5px">:</div>
                                                <div class="col-md-6"><?php echo $noKartuBPJS; ?></div>
                                            </div>
                                            <div class="row" style="padding-bottom: 10px">
                                                <div class="col-md-5">Nomor Induk Kependudukan (NIK)</div>
                                                <div class="col-md-1" style="width: 5px">:</div>
                                                <div class="col-md-6"><?php echo $NIK_Pasien; ?></div>
                                            </div>
                                            <div class="row" style="padding-bottom: 10px">
                                                <div class="col-md-5">Nama Peserta</div>
                                                <div class="col-md-1" style="width: 5px">:</div>
                                                <div class="col-md-6"><?php echo $Nama_Pasien; ?></div>
                                            </div>
                                            <div class="row" style="padding-bottom: 10px">
                                                <div class="col-md-5">Tanggal Lahir</div>
                                                <div class="col-md-1" style="width: 5px">:</div>
                                                <div class="col-md-6"><?php echo $tglLhr_Pasien; ?></div>
                                            </div>
                                            <div class="row" style="padding-bottom: 10px">
                                                <div class="col-md-5">Umur</div>
                                                <div class="col-md-1" style="width: 5px">:</div>
                                                <div class="col-md-6"><?php echo $umur_Pasien; ?></div>
                                            </div>
                                            <div class="row" style="padding-bottom: 10px">
                                                <div class="col-md-5">Faskes Tingkat I</div>
                                                <div class="col-md-1" style="width: 5px">:</div>
                                                <div class="col-md-6"><?php echo $FK1_Pasien . " ( " . $Kd_FK1_Pasien . " ) "; ?></div>
                                            </div>
                                            <div class="row" style="padding-bottom: 10px">
                                                <div class="col-md-5">Hak Kelas</div>
                                                <div class="col-md-1" style="width: 5px">:</div>
                                                <div class="col-md-6"><?php echo $HakKls_Pasien; ?></div>
                                            </div>
                                            <div class="row" style="padding-bottom: 10px">
                                                <div class="col-md-5">Status Kepesertaan</div>
                                                <div class="col-md-1" style="width: 5px">:</div>
                                                <div class="col-md-6"><?php echo $StatPeserta_Pasien; ?></div>
                                            </div>
                                            <div class="row" style="padding-bottom: 10px">
                                                <div class="col-md-5">Keterangan</div>
                                                <div class="col-md-1" style="width: 5px">:</div>
                                                <div class="col-md-6"><?php echo $JnsPeserta_Pasien; ?></div>
                                            </div>
                                        </div>
                                    </div>
                           
                                     <?php
                                }
                                else {

?>
 <table border="0" align="center">
                                        <tr>
                                            <td height="80px"></td>
                                        </tr>
                                    
                               
                                        <tr>
                                          <td align="center" valign="baseline"><?php echo "<b>ERROR !!!</b> : ".$json['metaData']['code']." (".$json['metaData']['message'].")"; ?></td>
                                        </tr>
                                     

                                    
                                       

                                    </table>
<?php

                                }
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

<?php
    

?>