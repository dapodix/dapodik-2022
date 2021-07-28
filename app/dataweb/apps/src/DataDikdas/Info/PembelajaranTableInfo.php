<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class PembelajaranTableInfo extends base\BasePembelajaranTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        // Override below here!
        parent::setVariables();
        $this->moveColumnBelow($this->getColumnByName('nama_mata_pelajaran'), $this->getColumnByName('mata_pelajaran_id'));

        $this->setTableValidation('vld_pembelajaran');
        $this->getColumnByName('semester_id')->setHideColumn(1);
        $this->getColumnByName('rombongan_belajar_id')->setHideColumn(1);
        $this->getColumnByName('status_di_kurikulum')->setHideColumn(1);
        $this->getColumnByName('induk_pembelajaran_id')->setHideColumn(1);
        $this->getColumnByName('induk_pembelajaran_id')->setXtype('hidden');

        $this->getColumnByName('ptk_terdaftar_id')->setColumnWidth(200);
        $this->getColumnByName('jam_mengajar_per_minggu')->setColumnWidth('100');
        $this->getColumnByName('jam_mengajar_per_minggu')->setHeader('Jam');
        $this->getColumnByName('tanggal_sk_mengajar')->setHeader('Tgl SK');
        $this->getColumnByName('sk_mengajar')->setHeader('SK Mengajar');
        $this->getColumnByName('ptk_terdaftar_id')->setHeader('PTK');
        $this->getColumnByName('nama_mata_pelajaran')->setHeader('Nama Matpel Lokal');

        $this->setInfoBeforeDelete('Mohon berhati-hati apabila ingin menghapus pembelajaran, karena akan menyebabkan rombel tsb terkunci pada Kuncian Rombel GTK. Yang akan menyebabkan seluruh guru pada rombel tsb tidak akan diproses jam mengajarnya. Apakah anda yakin ingin menghapus rombel tsb?');

        $this->getColumnByName('mata_pelajaran_id')->setDescription('Diisi nama mata pelajaran yang diajarkan di rombel terpilih.');
        $this->getColumnByName('ptk_terdaftar_id')->setDescription('Pilih nama PTK yang mengajar.');
        $this->getColumnByName('sk_mengajar')->setDescription('Diisi nomor SK pembagian tugas mengajar.');
        $this->getColumnByName('tanggal_sk_mengajar')->setDescription('Diisi tanggal ditetapkannya SK pembagian tugas mengajar.');
        $this->getColumnByName('jam_mengajar_per_minggu')->setDescription('Diisi jam mengajar. Boleh di bawah ketentuan, namun tidak boleh di atas ketentuan. Lihat kolom Max.');
        $this->getColumnByName('nama_mata_pelajaran')->setDescription('Menampilkan nama mata pelajaran sesuai penamaan di daerah setempat');


    }

}