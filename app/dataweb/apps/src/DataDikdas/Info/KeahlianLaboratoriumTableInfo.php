<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class KeahlianLaboratoriumTableInfo extends base\BaseKeahlianLaboratoriumTableInfo
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