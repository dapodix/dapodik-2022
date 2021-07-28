<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class KitasPtkTableInfo extends base\BaseKitasPtkTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->setDisplayField('no_kitas');
        $this->setIsData(1);
        $this->setCreateGrid(1);
        $this->setCreateForm(1);

        $this->getColumnByName('ptk_id')->setXtype('hidden');
        $this->getColumnByName('ptk_id')->setHideColumn(1);

        $this->getColumnByName('no_kitas')->setXtype('textfield');
        $this->getColumnByName('no_kitas')->setHeader('No KITAS');
        $this->getColumnByName('tmt_kitas')->setHeader('TMT KITAS');
        $this->getColumnByName('tst_kitas')->setHeader('TST KITAS');
    }
    
}