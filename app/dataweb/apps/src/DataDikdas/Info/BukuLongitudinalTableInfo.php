<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class BukuLongitudinalTableInfo extends base\BaseBukuLongitudinalTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->getColumnByName('buku_longitudinal_id')->setIsFk('');
        $this->getColumnByName('buku_longitudinal_id')->setFkTableName('');

        $this->getColumnByName('status_kelaikan')->setEnumValues(array(1 => "Laik" , 2 => "Tidak Laik"));
    }
    
}