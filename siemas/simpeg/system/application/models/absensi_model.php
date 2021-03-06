<?php

class Absensi_model extends Model {

    function __construct() {
        parent::Model();
        $this->load->model("Pegawai_model", "pegawai");
    }

    function get_jadwal_pkm() {
        $data = array();
        $q = $this->db->query("SELECT * FROM jadwal_puskesmas WHERE bp_pemda = 0 ORDER BY id_jadwal_puskesmas");

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    function get_jadwal_bp() {
        $data = array();
        $q = $this->db->query("SELECT * FROM jadwal_puskesmas WHERE bp_pemda = 1 ORDER BY id_jadwal_puskesmas");

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    function set_jadwal($data) {
        /* default:
          INSERT INTO `jadwal_puskesmas` (`id_jadwal_puskesmas`, `hari`, `jam_mulai`, `jam_selesai`, `bp_pemda`, `buka`) VALUES
          (1, 'senin', '07:30:00', '14:30:00', 0, 1),
          (2, 'senin', '08:00:00', '16:00:00', 1, 1),
          (3, 'selasa', '00:00:00', '00:00:00', 0, 1),
          (4, 'selasa', '00:00:00', '00:00:00', 1, 1),
          (5, 'rabu', '00:00:00', '00:00:00', 0, 1),
          (6, 'rabu', '00:00:00', '00:00:00', 1, 1),
          (7, 'kamis', '00:00:00', '00:00:00', 0, 1),
          (8, 'kamis', '00:00:00', '00:00:00', 1, 1),
          (9, 'jumat', '00:00:00', '00:00:00', 0, 1),
          (10, 'jumat', '00:00:00', '00:00:00', 1, 1),
          (11, 'sabtu', '00:00:00', '00:00:00', 0, 0),
          (12, 'sabtu', '00:00:00', '00:00:00', 1, 0),
          (13, 'minggu', '00:00:00', '00:00:00', 0, 0),
          (14, 'minggu', '00:00:00', '00:00:00', 1, 0);
         */
        $this->db->insert('jadwal_puskesmas', $data);
    }

    function get_hari_libur_rutin_pkm() {
        $data = array();
        $q = $this->db->query("SELECT hari FROM jadwal_puskesmas WHERE bp_pemda = 0 AND buka = 0 ORDER BY id_jadwal_puskesmas");

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();

        $data2 = array(); // translated
        foreach ($data as $d) {
            switch ($d['hari']) {
                case "minggu":
                    $data2[] = 'Sun';
                    break;
                case "senin":
                    $data2[] = 'Mon';
                    break;
                case "selasa":
                    $data2[] = 'Tue';
                    break;
                case "rabu":
                    $data2[] = 'Wed';
                    break;
                case "kamis":
                    $data2[] = 'Thu';
                    break;
                case "jumat":
                    $data2[] = 'Fri';
                    break;
                case "sabtu":
                    $data2[] = 'Sat';
                    break;
            }
        }
        return $data2;
    }

    function get_hari_libur_rutin_bp() {
        $data = array();
        $q = $this->db->query("SELECT hari FROM jadwal_puskesmas WHERE bp_pemda = 1 AND buka = 0 ORDER BY id_jadwal_puskesmas");

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();

        $data2 = array(); // translated
        foreach ($data as $d) {
            switch ($d['hari']) {
                case "minggu":
                    $data2[] = 'Sun';
                    break;
                case "senin":
                    $data2[] = 'Mon';
                    break;
                case "selasa":
                    $data2[] = 'Tue';
                    break;
                case "rabu":
                    $data2[] = 'Wed';
                    break;
                case "kamis":
                    $data2[] = 'Thu';
                    break;
                case "jumat":
                    $data2[] = 'Fri';
                    break;
                case "sabtu":
                    $data2[] = 'Sat';
                    break;
            }
        }

        return $data2;
    }

    function get_tanggal_libur_rutin_pkm($tahun, $bulan) {

        $tanggal_libur = array();

        $hari_libur = $this->get_hari_libur_rutin_pkm();
        for ($d = 1; $d <= cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun); $d++) {
            if (in_array(date("D", strtotime("{$tahun}-{$bulan}-{$d}")), $hari_libur)) {
                $tanggal_libur[] = $d;
            }
        }

        return $tanggal_libur;
    }

    function get_tanggal_libur_rutin_bp($tahun, $bulan) {

        $tanggal_libur = array();

        $hari_libur = $this->get_hari_libur_rutin_bp();
        for ($d = 1; $d <= cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun); $d++) {
            if (in_array(date("D", strtotime("{$tahun}-{$bulan}-{$d}")), $hari_libur)) {
                $tanggal_libur[] = $d;
            }
        }

        return $tanggal_libur;
    }

