<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class DudiTableInfo extends base\BaseDudiTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_dudi');

        // Override below here!
        // $this->setDisplayField('nama_dudi');
        $this->getColumnByName('rt')->setHeader('RT');
        $this->getColumnByName('rt')->setColumnWidth(80);
        $this->getColumnByName('rw')->setHeader('RW');
        $this->getColumnByName('rw')->setColumnWidth(80);
        $this->getColumnByName('kode_pos')->setColumnWidth(150);
        $this->getColumnByName('lintang')->setColumnWidth(120);
        $this->getColumnByName('lintang')->setXtype('numberfield');
        $this->getColumnByName('lintang')->setDecimalPrecision(16);
        // $this->getColumnByName('lintang')setMin(-1000000);
        $this->getColumnByName('bujur')->setColumnWidth(120);
        $this->getColumnByName('bujur')->setXtype('numberfield');
        $this->getColumnByName('bujur')->setDecimalPrecision(16);
        // $this->getColumnByName('bujur')setMin(-1000000);
        $this->getColumnByName('npwp')->setColumnWidth(200);
        $this->getColumnByName('kode_wilayah')->setColumnWidth(300);
        $this->getColumnByName('kode_wilayah')->setHeader('Kecamatan/kabupaten');
        // $this->getColumnByName('contact_person')->setLabel('Kontak Perorangan');
        // $this->getColumnByName('contact_person')->setHeader('Kontak Perorangan');

        // $this->getColumnByName('create_date')->setHideColumn(1);

        // $this->getColumnByName('expired_date')->setHideColumn(1);

        $this->getColumnByName('email')->setValidationType('email');
        $this->getColumnByName('website')->setValidationType('url');
    }

}
