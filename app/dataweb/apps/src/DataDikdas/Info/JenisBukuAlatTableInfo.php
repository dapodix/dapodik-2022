<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class JenisBukuAlatTableInfo extends base\BaseJenisBukuAlatTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
    }
    
}