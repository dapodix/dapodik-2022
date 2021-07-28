<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class DiklatTableInfo extends base\BaseDiklatTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->getColumnByName('ptk_id')->setHideColumn(1);
        $this->moveColumnBelow($this->getColumnByName('sertifikat_diklat'), $this->getColumnByName('nama'));

        $this->getColumnByName('tahun')->setColumnWidth('80');
        $this->getColumnByName('tahun')->setInputLength(4);
        $this->getColumnByName('tahun')->setMinLength(4);
        $this->getColumnByName('tingkat')->setInputLength(3);
        $this->getColumnByName('tingkat')->setColumnWidth('150');
        $this->getColumnByName('tingkat')->setEnumValues(array("1" => "Pusat", "2" => "LPMP", "3" => "P4TK", "3" => "P4TK", "4" => "Dinas Provinsi", "5" => "Dinas Kab/Kota", "6" => "Lembaga Swasta"));
        $this->getColumnByName('berapa_jam')->setColumnWidth('100');
        $this->getColumnByName('berapa_jam')->setInputLength(4);
        $this->getColumnByName('sertifikat_diklat')->setHeader('No Sertifikat Diklat');
        $this->getColumnByName('sertifikat_diklat')->setColumnWidth('200');

        $this->getColumnByName('jenis_diklat_id')->setDescription('Pilih jenis diklat yang pernah diikuti oleh PTK.');
        $this->getColumnByName('nama')->setDescription('Diisi nama acara diklat yang pernah diikuti oleh PTK.');
        $this->getColumnByName('sertifikat_diklat')->setDescription('Diisi dengan Nomor Sertifikat Diklat yang telah didapat oleh PTK.');
        $this->getColumnByName('penyelenggara')->setDescription('Diisi nama penyelenggara diklat yang pernah diikuti oleh PTK.');
        $this->getColumnByName('tahun')->setDescription('Diisi tahun diselenggarakannya diklat yang pernah diikuti oleh PTK.');
        $this->getColumnByName('peran')->setDescription('Diisi peran PTK dalam diklat yang pernah diikutinya, misalnya sebagai Pemateri, Peserta, atau Panitia.');
        $this->getColumnByName('tingkat')->setDescription('Menampilkan/pilih tingkat penyelenggaraan diklat yang pernah diikuti oleh PTK.');
        $this->getColumnByName('berapa_jam')->setDescription('Diisi lamanya penyelenggaraan diklat dalam jam.');

    }

}