<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class JurusanTableInfo extends base\BaseJurusanTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.JurusanTableInfo';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->setDisplayField('nama_jurusan'); 
        $this->setIsBigRef(1); 
    }
    
}