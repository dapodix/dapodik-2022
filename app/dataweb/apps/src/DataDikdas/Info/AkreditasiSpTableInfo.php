<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class AkreditasiSpTableInfo extends base\BaseAkreditasiSpTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();
        // Override below here!
        $this->getColumnByName('sekolah_id')->setXtype('hidden');
        $this->getColumnByName('sekolah_id')->setHideColumn(1);

        $this->getColumnByName('akred_sp_sk')->setHeader('SK Akreditasi');

        $this->getColumnByName('akred_sp_tmt')->setHeader('TMT Akreditasi');
        $this->getColumnByName('akred_sp_tmt')->setColumnWidth(200);

        $this->getColumnByName('akred_sp_tst')->setHeader('TST Akreditasi');
        $this->getColumnByName('akred_sp_tst')->setColumnWidth(200);

        $this->getColumnByName('la_id')->setHeader('Lembaga Akreditasi');
    }

}