<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class KlasifikasiLembagaTableInfo extends base\BaseKlasifikasiLembagaTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->setIsSmallRef(0);
        $this->setCreateRadiogroup(0);
    }
    
}