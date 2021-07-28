<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class TugasTambahanTableInfo extends base\BaseTugasTambahanTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_tugas_tambahan');

        // Override below here!
        $this->getColumnByName('ptk_id')->setHideColumn(1);
        $this->getColumnByName('sekolah_id')->setHideColumn(1);
        $this->getColumnByName('jabatan_ptk_id')->setHeader('Jabatan PTK');
        $this->getColumnByName('jabatan_ptk_id')->setColumnWidth(400);
        $this->getColumnByName('jumlah_jam')->setHeader('Jam/Minggu');
        $this->getColumnByName('jumlah_jam')->setColumnWidth(120);
        $this->getColumnByName('jumlah_jam')->setHideColumn(1);
        $this->getColumnByName('nomor_sk')->setHeader('Nomor SK');
        $this->getColumnByName('tmt_tambahan')->setHeader('TMT Tambahan');
        $this->getColumnByName('tmt_tambahan')->setColumnWidth(150);
        $this->getColumnByName('tst_tambahan')->setHeader('TST Tambahan');
        $this->getColumnByName('tst_tambahan')->setColumnWidth(150);
        $this->getColumnByName('tst_tambahan')->setHideColumn(1);

        $this->setInfoBeforeDelete('Mohon berhati-hati apabila ingin menghapus tugas tambahan, karena akan menyebabkan rombel tsb terkunci pada Kuncian Rombel GTK. Yang akan menyebabkan seluruh guru pada rombel tsb tidak akan diproses jam mengajarnya. Apakah anda yakin ingin menghapus rombel tsb?');

        $this->getColumnByName('jabatan_ptk_id')->setDescription('Pilih jenis Tugas Tambahan yang sedang diemban oleh PTK. Hanya dapat diisi untuk PTK dengan status tugas Sekolah Induk.');
        $this->getColumnByName('jumlah_jam')->setDescription('Diisi jumlah jam tugas tambahan per minggu. Untuk kepala sekolah diisi dengan 18, Wakil Kepala sekolah/Kepala Laboratorium/Kepala Perpustakaan diisi dengan 12.');
        $this->getColumnByName('nomor_sk')->setDescription('Diisi nomor SK penetapan tugas tambahan yang pernah diemban oleh PTK, minimal 10 digit.');
        $this->getColumnByName('tmt_tambahan')->setDescription('Terhitung Mulai Tanggal (TMT), diisi tanggal mulai tugas tambahan sesuai SK penetapan.');
        $this->getColumnByName('tst_tambahan')->setDescription('Terhitung Selesai Tanggal (TST), hanya diisi jika status tugas tambahan sudah selesai, bila tugas tambahan statusnya masih aktif maka TST ini harus dikosongkan.');

    }

}