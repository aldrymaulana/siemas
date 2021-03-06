<link type="text/css" rel="Stylesheet" href="css/validity/jquery.validity.css" />

<script type="text/javascript" src="js/jquery.validity.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            //              $("#form_kk").validity("input:text, select");
            
            $.validity.setup({outputMode:'modal'});

            $("#pasien_baru").validity(function() {
                $("#nama").require();
                $("#tanggal_lahir").require()
                                   .match("number")                    // In the format of a number:
                                   .range(1, 31, 'Tanggal lahir tidak valid');
                $("#tahun_lahir").require()
                                   .match("number")                    // In the format of a number:
                                   .range(1500, 2500, 'Tahun tidak valid');
                $("#kelurahan").require();
                $("#kecamatan").require();
                $("#kota").require();
                $("#jk_pasien").require();
                $("#nomor:visible").require();
            });
        });
    });
</script>
<div id="daftar_pasien">
                <div class="module-body">
                    <h4>Masukkan Identitas Pasien</h4><br/>
                    <form id="pasien_baru" action="index.php/pasien/registrasi_pasien_baru/<?php echo $kk[0]['id_kk']."/".$status?>" method="post" id="pasien_baru">
                    <table class="noborder">
                        <tr>
                            <td></td>
                            <td><strong><input name="id_kk" type="hidden" value="<?php echo $kk[0]['id_kk']?>"></strong></td>
                        </tr>
                        <tr>
                            <td>Tgl. Pendaftaran</td>
                            <td style="width: 65%"><input name="tanggal_pendaftaran" id="datepicker" type="text" class="input-medium" value="<?php echo date("d-m-Y"); ?>"/></td>
                        </tr>
                        <tr class="odd">
                            <td>Nama Pasien</td>
                            <td><input id="nama" name="nama_pasien" class="input-medium" type="text"  size="25" maxlength="255"/></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                    <select name="jk_pasien" id="jk_pasien">
                                        <option value=""></option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                            </td>
                        </tr>

                        <tr  class="odd">
                            <td>Tanggal Lahir</td>
                            <td><input id="tanggal_lahir" class="input-short" style="width: 6%" type="text" name="tanggal_lahir" size="1" maxlength="2"/>
                                <?php $bulan = array('','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sept','Okt','Nov','Des'); ?>
                                <select name="bulan_pasien" style="width: 25%">
                                    <?php for($i=1;$i<=12;$i++) {?>
                                    <option value="<?php echo $i; ?>"><?php echo $bulan[$i]; ?></option>
                                        <?php } ?>
                                </select>
                                <input name="tahun_pasien" id="tahun_lahir" class="input-short"  style="width: 11%" type="text" size="3" maxlength="4"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Status dlm Keluarga</td>
                            <td>
                                <select name="status_keluarga">
                                    <option value="Kepala Keluarga">Kepala Keluarga</option>
                                    <option value="Ibu">Ibu</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Keponakan">Keponakan</option>
                                    <option value="Kakek">Kakek</option>
                                    <option value="Nenek">Nenek</option>
                                    <option value="Tinggal Sementara">Tinggal Sementara</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="odd">
                            <td>Status Pelayanan</td>
                            <td>
                                <select name="status_pelayanan" onchange="if($(this).val() == 'askes' || $(this).val() == 'jamkesmas') $('#nomer_kartu').show(); else $('#nomer_kartu').hide()">
                                    <option value="umum">Umum</option>
                                    <option value="askes">Askes</option>
                                    <option value="jamkesmas">Jamkesmas</option>
                                    <option value="lain-lain">GR</option>
                                </select>
                            </td>
                        </tr>
                        <tr id="nomer_kartu" style="display: none">
                            <td>No. Kartu</td>
                            <td><input id="nomor" name="no_kartu" class="input-medium" type="text"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><br/><strong>Pilih salah satu Poli:</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2"><?php $this->load->view('pilih_poli');?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="hidden" value="" id="poli" name="poli"/></td>
                        </tr>
                    </table>
                    </form>
                </div>
                </div>