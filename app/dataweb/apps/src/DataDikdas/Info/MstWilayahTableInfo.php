<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class MstWilayahTableInfo extends base\BaseMstWilayahTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        //$this->setIsRef(1);
        //$this->setIsBigRef(1);
        //$this->setCreateCombobox(1);        
    }
    
}