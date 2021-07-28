<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class RwyStrukturalTableInfo extends base\BaseRwyStrukturalTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_rwy_struktural');

        // Override below here!
        $this->getColumnByName('ptk_id')->setHideColumn(1);

        $this->getColumnByName('jabatan_ptk_id')->setHeader('Jabatan PTK');
        $this->getColumnByName('jabatan_ptk_id')->setColumnWidth(200);

        $this->getColumnByName('sk_struktural')->setHeader('SK Struktural / Fungsional');

        $this->getColumnByName('tmt_jabatan')->setHeader('TMT Jabatan');
        $this->getColumnByName('tmt_jabatan')->setColumnWidth(120);

        $this->getColumnByName('jabatan_ptk_id')->setDescription('Pilih jenis jabatan struktural PTK.');
        $this->getColumnByName('sk_struktural')->setDescription('Diisi nomor SK jabatan struktural PTK.');
        $this->getColumnByName('tmt_jabatan')->setDescription('Diisi TMT sesuai yang tertera pada SK jabatan struktural PTK.');

    }

}