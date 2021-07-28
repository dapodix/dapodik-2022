<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class VldRwyFungsionalTableInfo extends base\BaseVldRwyFungsionalTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->getColumnByName('idtype')->setHideColumn(1);
        // $this->getColumnByName('expired_date')->setHideColumn(1);
        $this->getColumnByName('app_username')->setHideColumn(1);

        $this->getColumnByName('field_error')->setHeader('Isian yang Salah');
        $this->getColumnByName('field_error')->setColumnWidth(120);
        // $this->getColumnByName('create_date')->setHeader('Tgl Diterbitkan');
        // $this->getColumnByName('create_date')->setColumnWidth(100);
        $this->getColumnByName('status_validasi')->setHeader('Sts');
        $this->getColumnByName('status_validasi')->setColumnWidth(40);
        $this->getColumnByName('error_message')->setHeader('Pesan Kesalahan');
        $this->getColumnByName('error_message')->setColumnWidth(200);
        $this->getColumnByName('keterangan')->setColumnWidth(150);
    }

}