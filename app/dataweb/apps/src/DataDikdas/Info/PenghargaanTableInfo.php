<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class PenghargaanTableInfo extends base\BasePenghargaanTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_penghargaan');

        // Override below here!
        $this->getColumnByName('ptk_id')->setHideColumn(1);

        $this->getColumnByName('nama')->setHeader("Nama Penghargaan");
        $this->getColumnByName('tahun')->setColumnWidth('80');
        $this->getColumnByName('tahun')->setInputLength(4);
        $this->getColumnByName('tahun')->setMinLength(4);

        $this->getColumnByName('tingkat_penghargaan_id')->setDescription('Pilih tingkat/level penghargaan yang pernah diterima PTK.');
        $this->getColumnByName('jenis_penghargaan_id')->setDescription('Pilih jenis penghargaan yang pernah diterima PTK.');
        $this->getColumnByName('nama')->setDescription('Diisi nama penghargaan yang pernah diterima PTK.');
        $this->getColumnByName('tahun')->setDescription('Diisi tahun diterimanya penghargaan oleh PTK.');
        $this->getColumnByName('instansi')->setDescription('Diisi nama instansi yang memberikan penghargaan kepada PTK.');

    }

}