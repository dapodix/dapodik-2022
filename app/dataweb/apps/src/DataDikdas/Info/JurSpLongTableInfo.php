<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class JurSpLongTableInfo extends base\BaseJurSpLongTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->setHeader('Data Pendaftar');

        $this->getColumnByName('jumlah_pendaftar')->setDescription('Diisi dengan jumlah pendaftar masing-masing kompetensi keahlian per tahun ajaran');
    }

}