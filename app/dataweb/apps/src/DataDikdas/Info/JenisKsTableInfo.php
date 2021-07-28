<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class JenisKsTableInfo extends base\BaseJenisKsTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->setDisplayField('nm_jns_ks');
    }

}