<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class AlasanLayakPipTableInfo extends base\BaseAlasanLayakPipTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        
        $this->setIsBigRef(1);
        $this->setIsSmallRef(0);
        $this->setCreateRadiogroup(0); 
        $this->setDisplayField(     'alasan_layak_pip'); 
    }
    
}