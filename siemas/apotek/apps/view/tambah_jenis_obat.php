<?php $this->view_header_obat();?>
            <!-- Sub navigation -->
            <div id="subnav">
                <div class="container_12">
                    <div class="grid_12">
                        <ul style="margin-left: 0px;">
                            <li id="current"><a href="<?php echo $this->base_url?>index.php/obat/tambah_jenis_obat">Tambah Jenis Obat</a></li>
                            <li><a href="<?php echo $this->base_url?>index.php/obat/pemakaian_narkotik">Pemakaian Narkotik</a></li>
                            <li><a href="<?php echo $this->base_url?>index.php/obat/Kadaluarsa">Kadaluarsa</a></li>
                            <li><a href="<?php echo $this->base_url?>index.php/obat/pemakaian_obat">Pemakaian Obat</a></li>
                            <li><a href="<?php echo $this->base_url?>index.php/obat">Daftar Obat</a></li>

                        </ul>


                    </div><!-- End. .grid_12-->
                </div><!-- End. .container_12 -->
                <div style="clear: both;"></div>
            </div> <!-- End #subnav -->
        </div> <!-- End #header -->

		<div class="container_12">
                    <form method="post" onsubmit="if(document.getElementById('nbk').value == '') return false;">

                        <table>
					<tr>
						<td width="200px">
							<p align="right">nama bentuk dan kadar obat :</p>
						</td>
                                                <td> &nbsp; &nbsp;</td>
						<td width="120px">
                                                    <input type="text" maxlength="255"  name="nbk_obat" id="nbk">
						</td>
					</tr>

                                        <tr>
                                            <td>
                                                    <p align="right">satuan obat :</p>
                                            </td>
                                            <td></td>
                                            <td>
                                                    <input type="text" maxlength="255"  name="satuan_obat" />
                                            </td>
					</tr>

                                        <tr>
                                            <td>
                                                    <p align="right">termasuk jenis narkotik :</p>
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="radio"  name="narkotik" value="1">YA
                                                 &nbsp;
                                                <input type="radio"  name="narkotik" value="0" checked="checked">Tidak
                                            </td>
						
					</tr>
                                            <td></td><td></td><td><input type="submit" class="submit-green" value="Tambah"></td>
                                        <tr>

					</tr>
				</table>
                    </form>
                    <div style="clear: both;"></div>
                    </div> <!-- End .grid_12 -->


        <!-- Footer -->
        <div id="footer">
        	<div class="container_12">
            	<div class="grid_12">
                	<!-- You can change the copyright line for your own -->
                	<p>&copy; 2011. Siemas.</p>
        		</div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->
	</body>
</html>
<!-- This document saved from http://www.xooom.pl/work/magicadmin/admin.html? -->