    function insert_libur($data) {
        $this->db->insert('tanggal_libur', $data);
    }

    function get_tanggal_libur_pkm($tahun, $bulan) {
        $data = array();
        $q = $this->db->query("SELECT day(tanggal) AS t FROM tanggal_libur WHERE year(tanggal) = $tahun AND month(tanggal) = $bulan AND bp_pemda = 0 ORDER BY tanggal");

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row['t'];
            }
        }

        $q->free_result();
        return $data;
    }

    function get_tanggal_libur_bp($tahun, $bulan) {
        $data = array();
        $q = $this->db->query("SELECT day(tanggal) AS t FROM tanggal_libur WHERE year(tanggal) = $tahun AND month(tanggal) = $bulan AND bp_pemda = 1 ORDER BY tanggal");

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row['t'];
            }
        }

        $q->free_result();
        return $data;
    }

    function get_libur_pkm($tahun, $bulan) {
        $data = array();
        $q = $this->db->query("SELECT * FROM tanggal_libur WHERE year(tanggal) = $tahun AND month(tanggal) = $bulan AND bp_pemda = 0 ORDER BY tanggal");

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    function get_libur_bp($tahun, $bulan) {
        $data = array();
        $q = $this->db->query("SELECT * FROM tanggal_libur WHERE year(tanggal) = $tahun AND month(tanggal) = $bulan AND bp_pemda = 1 ORDER BY tanggal");

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    function get_libur_pkm_all($tahun, $bulan) {
        return array_merge($this->get_tanggal_libur_pkm($tahun, $bulan), $this->get_tanggal_libur_rutin_pkm($tahun, $bulan));
    }

    function get_libur_bp_all($tahun, $bulan) {
        return array_merge($this->get_tanggal_libur_bp($tahun, $bulan), $this->get_tanggal_libur_rutin_bp($tahun, $bulan));
    }

    function hapus_libur($id) {
        $this->db->query("DELETE FROM tanggal_libur WHERE id_tanggal_libur = $id");
    }

    function is_libur_pkm($tahun, $bulan, $tanggal) {
        return in_array($tanggal, $this->get_libur_pkm_all($tahun, $bulan));
    }

    function is_libur_bp($tahun, $bulan, $tanggal) {
        return in_array($tanggal, $this->get_libur_bp_all($tahun, $bulan));
    }

    function get_absensi($tahun, $bulan, $tanggal, $bp = 0) {
        $data = array();
        $tanggal = date("Y-m-d", strtotime("$tahun-$bulan-$tanggal"));

        $q = $this->db->query("SELECT pegawai.id_pegawai,
                                      pegawai.nama,
                                      pegawai.nip,
                                      absensi.id_absensi,
                                      absensi.hadir,
                                      absensi.jam_hadir
                               FROM pegawai LEFT JOIN absensi
                               ON   pegawai.id_pegawai = absensi.id_pegawai AND absensi.tanggal = '$tanggal'
                               WHERE pegawai.bp_pemda = $bp AND pegawai.aktif = 1 ORDER BY pegawai.rank_struktural, pegawai.id_pegawai");

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    function insert_absensi($data) {

        $this->db->query("REPLACE INTO absensi (id_absensi, tanggal, hadir, jam_hadir, id_pegawai)
                          VALUES ('{$data['id_absensi']}',
                                  '{$data['tanggal']}',
                                  '{$data['hadir']}',
                                  '{$data['jam_hadir']}',
                                  '{$data['id_pegawai']}')");

    }

    function sudah_diinput_absensi($tahun, $bulan, $tanggal) {

        $tanggal = date("Y-m-d", strtotime("$tahun-$bulan-$tanggal"));
        $jumlah_absensi = $this->db->where('tanggal', $tanggal)->from('absensi')->count_all_results();

        return $jumlah_absensi > 0;

    }

    function get_pegawai_tidak_hadir($tahun, $bulan, $tanggal) {
        $data = array();
        $tanggal = date("Y-m-d", strtotime("$tahun-$bulan-$tanggal"));

        $q = $this->db->query("SELECT pegawai.id_pegawai, pegawai.nama
                               FROM absensi JOIN pegawai USING (id_pegawai)
                               WHERE absensi.hadir = 0
                               AND   absensi.tanggal = '$tanggal'");

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    function get_tahun_absensi() {
        $data = array();
        $q = $this->db->query("SELECT DISTINCT year(tanggal) AS tahun FROM absensi ORDER BY year(tanggal)");

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    function get_absensi_bulanan_by_pegawai($id_pegawai, $bulan, $tahun) {

        $data = array();
        $q = $this->db->query("SELECT day(tanggal) AS tanggal, hadir
                               FROM absensi
                               WHERE month(tanggal) = $bulan
                               AND year(tanggal) = $tahun
                               AND id_pegawai = $id_pegawai
                               ORDER BY tanggal");
        
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();

        // isi yang kosong

        $min = 1;
        $max = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

        $column1 = array();
        foreach ($data as $row) $column1[] = $row['tanggal'];

        $column2 = array();
        for ($i = $min; $i <= $max; $i++) $column2[] = $i;

        $emptys = array_merge(array_diff($column1, $column2), array_diff($column2, $column1));
        $empty_arr = array();

        foreach ($emptys as $e) {
                $empty_arr[] = array('tanggal' => $e, 'hadir' => 0);
        }

        $res = array_merge($data, $empty_arr);
        sort($res);

        return $res;

    }

    function get_data_absensi_pkm($tahun, $bulan) {

        $jumlah_hari_satu_bulan = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

        $data_pegawai_pkm = $this->pegawai->get_semua_pegawai_pkm();
        $absensi_pkm = array();
        
        foreach ($data_pegawai_pkm as $p) {
            $jumlah = 0;
            $row = array('id_pegawai' => $p['id_pegawai'], 'nama' => $p['nama']);

            $absensi = $this->get_absensi_bulanan_by_pegawai($p['id_pegawai'], $bulan, $tahun);
            for ($i = 1; $i <= $jumlah_hari_satu_bulan; $i++) {
                $row['hadir_' . $i] = $absensi[$i-1]['hadir'];
                $jumlah += $row['hadir_' . $i];
            }
            $row['jumlah'] = $jumlah;

            $absensi_pkm[] = $row;

            unset($row);
        }

        return $absensi_pkm;

    }

    function get_data_absensi_bp($tahun, $bulan) {

        $jumlah_hari_satu_bulan = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

        $data_pegawai_bp = $this->pegawai->get_semua_pegawai_bpp();
        $absensi_bp = array();
        
        foreach ($data_pegawai_bp as $p) {

            $jumlah = 0;
            $row = array('id_pegawai' => $p['id_pegawai'], 'nama' => $p['nama']);

            $absensi = $this->get_absensi_bulanan_by_pegawai($p['id_pegawai'], $bulan, $tahun);
            for ($i = 1; $i <= $jumlah_hari_satu_bulan; $i++) {
                $row['hadir_' . $i] = $absensi[$i-1]['hadir'];
                $jumlah += $row['hadir_' . $i];
            }
            $row['jumlah'] = $jumlah;
            
            $absensi_bp[] = $row;

        }

        return $absensi_bp;

    }

    function get_jam_efek_all() {

        $data = array();
        $q = $this->db->query("SELECT hour(timediff(jam_selesai, jam_mulai)) + (minute(timediff(jam_selesai, jam_mulai)) / 60) AS jam_efek FROM `jadwal_puskesmas`");

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row['jam_efek'];
            }
        }

        $q->free_result();
        return $data;

    }

    function get_jam_efek($hari, $bp) {

        $jam_efek_all = $this->get_jam_efek_all();
        $shift = $bp;

        switch ($hari) {
            case "Sun":
                $offset = 12;
                break;
            case "Mon":
                $offset = 0;
                break;
            case "Tue":
                $offset = 2;
                break;
            case "Wed":
                $offset = 4;
                break;
            case "Thu":
                $offset = 6;
                break;
            case "Fri":
                $offset = 8;
                break;
            case "Sat":
                $offset = 10;
                break;
        }

        return $jam_efek_all[$offset + $shift];
        
    }

    function get_data_jam_efek_pkm($tahun, $bulan) {

        $jumlah_hari_satu_bulan = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

        $data_pegawai_pkm = $this->pegawai->get_semua_pegawai_pkm();
        $jam_efek_pkm = array();
        foreach ($data_pegawai_pkm as $p) {

            $row = array('id_pegawai' => $p['id_pegawai'], 'nama' => $p['nama']);

            $absensi = $this->get_absensi_bulanan_by_pegawai($p['id_pegawai'], $bulan, $tahun);
            $jumlah  = 0;
            for ($i = 1; $i <= $jumlah_hari_satu_bulan; $i++) {
                if ($absensi[$i-1]['hadir'] == '1') {
                    $row['jam_efek_' . $i] = $this->get_jam_efek(date("D", strtotime("{$tahun}-{$bulan}-{$i}")), 0);
                } else {
                    $row['jam_efek_' . $i] = 0;
                }
                $jumlah += $row['jam_efek_' . $i];
            }

            $row['jumlah'] = $jumlah;
            $jam_efek_pkm[] = $row;

            unset($row);

        }

        return $jam_efek_pkm;

    }

    function get_data_jam_efek_bp($tahun, $bulan) {

        $jumlah_hari_satu_bulan = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

        $data_pegawai_bp = $this->pegawai->get_semua_pegawai_bpp();
        $jam_efek_bp = array();
        foreach ($data_pegawai_bp as $p) {

            $row = array('id_pegawai' => $p['id_pegawai'], 'nama' => $p['nama']);

            $absensi = $this->get_absensi_bulanan_by_pegawai($p['id_pegawai'], $bulan, $tahun);
            $jumlah  = 0;
            for ($i = 1; $i <= $jumlah_hari_satu_bulan; $i++) {
                if ($absensi[$i-1]['hadir'] == '1') {
                    $row['jam_efek_' . $i] = $this->absensi->get_jam_efek(date("D", strtotime("{$tahun}-{$bulan}-{$i}")), 1);
                } else {
                    $row['jam_efek_' . $i] = 0;
                }
                $jumlah += $row['jam_efek_' . $i];
            }

            $row['jumlah'] = $jumlah;
            $jam_efek_bp[] = $row;
        }

        return $jam_efek_bp;

    }

    function get_kehadiran_ideal_pkm($tahun, $bulan) {
        return cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun) - count($this->get_libur_pkm_all($tahun, $bulan));
    }

    function get_kehadiran_ideal_bp($tahun, $bulan) {
        return cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun) - count($this->get_libur_bp_all($tahun, $bulan));
    }

    function get_jam_efek_ideal_pkm($tahun, $bulan) {

        $jumlah_hari_satu_bulan = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $tanggal_libur = $this->get_libur_pkm_all($tahun, $bulan);

        $jumlah = 0;

        for ($i = 1; $i <= $jumlah_hari_satu_bulan; $i++) {
            $jam_kerja = $this->get_jam_efek(date("D", strtotime("{$tahun}-{$bulan}-{$i}")), 0);
            if (!in_array($i, $tanggal_libur)) $jumlah += $jam_kerja;
        }

        return $jumlah;

    }

    function get_jam_efek_ideal_bp($tahun, $bulan) {

        $jumlah_hari_satu_bulan = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $tanggal_libur = $this->get_libur_bp_all($tahun, $bulan);

        $jumlah = 0;

        for ($i = 1; $i <= $jumlah_hari_satu_bulan; $i++) {
            $jam_kerja = $this->get_jam_efek(date("D", strtotime("{$tahun}-{$bulan}-{$i}")), 1);
            if (!in_array($i, $tanggal_libur)) $jumlah += $jam_kerja;
        }

        return $jumlah;

    }

}
