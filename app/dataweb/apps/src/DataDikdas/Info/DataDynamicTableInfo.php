<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class DataDynamicTableInfo extends base\BaseDataDynamicTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.DataDynamicTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->getColumnByName('value_string')->setXtype('textareafield');
    }
    
}