
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8;charset=utf-8" />
        <base href="<?php echo base_url(); ?>">
            <title><?php echo $title; ?></title>         <!---buat bisa diubah ubah title halamannya-->



            <link rel="stylesheet" type="text/css" href="Template_files/reset000.css" media="screen" />
            <link rel="stylesheet" type="text/css" href="Template_files/grid0000.css" media="screen" />
            <link rel="stylesheet" type="text/css" href="Template_files/styles00.css" media="screen" />
            <link rel="stylesheet" type="text/css" href="Template_files/jquery00.css" media="screen" />
            <link rel="stylesheet" type="text/css" href="Template_files/tablesor.css" media="screen" />
            <link rel="stylesheet" type="text/css" href="Template_files/thickbox.css" media="screen" /><link rel="stylesheet" type="text/css" href="Template_files/theme-bl.css" media="screen" />



            <script type="text/javascript" src="Template_files/jquery-1.js"></script>
            <script type="text/javascript" src="Template_files/jquery00.js"></script>
            <script type="text/javascript" src="Template_files/jquery01.js"></script>
            <script type="text/javascript" src="Template_files/jquery02.js"></script>
            <script type="text/javascript" src="Template_files/jquery03.js"></script>
            <script type="text/javascript" src="Template_files/thickbox.js"></script>

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

            <!-- Initiate password strength script -->
            <script type="text/javascript">
                $(function() {
                    $('.password').pstrength();
                });
            </script>
    </head>
    <body>
        <!-- Header -->
        <div id="header">
            <!-- Header. Status part -->
            <div id="header-status">
                <div class="container_12">
                    <div class="grid_8">
                        <span id="text-invitation"></span>
                        <!-- Messages displayed through the thickbox -->

                    </div>
                    <div class="grid_4">
                        <a href="" id="logout">
                            Logout
                        </a>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End #header-status -->

            <img src="Template_files/logo0000.gif" style="position: absolute; top:56px; left:60px" />
            <img src="Template_files/puskesmas.png" style="position: absolute; top:45px; left:120px" />
            <img src="Template_files/alamat.png" style="position: absolute; top:95px; left:120px" />
            <img src="Template_files/gigi.png" style="position: absolute; top:40px; right:2px" />
            <!-- Header. Main part -->
            <div id="header-main">
                <div class="container_12">
                    <div class="grid_12">                       												
                        <ul id="nav">
                            <li><a href="">Home</a></li>
                            <li id="current"><a href="#">Antrian</a></li>
                            <li><a href="#">Pasien</a></li>
                            <li><a href="#">Statistik</a></li>
                            <li><a href="#">Laporan</a></li>
                        </ul>

                    </div><!-- End. .grid_12-->
                    <div style="clear: both;"></div>
                </div><!-- End. .container_12 -->
            </div> <!-- End #header-main -->
            <div style="clear: both;"></div>
            <!-- Sub navigation -->

        </div> <!-- End #header -->


        <div style="clear: both;"></div>
        <!-- Sub navigation -->
        <div id="subnav">
            <div class="container_12">
                <div class="grid_12">
                    <ul>
                        <li><a href="#">Medical Record</a></li>
                        <li><a href="#">Data Pasien</a></li>

                    </ul>

                </div><!-- End. .grid_12-->
            </div><!-- End. .container_12 -->
            <div style="clear: both;"></div>
        </div> <!-- End #subnav -->
        </div> <!-- End #header -->