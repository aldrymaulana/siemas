<?php

class M_pembayaran extends Model {

    function  __construct() {
        parent::Model();
        $this->load->model('M_kunjungan');
        $this->load->model('M_antrian');
    }

    function data_pembayaran($tanggal) {
        $data = array();
        $q = $this->db->query("SELECT antrian.id_antrian,antrian.status,antrian.id_kunjungan AS idkunjungan,antrian.id_poli,kunjungan.no_kunjungan,kunjungan.id_pasien,kunjungan.tanggal_kunjungan,kunjungan.total_harga as total,kunjungan.status_pembayaran,poli.*,pasien.*,kk.*,extract(YEAR FROM from_days(datediff(curdate(), tanggal_lahir))) AS umur
                                FROM poli
                                JOIN antrian USING (id_poli)
                                JOIN kunjungan USING (id_kunjungan)
                                JOIN pasien USING (id_pasien)
                                JOIN kk USING (id_kk)
                                WHERE kunjungan.tanggal_kunjungan = '$tanggal'
                                AND antrian.status IN('SELESAI', 'TERISI')
                                ORDER BY status_pembayaran DESC, no_kunjungan ASC");
        if($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    function data_pembayaran_pasien($tanggal, $nama) {
        $data = array();
        $q = $this->db->query("SELECT antrian.id_antrian,antrian.status,antrian.id_kunjungan AS idkunjungan,antrian.id_poli,kunjungan.no_kunjungan,kunjungan.id_pasien,kunjungan.tanggal_kunjungan,kunjungan.total_harga as total,kunjungan.status_pembayaran,poli.*,pasien.*,kk.*,extract(YEAR FROM from_days(datediff(curdate(), tanggal_lahir))) AS umur
                                FROM poli
                                JOIN antrian USING (id_poli)
                                JOIN kunjungan USING (id_kunjungan)
                                JOIN pasien USING (id_pasien)
                                JOIN kk USING (id_kk)
                                WHERE kunjungan.tanggal_kunjungan = '$tanggal'
                                AND antrian.status IN('SELESAI', 'TERISI')
                                AND pasien.nama_pasien LIKE '%$nama%'
                                ORDER BY status_pembayaran DESC, no_kunjungan ASC");
        if($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        
        return $data;
    }

    function get_id_by_layanan($layanan) {
        $data = array();
        $q = $this->db->query("SELECT id_layanan FROM layanan
                            WHERE nama_layanan = '$layanan'");
        if($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;

    }

    function get_layanan() {
        $data = array();
        $q = $this->db->query("SELECT * FROM layanan
                            ORDER BY nama_layanan ASC");
        if($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    function get_layanan_poli($poli){
        $data = array();
        $q = $this->db->query("SELECT * FROM layanan
                                WHERE poli LIKE '%$poli%'
                            ORDER BY nama_layanan ASC");
        if($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    function get_rincian($id_kunjungan) {
        $data = array();
        $q = $this->db->query("SELECT kunjungan_has_layanan.*,kunjungan.id_kunjungan,kunjungan.total_harga,kunjungan.no_kunjungan,kunjungan.tanggal_kunjungan,layanan.nama_layanan
                           FROM kunjungan
                           JOIN kunjungan_has_layanan USING(id_kunjungan)
                           JOIN layanan USING (id_layanan)
                           WHERE id_kunjungan = $id_kunjungan");

        if($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();

        return $data;
    }

    function total_harga($id_kunjungan) {
        $data = array();
        $q = $this->db->query("SELECT SUM(harga_layanan) as total_harga FROM kunjungan_has_layanan WHERE id_kunjungan = $id_kunjungan");

        if($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    function tambah_layanan($data) {
        $insert = $this->db->insert('kunjungan_has_layanan',$data);
    }

    function insert_total($data,$id_kunjungan) {
        $this->db->where('id_kunjungan', $id_kunjungan);
        $this->db->update('kunjungan', $data);
    }

    /*nyari harga dari layanan X*/
    function get_harga_by_layanan($layanan){
        $q = $this->db->query("SELECT harga FROM layanan WHERE nama_layanan LIKE '%$layanan%'");
        $h = $q->result_array();
        return $h['harga_layanan'];
    }

    /*nyari jumlah layanan X*/
    function get_jumlah_by_layanan($layanan){
        $q = $this->db->query("SELECT count(*) as total FROM layanan JOIN kunjungan_has_layanan using (id_layanan)WHERE nama_layanan LIKE '%$layanan%'");
        $h = $q->result_array();
        return $h['total'];
    }

    /*nyari total harga untuk layanan X*/
    function get_total_by_layanan($tgl, $layanan){
        $q = $this->db->query("SELECT count(*)*harga as total
                               FROM layanan
                               JOIN kunjungan_has_layanan using (id_layanan)
                               JOIN kunjungan USING (id_kunjungan)
                               WHERE nama_layanan LIKE '%$layanan%'
                               AND tanggal_kunjungan = '$tgl'");
        $h = $q->result_array();
        //print_r($h);exit;
        return $h[0]['total'];
    }
    
    function total_harga_by_poli($tgl,$poli){
        $q = $this->db->query("SELECT SUM(harga_layanan) as total
                                FROM antrian
                                JOIN kunjungan_has_layanan USING (id_kunjungan)
                                JOIN kunjungan USING (id_kunjungan)
                                WHERE id_poli = $poli
                                AND tanggal_kunjungan = '$tgl'");
        $h = $q->result_array();
        return $h[0]['total'];
    }

    function total_karcis_umum($tgl){
        $jum = $this->M_kunjungan->total_karcis_umum($tgl);
        $total = $jum*3000;
        return $total;
    }

    function get_total_by_ket($tgl,$ket,$poli){
        $q = $this->db->query("SELECT SUM(harga_layanan) as total
                                FROM `layanan`
                                JOIN kunjungan_has_layanan USING (id_layanan)
                                JOIN kunjungan USING (id_kunjungan)
                                WHERE
                                tanggal_kunjungan = '$tgl'
                                AND
                                (keterangan LIKE '%$ket%'
                                OR layanan.poli LIKE '%$poli%')");
        $h = $q->result_array();
        return $h[0]['total'];
    }
    
}