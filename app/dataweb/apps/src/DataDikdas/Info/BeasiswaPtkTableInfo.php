<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class BeasiswaPtkTableInfo extends base\BaseBeasiswaPtkTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_bea_ptk');
        
        // Override below here!
        $this->getColumnByName('ptk_id')->setHideColumn(1);
        
        $this->getColumnByName('tahun_mulai')->setLabel('Thn Mulai');
        $this->getColumnByName('tahun_mulai')->setColumnWidth('100');
        $this->getColumnByName('tahun_mulai')->setInputLength(4);
        $this->getColumnByName('tahun_mulai')->setMinLength(4);
        
        $this->getColumnByName('tahun_akhir')->setLabel('Thn Akhir');
        $this->getColumnByName('tahun_akhir')->setColumnWidth('100');
        $this->getColumnByName('tahun_akhir')->setInputLength(4);
        $this->getColumnByName('tahun_akhir')->setMinLength(4);
        
        $colJk = $this->getColumnByName('masih_menerima');
        $colJk->setEnumValues(array("1" => "Ya" , "0" => "Tidak"));
        $colJk->setColumnWidth('120');

        $this->getColumnByName('jenis_beasiswa_id')->setDescription('Pilih jenis beasiswa yang pernah diterima PTK.');
        $this->getColumnByName('keterangan')->setDescription('Diisi dengan keterangan terkait beasiswa yang pernah diterima PTK, biasanya berupa nama program beasiswa tersebut.');
        $this->getColumnByName('tahun_mulai')->setDescription('Diisi tahun mulai diterimanya beasiswa oleh PTK.');
        $this->getColumnByName('tahun_akhir')->setDescription('Diisi tahun selesai diterimanya beasiswa oleh PTK.');
        $this->getColumnByName('masih_menerima')->setDescription('Pilih status beasiswa, apakah masih menerima atau tidak.');

    }
    
}