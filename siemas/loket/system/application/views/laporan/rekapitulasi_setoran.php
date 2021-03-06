<?php $this->load->view('header');?>
<!-- SUBNAV -->
<?php $this->load->view('subnav_laporan');?>
<!-- END SUBNAV -->

<?php echo $laporan[0]['gigi'];?>
<div style="font-size: 14px !important;margin-left: 10px;padding: 5px;"><a href="index.php/c_laporan">Laporan</a> > Rekapitulasi Setoran</div>
<div>
    <div class="grid_6" style="width: 98%">
        <div class="module">
            <h2><span>Rekapitulasi Setoran</span></h2>
            <div class="module-body">
                <div>
                    <form method="post" action="index.php/c_laporan/rekapitulasi_setoran">
                    <table class="noborder" style="width: 100%">
                        <tr>
                            <td width="11%">Pilih Bulan/Tahun</td>
                            <td>:</td>
                            <td width="11%">
                                <?php $bulan = array('','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sept','Okt','Nov','Des'); ?>
                                <select name="bulan_kunjungan" style="width: 100%">
                                    <?php for($i=1;$i<=12;$i++) {?>
                                    <option  value="<?php echo $i; ?>" <?php if($laporan[0]['bulan'] == $i) echo 'selected="selected"' ?>><?php echo $bulan[$i]; ?></option>
                                        <?php } ?>
                                </select>
                            </td>
                            <td width="11%">
                                <select name="tahun_kunjungan" style="width: 100%">
                                    <?php foreach($tahun as $thn) {?>
                                    <option value="<?php echo $thn['tahun'];?>" <?php if($laporan[0]['tahun'] == $thn) echo 'selected="selected"' ?>><?php echo $thn['tahun'];?></option>
                                        <?php }?>
                                </select>
                            </td>
                            <td width="7%">
                                <div align="right">
                                    <input type="submit" value="Pilih" class="submit-green" name="pilih">
                                </div>
                            </td>
                            <td align="right" width="67%">
                                <a href="index.php/c_laporan/rekap_setoran_xls/<?php echo intval($laporan[0]['bulan'])."/".$laporan[0]['tahun']?>" class="submit-green xls-button" style="margin-left: 10px" title="Simpan sebagai file Excel">
                                    <img src="images/ms-excel.png" alt=""/>
                                    Simpan ke Excel
                                </a>
                            </td>
                        </tr>
                    </table>
                    </form>
                        <hr/>
                </div>
                <?php $nama_bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember")
                       
                        ?>
                <h3 align="center" class="style2">REKAPITULASI SETORAN PUSKESMAS BOGOR TENGAH</h3>
                <h3 align="center"><strong>BULAN: <?php echo $nama_bulan[intval($laporan[0]['bulan'])]." ".$laporan[0]['tahun']?></strong></h3>
                <br/>
                <table style="width: 101%; font-size: 15px;">
                    <thead>
                        <tr>
                            <th style="font-size: 15px;" class="header"  width="50" rowspan="2"><div align="center"><strong>Tgl</strong></div></th>
                            <th style="font-size: 15px;" class="header"  width="50" rowspan="2">BP Umum</th>
                            <th style="font-size: 15px;" class="header" colspan="13"><strong>TINDAKAN PELAYANAN</strong></th>
                            <th style="font-size: 15px;" class="header" width="90" rowspan="2"><div align="center"><strong>JUMLAH</strong></div></th>
                            <th style="font-size: 15px;" class="header" width="44" rowspan="2"><div align="center"><strong>KET.</strong></div></th>
                        </tr>
                        <tr>
                            <th style="font-size: 15px;" class="header"width="74"><div align="center"><strong>GIGI</strong></div></th>
                            <th style="font-size: 15px;" class="header"width="74"><div align="center"><strong>LABOR</strong></div></th>
                            <th style="font-size: 15px;" class="header" width="86"><div align="center"><strong>RONTGEN</strong></div></th>
                            <th style="font-size: 15px;" class="header" width="62"><div align="center"><strong>EKG</strong></div></th>
                            <th style="font-size: 15px;" class="header" width="64"><div align="center"><strong>HAJI</strong></div></th>
                            <th style="font-size: 15px;" class="header" width="56"><div align="center"><strong>RB</strong></div></th>
                            <th style="font-size: 15px;" class="header" width="61"><div align="center"><strong>SP.A</strong></div></th>
                            <th style="font-size: 15px;" class="header" width="61"><div align="center"><strong>SP.D</strong></div></th>
                            <th style="font-size: 15px;" class="header" width="60"><div align="center"><strong>USG</strong></div></th>
                            <th style="font-size: 15px;" class="header" width="56"><div align="center"><strong>KB</strong></div></th>
                            <th class="header" width="71"><div align="center"><strong>TT. CATIN</strong></div></th>
                            <th style="font-size: 15px;" class="header" width="90"><div align="center"><strong>KIR</strong></div></th>
                            <th style="font-size: 15px;" class="header" width="90"><div align="center"><strong>MANTUOX</strong></div></th>
                        </tr>
                    </thead>
                    <?php $umum=0; $gigi=0; $labor=0;  $radio=0; $ekg=0; $haji=0; $rb=0;$anak=0; $dalam=0;$usg=0;$kb=0; $catin=0;$kir=0;$mantuox=0;$jum=0;
                          $i=1;foreach($laporan as $lap){
                                $jumlah = $lap['umum']+$lap['gigi']+$lap['labor']+$lap['rontgen']+$lap['ekg']+$lap['haji']+$lap['rb']+$lap['kb']+$lap['kir']+$lap['anak']+$lap['dalam']+$lap['usg']+$lap['catin']+$lap['mantuox'];
                   ?>


                    <tr class="<?php if($i%2==0) echo "odd"; else echo "even"?>">
                        <td align="center"><?php echo $i++ ?></td>
                        <td class="font_kecil"><?php echo number_format($lap['umum'])?></td>
                        <td class="font_kecil"><?php echo number_format($lap['gigi'])?></td>
                        <td class="font_kecil"><?php echo number_format($lap['labor'])?></td>
                        <td class="font_kecil"><?php echo number_format($lap['rontgen']);?></td>
                        <td class="font_kecil"><?php echo number_format($lap['ekg'])?></td>
                        <td class="font_kecil"><?php echo number_format($lap['haji'])?></td>
                        <td class="font_kecil"><?php echo number_format($lap['rb'])?></td>
                        <td class="font_kecil"><?php echo number_format($lap['anak'])?></td>
                        <td class="font_kecil"><?php echo number_format($lap['dalam'])?></td>
                        <td class="font_kecil"><?php echo number_format($lap['usg'])?></td>
                        <td class="font_kecil"><?php echo number_format($lap['kb'])?></td>
                        <td class="font_kecil"><?php echo number_format($lap['catin'])?></td>
                        <td class="font_kecil"><?php echo number_format($lap['kir'])?></td>
                        <td class="font_kecil"><?php echo number_format($lap['mantuox'])?></td>
                        <td class="font_kecil"><b><?php echo number_format($jumlah)?></b></td>
                        <td class="font_kecil"></td>
                    </tr>
                    <?php $umum   += $lap['umum'];
                          $gigi  += $lap['gigi'];
                          $labor  += $lap['labor'];
                          $radio  += $lap['rontgen'];
                          $ekg  += $lap['ekg'];
                          $haji  += $lap['haji'];
                          $rb  += $lap['rb'];
                          $anak  += $lap['anak'];
                          $dalam  += $lap['dalam'];
                          $usg  += $lap['usg'];
                          $kb  += $lap['kb'];
                          $catin += $lap['catin'];
                          $kir  += $lap['kir'];
                          $mantuox += $lap['mantuox'];
                          $jum += $jumlah;
                    }?>
                    <tr class="header">
                        <th class="header" style="font-size: 15px; text-align: right !important"><b>Jumlah</b></th>
                        <th class="header" style="font-size: 15px; text-align: right !important"><?php echo number_format($umum) ?></th>
                        <th class="header" style="font-size: 15px; text-align: right !important"><?php echo number_format($gigi) ?></th>
                        <th class="header" style="font-size: 15px; text-align: right !important"><?php echo number_format($labor) ?></th>
                        <th class="header" style="font-size: 15px; text-align: right !important"><?php echo number_format($radio) ?></th>
                        <th class="header" style="font-size: 15px; text-align: right !important"><?php echo number_format($ekg) ?></th>
                        <th class="header" style="font-size: 15px; text-align: right !important"><?php echo number_format($haji) ?></th>
                        <th class="header" style="font-size: 15px; text-align: right !important"><?php echo number_format($rb) ?></th>
                        <th class="header" style="font-size: 15px; text-align: right !important"><?php echo number_format($anak) ?></th>
                        <th class="header" style="font-size: 15px; text-align: right !important"><?php echo number_format($dalam) ?></th>
                        <th class="header" style="font-size: 15px; text-align: right !important"><?php echo number_format($usg) ?></th>
                        <th class="header" style="font-size: 15px; text-align: right !important"><?php echo number_format($kb) ?></th>
                        <th class="header" style="font-size: 15px; text-align: right !important"><?php echo number_format($catin) ?></th>
                        <th class="header" style="font-size: 15px; text-align: right !important"><?php echo number_format($kir) ?></th>
                        <th class="header" style="font-size: 15px; text-align: right !important"><?php echo number_format($mantuox) ?></th>
                        <th class="header" style="font-size: 15px; text-align: right !important"><?php echo number_format($jum) ?></th>
                        <th class="header" style="font-size: 15px;" align="right">&nbsp;</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>