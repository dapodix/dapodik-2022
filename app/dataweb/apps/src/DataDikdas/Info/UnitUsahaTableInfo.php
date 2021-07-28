<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class UnitUsahaTableInfo extends base\BaseUnitUsahaTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->setDisplayField('nama_unit_usaha');

        $this->getColumnByName('sekolah_id')->setHideColumn(1);

        $this->getColumnByName('kelompok_usaha_id')->setHeader('Kelompok Produksi');

        $this->getColumnByName('nama_unit_usaha')->setHeader('Nama Unit Produksi');
    }
    
}