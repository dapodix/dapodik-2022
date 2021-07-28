<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class BidangSdmTableInfo extends base\BaseBidangSdmTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->getColumnByName('bidang_studi_id')->setHideColumn(0);
        $this->getColumnByName('bidang_studi_id')->setColumnWidth(350);
        $this->getColumnByName('bidang_studi_id')->setHeader('Bidang Studi');
    }

}