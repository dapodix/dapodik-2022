<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class WsAplikasiTableInfo extends base\BaseWsAplikasiTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->moveColumnBelow($this->getColumnByName('token'), $this->getColumnByName('ip_address'));


        $this->getColumnByName('sekolah_id')->setHideColumn(1);
        $this->getColumnByName('password')->setHideColumn(1);
        // $this->getColumnByName('token')->setHideColumn(1);
        $this->getColumnByName('aktif')->setHideColumn(1);
        $this->getColumnByName('expired_date')->setHideColumn(1);
        $this->getColumnByName('port')->setHideColumn(1);
        $this->getColumnByName('mac_address')->setHideColumn(1);
        $this->getColumnByName('token')->setXtype('displayfield');

        $this->getColumnByName('nama')->setHeader('Nama Aplikasi');
        $this->getColumnByName('token')->setHeader('Key');
        $this->getColumnByName('token')->setColumnWidth(200);
        $this->getColumnByName('ip_address')->setHeader('IP Address');
        $this->getColumnByName('mac_address')->setHeader('MAC Address');
    }

}