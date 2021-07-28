<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class PesertaDidikBaruTableInfo extends base\BasePesertaDidikBaruTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        // Hidden Columns
        $this->getColumnByName('sekolah_id')->setHideColumn(1);
        $this->getColumnByName('tahun_ajaran_id')->setHideColumn(1);
        $this->getColumnByName('sudah_diproses')->setHideColumn(1);
        $this->getColumnByName('berhasil_diproses')->setHideColumn(1);
        $this->getColumnByName('peserta_didik_id')->setHideColumn(1);

        // Edit Headers
        $this->getColumnByName('nama_pd')->setHeader('Nama');
        $this->getColumnByName('nisn')->setHeader('NISN');
        $this->getColumnByName('nisn')->setHideColumn(1);
        $this->getColumnByName('nisn')->setMinLength(10);
        $this->getColumnByName('nik')->setHeader('NIK');
        $this->getColumnByName('tanggal_lahir')->setHeader('Tgl Lahir');

        $this->getColumnByName('nama_ibu_kandung')->setMin(1);

        $this->getColumnByName('nama_pd')->setValidationType('namaspecialchar');
        $this->getColumnByName('nama_ibu_kandung')->setValidationType('namaspecialchar');
        $this->getColumnByName('nisn')->setValidationType('numberonly');
        $this->getColumnByName('nik')->setValidationType('numberonly');

        // Edit Enum
        $colJk = $this->getColumnByName('jenis_kelamin');
        $colJk->setHeader('JK');
        $colJk->setEnumValues(array("L" => "Laki-Laki" , "P" => "Perempuan"));
        $colJk->setColumnWidth(100);
    }

}