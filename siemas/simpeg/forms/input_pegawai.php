<?php include 'header.php'; ?>

<?php include 'list_pegawai.php'; ?>

<script type="text/javascript" src="template/jquery.js"></script>

<div class="belowribbon">
    <h1>
        Input data pegawai baru
        <input type="submit" class="submit-green" value="Simpan" style="margin-left: 10px"/>
    </h1>
</div>

<div id="page">
    <div class="grid_6" style="width: 48%">
        <div class="module">
            <h2><span>Data diri</span></h2>
            <div class="module-body">
                <table width="100%" class="noborder">
                    <tbody>
                        <tr>
                            <td width="40%"><label>Nama</label></td>
                            <td><input type="text" name="nama" maxlength="255" class="input-long"/></td>
                        </tr>
                        <tr>
                            <td><label>Tempat lahir</label></td>
                            <td><input type="text" name="tempat_lahir" maxlength="255" class="input-long"/></td>
                        </tr>
                        <tr>
                            <td><label>Tanggal lahir</label></td>
                            <td><input type="text" name="tanggal_lahir" maxlength="255" class="datepicker input-long"/></td>
                        </tr>
                        <tr>
                            <td><label>Alamat</label></td>
                            <td><textarea name="alamat" rows="3" cols="25"></textarea></td>
                        </tr>
                        <tr>
                            <td><label>Jenis kelamin</label></td>
                            <td>
                                <select name="jk" class="input-medium">
                                    <option value="">-</option>
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Agama</label></td>
                            <td><input type="text" name="agama" maxlength="255" class="input-long"/></td>
                        </tr>
                        <tr>
                            <td><label>Gol. darah</label></td>
                            <td>
                                <select name="gol_darah" class="input-medium">
                                    <option value="">-</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Status</label></td>
                            <td>
                                <select name="status" class="input-medium">
                                    <option value="">-</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Belum menikah">Belum menikah</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Telepon</label></td>
                            <td><input type="text" name="telepon" maxlength="255" class="input-long"/></td>
                        </tr>
                        <tr>
                            <td><label>Pas foto</label></td>
                            <td><input type="file" name="pas_foto" class="input-long"/></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="grid_6" style="width: 48%">
        <div class="module">
            <h2><span>Riwayat pendidikan</span></h2>
            <div class="module-body">
                <table id="tabel_pendidikan" class="noborder">
                    <thead>
                        <tr>
                            <td>Pendidikan</td>
                            <td width="20%">Tahun ijazah</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="pendidikan[]" maxlength="255" class="input-full"/></td>
                            <td><input type="text" name="tahun_pendidikan[]" maxlength="4" class="input-full"/></td>
                        </tr>
                    </tbody>
                </table>
                <a href="#" class="button" onclick="tambahPendidikan(); return false;" >
                    <span><img src="template/plus-sma.gif" width="12" height="9" alt="" /> Tambah data pendidikan</span>
                </a>

            </div>
        </div>
        <div class="module">
            <h2><span>Riwayat pelatihan</span></h2>
            <div class="module-body">

                <table id="tabel_pelatihan" class="noborder">
                    <thead>
                        <tr>
                            <td>Pelatihan</td>
                            <td width="20%">Tahun</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="pelatihan[]" maxlength="255" class="input-full"/></td>
                            <td><input type="text" name="tahun_pelatihan[]" maxlength="4" class="input-full"/></td>
                        </tr>
                    </tbody>
                </table>
                <a href="#" class="button" onclick="tambahPelatihan(); return false;" >
                    <span><img src="template/plus-sma.gif" width="12" height="9" alt="" /> Tambah data pelatihan</span>
                </a>
            </div>
        </div>
    </div>

    <div style="margin: 0px 1%">
        <div class="module">
            <h2><span>Tanggungan</span></h2>
            <div class="module-table-body">
                <table border="0" id="tabel_tanggungan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal lahir</th>
                            <th>Tanggal nikah</th>
                            <th>Pekerjaan</th>
                            <th>Dapat tunjangan?</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><input type="text" name="tanggungan_nama[]" maxlength="255" class="input-long"/></td>
                            <td><input type="text" name="tanggungan_tanggal_lahir[]" maxlength="255" class="datepicker input-long"/></td>
                            <td><input type="text" name="tanggungan_tanggal_nikah[]" maxlength="255" class="datepicker input-long"/></td>
                            <td><input type="text" name="tanggungan_pekerjaan[]" maxlength="255" class="input-long"/></td>
                            <td style="text-align: center">
                                <input type="checkbox" name="tanggungan_dapat_tunjangan[]" checked="checked"/>
                            </td>
                            <td><input type="text" name="tanggungan_keterangan[]" maxlength="255" class="input-long"/></td>
                        </tr>
                    </tbody>
                </table>
                <a href="#" class="button" onclick="tambahTanggungan(); return false;" style="margin: 5px 0px 20px 20px">
                    <span><img src="template/plus-sma.gif" width="12" height="9" alt="" /> Tambah data tanggungan</span>
                </a>
            </div>
        </div>
    </div>


    <div class="grid_6" style="width: 48%">
        <div class="module">
            <h2><span>Data kepegawaian</span></h2>
            <div class="module-body">
                <table width="100%" class="noborder">
                    <tbody>
                        <tr>
                            <td width="40%"><label>NIP</label></td>
                            <td><input type="text" name="nip" maxlength="255" class="input-long"/></td>
                        </tr>
                        <tr>
                            <td><label>Tanggal masuk</label></td>
                            <td><input type="text" name="tanggal_masuk" maxlength="255" class="datepicker input-long"/></td>
                        </tr>
                        <tr>
                            <td><label>Status kepegawaian</label></td>
                            <td><input type="text" name="status_kepegawaian" maxlength="255" value="PNS" class="input-long"/></td>
                        </tr>
                        <tr>
                            <td><label>BP Pemda</label></td>
                            <td>
                                <select name="status" class="input-short">
                                    <option value="1">Ya</option>
                                    <option value="0" selected="selected">Tidak</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Sumber gaji</label></td>
                            <td><input type="text" name="sumber_gaji" maxlength="255" value="DIPA daerah" class="input-long"/></td>
                        </tr>
                        <tr>
                            <td><label>Kenaikan gaji YAD</label></td>
                            <td><input type="text" name="kenaikan_yad" maxlength="255" class="datepicker input-long"/></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="grid_6" style="width: 48%">
        <div class="module">
            <h2><span>Data kepangkatan</span></h2>
            <div class="module-body">
                <table width="100%" class="noborder">
                    <tbody>
                        <tr>
                            <td><label>Gol/ruang</label></td>
                            <td>
                                <select name="gol_ruang" id="gol_ruang" onchange="setJabatan(this.options[this.selectedIndex].value)" class="input-medium">
                                </select>
                            </td>
                            <td align="right"><label>TMT</label></td>
                            <td><input type="text" name="tmt_golruang" maxlength="255" class="datepicker input-long"/></td>
                        </tr>
                        <tr>
                            <td><label>Pangkat</label></td>
                            <td><input type="text" name="pangkat" id="pangkat" maxlength="255" class="input-full"/></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><label>Jabatan</label></td>
                            <td><input type="text" name="jabatan" id="jabatan" maxlength="255" class="input-full"/></td>
                            <td align="right"><label>TMT</label></td>
                            <td><input type="text" name="tmt_jabatan" maxlength="255" class="datepicker input-long"/></td>
                        </tr>
                        <tr>
                            <td><label>Atasan langsung</label></td>
                            <td>
                                <!-- Harus di-PHP-in  -->
                                <select name="id_atasan" class="input-full">
                                    <option value="">-</option>
                                    <?php
                                    for ($j = 1; $j < count($pegawai); $j++) {

                                        echo "<option>{$pegawai[$j]}</option>";
                                    } ?>
                                </select>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">

    var pangkat = new Array();

    pangkat['-'] = "";
    pangkat['I / a'] = "Juru Muda";
    pangkat['I / b'] = "Juru Muda Tingkat 1";
    pangkat['I / c'] = "Juru";
    pangkat['I / d'] = "Juru Tingkat 1";
    pangkat['II / a'] = "Pengatur Muda";
    pangkat['II / b'] = "Pengatur Muda Tingkat 1";
    pangkat['II / c'] = "Pengatur";
    pangkat['II / d'] = "Pengatur Tingkat 1";
    pangkat['III / a'] = "Penata Muda";
    pangkat['III / b'] = "Penata Muda Tingkat 1";
    pangkat['III / c'] = "Penata";
    pangkat['III / d'] = "Penata Tingkat 1";
    pangkat['IV / a'] = "Pembina";
    pangkat['IV / b'] = "Pembina Tingkat 1";
    pangkat['IV / c'] = "Pembina Utama Muda";
    pangkat['IV / d'] = "Pembina Utama Madya";
    pangkat['IV / e'] = "Pembina Utama";

    for(var j in pangkat) {

        document.getElementById("gol_ruang").innerHTML += "<option value='"+j+"'>"+j+"</option>";

    }

    function setJabatan(gol_ruang) {

        $("#pangkat").val(pangkat[gol_ruang]);

    }

    function tambahPendidikan() {
        $('#tabel_pendidikan tbody>tr:last').clone(true).insertAfter('#tabel_pendidikan tbody>tr:last');
        $('#tabel_pendidikan tbody>tr:last input').val('');
        $('#tabel_pendidikan tbody>tr:last input').first().focus();
    }

    function tambahPelatihan() {
        $('#tabel_pelatihan tbody>tr:last').clone(true).insertAfter('#tabel_pelatihan tbody>tr:last');
        $('#tabel_pelatihan tbody>tr:last input').val('');
        $('#tabel_pelatihan tbody>tr:last input').first().focus();
    }

    function tambahTanggungan() {
        var i = parseInt($('#tabel_tanggungan tbody>tr:last td').first().text());
        i++

        $('#tabel_tanggungan tbody>tr:last').clone(true).insertAfter('#tabel_tanggungan tbody>tr:last');
        $('#tabel_tanggungan tbody>tr:last input').val('');
        $('#tabel_tanggungan tbody>tr:last input').first().focus();
        $('#tabel_tanggungan tbody>tr:last td').first().text(i);

    }

</script>

<?php include 'footer.php'; ?>