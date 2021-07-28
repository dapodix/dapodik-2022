<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class PtkBaruTableInfo extends base\BasePtkBaruTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->getColumnByName('sekolah_id')->setHideColumn(1);
        $this->getColumnByName('tahun_ajaran_id')->setHideColumn(1);
        $this->getColumnByName('nama_ptk')->setHeader('Nama');

        $colJk = $this->getColumnByName('jenis_kelamin');
        $colJk->setHeader('JK');
        $colJk->setEnumValues(array("L" => "Laki-Laki" , "P" => "Perempuan"));
        $colJk->setColumnWidth(100);

        $this->getColumnByName('nuptk')->setHeader('NUPTK');
        $this->getColumnByName('nuptk')->setColumnWidth(100);
        $this->getColumnByName('nik')->setHeader('NIK');
        $this->getColumnByName('tanggal_lahir')->setHeader('Tgl Lahir');
        $this->getColumnByName('sudah_diproses')->setHideColumn(1);
        $this->getColumnByName('berhasil_diproses')->setHideColumn(1);
        $this->getColumnByName('ptk_id')->setHideColumn(1);

        $this->getColumnByName('nuptk')->setValidationType('numberonly');
        $this->getColumnByName('nik')->setValidationType('numberonly');
        $this->getColumnByName('nama_ptk')->setValidationType('namaspecialchar');
        $this->getColumnByName('nama_ibu_kandung')->setValidationType('namaspecialchar');
    }

}