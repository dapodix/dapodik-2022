<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class RegistrasiPesertaDidikTableInfo extends base\BaseRegistrasiPesertaDidikTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->moveColumnBelow($this->getColumnByName('sekolah_asal'), $this->getColumnByName('tanggal_masuk_sekolah'));
        $this->moveColumnBelow($this->getColumnByName('a_pernah_tk'), $this->getColumnByName('sekolah_asal'));
        $this->moveColumnBelow($this->getColumnByName('a_pernah_paud'), $this->getColumnByName('a_pernah_tk'));
        $this->moveColumnBelow($this->getColumnByName('id_hobby'), $this->getColumnByName('a_pernah_paud'));
        $this->moveColumnBelow($this->getColumnByName('id_cita'), $this->getColumnByName('id_hobby'));

        $this->moveColumnBelow($this->getColumnByName('no_peserta_ujian'), $this->getColumnByName('id_cita'));
        $this->moveColumnBelow($this->getColumnByName('no_seri_ijazah'), $this->getColumnByName('no_peserta_ujian'));
        $this->moveColumnBelow($this->getColumnByName('no_skhun'), $this->getColumnByName('no_seri_ijazah'));


        $fieldSet = new \DataDikdas\FieldsetInfo();
        $this->addRange('jurusan_sp_id', 'id_cita', $fieldSet, 'Pendaftaran Masuk');

        $fieldSet3 = new \DataDikdas\FieldsetInfo();
        $this->addRange('no_peserta_ujian', 'no_skhun', $fieldSet3, 'Pendaftaran Ujian Nasional Sekolah Menengah');

        $fieldSet2 = new \DataDikdas\FieldsetInfo();
        $this->addRange('jenis_keluar_id', 'tgl_keluar', $fieldSet2, 'Di Isi Saat Sudah Keluar');

        $colJk1 = $this->getColumnByName('jenis_keluar');
        $this->getColumnByName('no_skhun')->setLabel('No Seri SKHUN');

        $this->getColumnByName('no_peserta_ujian')->setAllowEmpty(1);
        // $this->getColumnByName('no_skhun')->setMinLength(20);

        $colPernahPaud = $this->getColumnByName('a_pernah_paud');
        $colPernahPaud->setEnumValues(array(1 => "Ya" , 0 => "Tidak"));
        $this->getColumnByName('a_pernah_paud')->setLabel('Apakah pernah PAUD Non Formal (KB/TPA/SPS)');
        $this->getColumnByName('a_pernah_paud')->setAllowEmpty(0);

        $colPernahTk = $this->getColumnByName('a_pernah_tk');
        $colPernahTk->setEnumValues(array(1 => "Ya" , 0 => "Tidak"));
        $this->getColumnByName('a_pernah_tk')->setLabel('Apakah pernah PAUD Formal (TK)');
        $this->getColumnByName('a_pernah_tk')->setAllowEmpty(0);

        $this->getColumnByName('jenis_pendaftaran_id')->setForceSelection(1);
        $this->getColumnByName('jenis_keluar_id')->setLabel('Keluar karena');
        // $this->getColumnByName('jenis_keluar_id')->setAllowEmpty(0);
        $this->getColumnByName('tanggal_masuk_sekolah')->setHeader('Tgl Masuk Sekolah');
        $this->getColumnByName('no_seri_ijazah')->setLabel('No Seri Ijazah SMP/MTs');
        $this->getColumnByName('no_peserta_ujian')->setLabel('No Peserta UN SMP/MTs');
        $this->getColumnByName('jenis_keluar_id')->setColumnsRadio(1);
        $this->getColumnByName('tanggal_keluar')->setLabel('Tanggal keluar sekolah');
        $this->getColumnByName('nipd')->setLabel('Nomor Induk PD / NIS');
        $this->getColumnByName('nipd')->setAllowEmpty(1);
        $this->getColumnByName('tanggal_keluar')->setAllowEmpty(1);

        $this->getColumnByName('keterangan')->setLabel('Alasan');

        $this->getColumnByName('peserta_didik_id')->setXtype('hidden');
        $this->getColumnByName('sekolah_id')->setXtype('hidden');

        // $this->getColumnByName('id_hobby')->setXtype('hidden');
        $this->getColumnByName('id_hobby')->setLabel('Hobby');
        $this->getColumnByName('id_hobby')->setAllowEmpty(1);
        $this->getColumnByName('id_hobby')->setDisplayField('nm_hobby');

        // $this->getColumnByName('id_cita')->setXtype('hidden');
        $this->getColumnByName('id_cita')->setLabel('Cita-cita');
        $this->getColumnByName('id_cita')->setAllowEmpty(1);
        $this->getColumnByName('id_cita')->setDisplayField('nm_cita');

        //$this->getColumnByName('jurusan_sp_id')->setXtype('hidden');

        $this->getColumnByName('jenis_pendaftaran_id')->setDescription('Status peserta didik saat pertama kali diterima di sekolah ini.');
        $this->getColumnByName('tanggal_masuk_sekolah')->setDescription('Tanggal pertama kali peserta didik diterima di sekolah ini. Jika siswa baru, maka isikan tanggal awal tahun pelajaran saat peserta didik masuk. Jika siswa mutasi/pindahan, maka isikan tanggal sesuai surat diterimanya peserta didik di sekolah ini.');
        $this->getColumnByName('jenis_keluar_id')->setDescription('Sebab utama peserta didik keluar dari sekolah. Pilih lulus apabila peserta didik telah lulus dari seklolah, pilih "Mengundurkan diri" apabila peserta didik keluar sekolah karena mengundurkan diri dengan catatan (dibuktikan adanya surat pengunduran diri), pilih "Putus sekolah" apabila peserta didik meninggalkan sekolah tanpa keterangan yang jelas.');
        $this->getColumnByName('tanggal_keluar')->setDescription('Tanggal saat peserta didik diketahui/tercatat keluar dari sekolah.');
        $this->getColumnByName('keterangan')->setDescription('Alasan khusus yang melatarbelakangi peserta didik keluar dari sekolah.');
        $this->getColumnByName('no_skhun')->setDescription('Nomor SKHUN saat peserta didik masih di SMP/MTs/Paket B');
        $this->getColumnByName('no_peserta_ujian')->setDescription('Nomor Peserta Ujian Nasional saat peserta didik masih di SMP/MTs/Paket B. Formatnya adalah x-xx-xx-xx-xxx-xxx-x (20 digit). Untuk Peserta Didik WNA, diisi dengan keterangan "Luar Negeri" ');
        $this->getColumnByName('no_seri_ijazah')->setDescription('Nomor ijazah peserta didik di SMP/MTs/Paket B');

    }

}