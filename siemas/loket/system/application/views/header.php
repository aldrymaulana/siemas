<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <base href="<?php echo base_url() ?>"/>

        <meta http-equiv="content-type" content="text/html; charset=utf-8;charset=utf-8" />
        <title>Loket - Puskesmas Bogor Tengah</title>

        <!-- CSS Reset -->
        <link rel="stylesheet" type="text/css" href="Template_files/reset000.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="Template_files/grid0000.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="Template_files/colorbox.css" />
        <link rel="stylesheet" type="text/css" href="css/redmond/jquery-ui-1.8.14.custom.css" />
        <link rel="stylesheet" type="text/css" href="Template_files/styles00.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="Template_files/jquery00.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="Template_files/tablesor.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="Template_files/thickbox.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="Template_files/theme-bl.css" media="screen" />
        
        <!-- Themes. Below are several color themes. Uncomment the line of your choice to switch to different color. All styles commented out means blue theme. -->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-red.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-yellow.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-green.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-graphite.css" media="screen" />-->

        <!-- JQuery engine script-->
        <script type="text/javascript" src="Template_files/jquery-1.js"></script>
        <script type="text/javascript" src="Template_files/jquery00.js"></script>
        <script type="text/javascript" src="Template_files/jquery01.js"></script>
        <script type="text/javascript" src="Template_files/jquery02.js"></script>


        <!-- JQuery password strength plugin script -->
        <script type="text/javascript" src="Template_files/jquery03.js"></script>

        <!-- JQuery thickbox plugin script -->
        <script type="text/javascript" src="Template_files/thickbox.js"></script>
        <script type="text/javascript" src="Template_files/jquery-1.5.min.js"></script>
        <script type="text/javascript" src="Template_files/jquery.colorbox-min.js"></script>
        <script type="text/javascript" src="../js/modules/exporting.js"></script>
        <script type="text/javascript" src="../js/highcharts.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.14.custom.min.js"></script>

        <!-- Initiate WYIWYG text area -->
        <script type="text/javascript">
            $(function()
            {
                $('#wysiwyg').wysiwyg(
                {
                    controls : {
                        separator01 : { visible : true },
                        separator03 : { visible : true },
                        separator04 : { visible : true },
                        separator00 : { visible : true },
                        separator07 : { visible : false },
                        separator02 : { visible : false },
                        separator08 : { visible : false },
                        insertOrderedList : { visible : true },
                        insertUnorderedList : { visible : true },
                        undo: { visible : true },
                        redo: { visible : true },
                        justifyLeft: { visible : true },
                        justifyCenter: { visible : true },
                        justifyRight: { visible : true },
                        justifyFull: { visible : true },
                        subscript: { visible : true },
                        superscript: { visible : true },
                        underline: { visible : true },
                        increaseFontSize : { visible : false },
                        decreaseFontSize : { visible : false }
                    }
                } );
            });
        </script>

        <!-- Initiate tablesorter script -->

        <script type="text/javascript">
            $(document).ready(function() {
                $("#myTable")
                .tablesorter({
                    // zebra coloring
                    widgets: ['zebra'],
                    // pass the headers argument and assing a object
                    headers: {
                        // assign the sixth column (we start counting zero)
                        6: {
                            // disable it by setting the property sorter to false
                            sorter: false
                        }
                    }
                })
                .tablesorterPager({container: $("#pager")});
            });
        </script>
        <script type="text/javascript">
            function tampilkan_profil_kk() {
                $('#daftar_kk').hide();
                $('#profil_kk').show();
                return false;
            };
            function tampilkan_hasil_cari(){
                $('#daftar_kk').show();
                $('#profil_kk').hide();
                return false;
            };
        </script>
        <script>
            $(function() {
                $( "#datepicker" ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "dd-mm-yy"
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".popup").colorbox({initialHeight: "900px", initialWidth: "900px", width: "55%", height: "75%", onComplete: function(){
                        $( "#datepicker" ).datepicker({
                            changeMonth: true,
                            changeYear: true
                        });
                    }
                });
            });
        </script>
    </head>
    <body>
        <div id="header">
            <div id="header-main">
                <div class="container_12">
                    <div class="grid_12">
                        <img src="Template_files/logo0000.gif"  style="position: absolute; top:10px; left:20px"/>
                        <div style="position: absolute; left: 85px; top: 5px; color: white; text-shadow: 3px 3px 10px #000000; width: 400px; display: inline-block">
                            <span style="font-size: 28px">Puskesmas Bogor Tengah</span>
                            <br/>
                            <span style="font-size: 22px">Loket</span>
                        </div>
                        <?php

                        if(!function_exists('tampilan_tanggal_indonesia')) {
                            function tampilan_tanggal_indonesia($tanggal, $pake_hari = true, $pake_tahun = true) {

                                // input: yy-mm-dd

                                $namaHari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
                                $namaBulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

                                $d = strtotime($tanggal);

                                $date_string = date('j', $d) . " " . $namaBulan[(date('n', $d)-1)];

                                if($pake_hari)
                                    $date_string = $namaHari[date('N', $d)] . ", " . $date_string;

                                if($pake_tahun)
                                    $date_string = $date_string . " " . date("Y", $d);

                                return $date_string;

                            }
                        }

                        ?>
                        <div style="position: absolute; top:10px; right:20px; color: white; text-shadow: 3px 3px 10px #000000; font-size: 20px">
                            <?php echo tampilan_tanggal_indonesia("today"); ?>
                        </div>
                        <ul id="nav">
                            <li id="<?php if($this->uri->segment(1)== "") echo "current"?>"><a href="index.php">Home</a></li>
                            <li id="<?php if(($this->uri->segment(1)== "kk")||($this->uri->segment(1)== "registrasi")||($this->uri->segment(2)=="registrasi_pasien_sukses")) echo "current"?>"><a href="index.php/registrasi">Registrasi</a></li>
                            <li id="<?php if($this->uri->segment(1)== "pembayaran") echo "current"?>"><a href="index.php/pembayaran">Pembayaran</a></li>
                            <li id="<?php if(($this->uri->segment(1)== "pasien")&&($this->uri->segment(2)!= "registrasi_pasien_sukses")) echo "current"?>"><a href="index.php/pasien">Data Pasien</a></li>
                            <li id="<?php if($this->uri->segment(1)== "statistik") echo "current"?>"><a href="index.php/statistik">Statistik</a></li>
                            <li id="<?php if($this->uri->segment(1)== "c_laporan" || $this->uri->segment(1)== "kunjungan") echo "current"?>"><a href="index.php/c_laporan">Laporan</a></li>
                            <li id=""><a href="../">Keluar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
       
                        
            
            <div style="clear: both;"></div>
