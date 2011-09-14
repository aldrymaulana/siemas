<h3>Jumlah pasien hari ini: <?php  echo count($terisi); ?> orang</h3>
<table id="myTable" class="tablesorter" border="8" style=" margin-top: 5px;width:100%">
                <thead>
                    <tr>
                        <th style="width:75px">No. Kunj.</th>
                        <th>Nama Pasien</th>
                    </tr>
                </thead>

                <tbody>
                   <?php for ($i=0; $i<=count($terisi)-1; $i++) {?>
        <tr <?php if($i%2!=0) echo 'class="odd"' ?>>
            <td class="align-center"><?php echo $terisi[$i]['no_kunjungan']?></td>
            <td><?php echo $terisi[$i]['nama_pasien']; ?>
                <br/>
                <small style="font-size: 10px; color: #777777; font-weight: normal"><?php echo $terisi[$i]['jk_pasien'] . ', ' . $terisi[$i]['umur'] . ' th'; ?></small>
            </td>
           
            <?php }?>
                </tbody>
            </table>