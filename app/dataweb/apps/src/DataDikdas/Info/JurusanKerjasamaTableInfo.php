<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class JurusanKerjasamaTableInfo extends base\BaseJurusanKerjasamaTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->getColumnByName('mou_id')->setHideColumn(0);
        $this->getColumnByName('mou_id')->setHeader('PKS Kerjasama');
        $this->getColumnByName('mou_id')->setColumnWidth(300);
    }
    
}