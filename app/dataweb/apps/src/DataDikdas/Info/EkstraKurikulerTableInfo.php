<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class EkstraKurikulerTableInfo extends base\BaseEkstraKurikulerTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->setIsBigRef(1);
        $this->setDisplayField('nm_ekskul');
    }

}