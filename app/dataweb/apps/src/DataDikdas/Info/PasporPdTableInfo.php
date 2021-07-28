<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class PasporPdTableInfo extends base\BasePasporPdTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->setDisplayField('no_paspor');
        $this->setIsData(1);
        $this->setCreateGrid(1);
        $this->setCreateForm(1);

        $this->getColumnByName('peserta_didik_id')->setXtype('hidden');
        $this->getColumnByName('peserta_didik_id')->setHideColumn(1);

        $this->getColumnByName('no_paspor')->setXtype('textfield');
        $this->getColumnByName('no_paspor')->setHeader('No Paspor');
        $this->getColumnByName('tmt_paspor')->setHeader('TMT Paspor');
        $this->getColumnByName('tst_paspor')->setHeader('TST Paspor');
    }
    
}