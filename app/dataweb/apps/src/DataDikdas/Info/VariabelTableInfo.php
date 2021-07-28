<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class VariabelTableInfo extends base\BaseVariabelTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.VariabelTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
    }
    
}