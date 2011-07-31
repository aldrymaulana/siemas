<?php

class Absensi extends Controller {

    function Absensi() {
        parent::Controller();
        $this->load->model('Absensi_model', 'absensi');
        $this->load->model('Pegawai_model', 'pegawai');
    }

    function index() {
        $this->isi_absensi();
    }

    function pilih_tanggal_absensi($tahun = 0, $bulan = 0) {

        if ($bulan == 0 || $tahun == 0) {
            $data['bulan_ini'] = intval(date("n"));
            $data['tahun_ini'] = intval(date("Y"));
        } else {
            $data['bulan_ini'] = $bulan;
            $data['tahun_ini'] = $tahun;
        }

        $this->load->view('form/input_absensi_lama', $data);
    }

    function isi_absensi($tahun = 0, $bulan = 0, $tanggal = 0) {

        $data = array();

        if ($bulan == 0 || $tahun == 0) {
            $data['bulan'] = intval(date("n"));
            $data['tahun'] = intval(date("Y"));
            $data['tanggal'] = intval(date("d"));
        } else {
            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;
            $data['tanggal'] = $tanggal;
        }

        $data['pegawai_pkm'] = $this->pegawai->get_semua_pegawai_pkm();
        $data['pegawai_bp'] = $this->pegawai->get_semua_pegawai_bpp();

        $this->load->view('form/input_absensi', $data);
    }

    function jam_kerja() {

        if ($this->input->post('submit')) {

            $hari = array('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu');

            $this->db->truncate('jadwal_puskesmas');

            foreach ($hari as $h) {

                // pkm
                $this->absensi->set_jadwal(array(
                    'hari' => $h,
                    'jam_mulai' => $this->input->post($h . '_mulai'),
                    'jam_selesai' => $this->input->post($h . '_selesai'),
                    'bp_pemda' => 0,
                    'buka' => $this->input->post($h . '_buka')
                ));

                // bp
                $this->absensi->set_jadwal(array(
                    'hari' => $h,
                    'jam_mulai' => $this->input->post($h . '_mulai_bp'),
                    'jam_selesai' => $this->input->post($h . '_selesai_bp'),
                    'bp_pemda' => 1,
                    'buka' => $this->input->post($h . '_buka_bp')
                ));
            }
        }

        $data['jadwal_pkm'] = $this->absensi->get_jadwal_pkm();
        $data['jadwal_bp'] = $this->absensi->get_jadwal_bp();

        $this->load->view('form/input_jadwal_pkm', $data);
    }

    function input_libur($tahun = 0, $bulan = 0) {

        if($this->input->post('submit')) {
            $data = array(
                'tanggal' => $this->input->post('tanggal'),
                'keterangan' => $this->input->post('keterangan'),
                'bp_pemda' => $this->input->post('bp_pemda')
            );

            $this->absensi->insert_libur($data);

        }

        $data = array();

        if ($bulan == 0 || $tahun == 0) {
            $data['bulan_ini'] = intval(date("n"));
            $data['tahun_ini'] = intval(date("Y"));
        } else {
            $data['bulan_ini'] = $bulan;
            $data['tahun_ini'] = $tahun;
        }

        $data['libur_pkm'] = $this->absensi->get_libur_pkm($data['tahun_ini'], $data['bulan_ini']);
        $data['libur_bp'] = $this->absensi->get_libur_bp($data['tahun_ini'], $data['bulan_ini']);

        $data['tanggal_libur_pkm_all'] = $this->absensi->get_libur_pkm_all($data['tahun_ini'], $data['bulan_ini']);
        $data['tanggal_libur_bp_all'] = $this->absensi->get_libur_bp_all($data['tahun_ini'], $data['bulan_ini']);

        $this->load->view('form/input_libur', $data);
    }

    function hapus_libur($id, $tahun, $bulan) {

        $this->absensi->hapus_libur($id);
        redirect("absensi/input_libur/$tahun/$bulan");

    }

    function rekap_absensi($bulan = 0, $tahun = 0) {
        $this->load->view('laporan/rekap_absensi');
    }

    function rekap_jam_efek($bulan = 0, $tahun = 0) {
        $this->load->view('laporan/rekap_jam_efek');
    }

}