<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class BimbingPdTableInfo extends base\BaseBimbingPdTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!

        $this->getColumnByName('id_akt_pd')->setHideColumn(1);
        $this->getColumnByName('ptk_id')->setHeader('PTK Pembimbing');
        $this->getColumnByName('ptk_id')->setColumnWidth(250);
    }
    
}