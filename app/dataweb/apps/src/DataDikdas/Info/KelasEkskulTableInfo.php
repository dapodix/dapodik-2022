<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class KelasEkskulTableInfo extends base\BaseKelasEkskulTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->getColumnByName('rombongan_belajar_id')->setColumnWidth(210);
        $this->getColumnByName('id_ekskul')->setHeader('Jenis Ekskul');
        $this->getColumnByName('id_ekskul')->setColumnWidth(150);
        $this->getColumnByName('nm_ekskul')->setHeader('Nama Ekskul');
        $this->getColumnByName('tgl_sk_ekskul')->setHeader('Tgl SK Ekskul');
        $this->getColumnByName('sk_ekskul')->setHeader('SK Ekskul');
        $this->getColumnByName('sk_ekskul')->setColumnWidth(100);
        $this->getColumnByName('jam_kegiatan_per_minggu')->setColumnWidth(180);
    }

}