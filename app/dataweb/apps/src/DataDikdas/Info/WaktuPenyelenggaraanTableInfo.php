<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class WaktuPenyelenggaraanTableInfo extends base\BaseWaktuPenyelenggaraanTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->setIsBigRef(1);
    }

}